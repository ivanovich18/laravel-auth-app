<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User; // Make sure to import User model
use Illuminate\Support\Facades\Auth; // Make sure to import Auth facade

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/auth/google/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('auth.google.redirect');

Route::get('/auth/google/callback', function () {
    try {
        $googleUser = Socialite::driver('google')->user();

        // Find or create the user
        $user = User::updateOrCreate([
            'google_id' => $googleUser->id, // Add 'google_id' column to your users table
        ], [
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'google_token' => $googleUser->token, // Optional: Store token
            'google_refresh_token' => $googleUser->refreshToken, // Optional: Store refresh token
            'password' => isset($user->password) ? $user->password : Hash::make(Str::random(24)) // Set a random password if new user
        ]);

        Auth::login($user, true); // Log in the user (true for remember token)

        return redirect('/dashboard');

    } catch (\Exception $e) {
        // Handle exceptions (e.g., user denied access)
        // Log::error('Google Auth Error: ' . $e->getMessage());
        return redirect('/login')->withErrors('Unable to login using Google.');
    }
})->name('auth.google.callback');

require __DIR__.'/auth.php';
