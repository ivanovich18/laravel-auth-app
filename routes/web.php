<?php

use Illuminate\Support\Facades\Route;
// Make sure you have these use statements at the top of your routes/web.php file:
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log; // Optional: for logging errors


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Other Breeze routes like profile editing might be included via require __DIR__.'/auth.php';

// --- Google Socialite Routes ---

Route::get('/auth/google/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('auth.google.redirect');

Route::get('/auth/google/callback', function () { // <-- Find THIS route definition
    try {
        $googleUser = Socialite::driver('google')->user();
    
        // 1. Try finding user by google_id first
        $user = User::where('google_id', $googleUser->id)->first();
    
        if ($user) {
            // User found by google_id, update optional details like token
            $user->update([
                 'google_token' => $googleUser->token,
                 'google_refresh_token' => $googleUser->refreshToken,
            ]);
        } else {
            // 2. Not found by google_id, try finding by email
            $user = User::where('email', $googleUser->email)->first();
    
            if ($user) {
                // 3. User found by email - Link account by adding google_id
                $user->update([
                    'google_id' => $googleUser->id,
                    'name' => $googleUser->name, // Update name from Google if desired
                    'email_verified_at' => $user->email_verified_at ?? now(), // Ensure verified
                    'google_token' => $googleUser->token,
                    'google_refresh_token' => $googleUser->refreshToken,
                ]);
            } else {
                // 4. User not found by google_id OR email - Create a new user
                $user = User::create([
                    'google_id' => $googleUser->id,
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'email_verified_at' => now(), // Mark as verified since it's from Google
                    'password' => Hash::make(Str::random(24)), // Create a random password
                    'google_token' => $googleUser->token,
                    'google_refresh_token' => $googleUser->refreshToken,
                ]);
            }
        }
    
        // 5. Log the user in (whether found, updated, or created)
        Auth::login($user, true);
    
        return redirect('/dashboard');
    
    } catch (\Exception $e) {
        Log::error('Google Auth Error: ' . $e->getMessage() . "\n" . $e->getTraceAsString());
        return redirect('/login')->withErrors('Unable to login using Google. Please try again.');
    }
})->name('auth.google.callback');


// Include Breeze's auth routes (this might already be present)
require __DIR__.'/auth.php';