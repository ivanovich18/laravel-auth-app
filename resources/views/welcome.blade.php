{{-- This file should be saved as: resources/views/welcome.blade.php --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title> {{-- Uses your app name --}}

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Links your compiled CSS/JS --}}
    </head>
    <body class="antialiased font-sans">
        {{-- Main container: Full screen, applies gradient, centers content vertically and horizontally --}}
        <div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-primary-100 via-neutral-light to-secondary-100 text-center p-6">

            {{-- Optional: A title for your application --}}
            <h1 class="text-4xl sm:text-5xl font-bold text-primary-700 mb-8"> {{-- Larger text, uses primary color --}}
                Welcome!
            </h1>

            {{-- Container for the Login and Register buttons --}}
            <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-6"> {{-- Increased space between buttons --}}

                {{-- Log In Button (Styled as a Link) --}}
                <a href="{{ route('login') }}"
                   class="inline-flex items-center px-8 py-3 bg-primary border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-primary-700 focus:bg-primary-700 active:bg-primary-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition ease-in-out duration-150">
                   {{-- Uses primary color, slightly larger padding --}}
                    Log In
                </a>

                {{-- Register Button (Styled as a Link) --}}
                <a href="{{ route('register') }}"
                   class="inline-flex items-center px-8 py-3 bg-secondary border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-secondary-700 focus:bg-secondary-700 active:bg-secondary-900 focus:outline-none focus:ring-2 focus:ring-secondary-500 focus:ring-offset-2 transition ease-in-out duration-150">
                   {{-- Uses secondary color, slightly larger padding --}}
                    Register
                </a>

                {{-- Alternative Register Button Style (Outline - uncomment to use) --}}
                {{--
                <a href="{{ route('register') }}"
                   class="inline-flex items-center px-8 py-3 bg-transparent border-2 border-primary text-primary rounded-md font-semibold text-sm uppercase tracking-widest hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition ease-in-out duration-150">
                   Register (Outline)
                </a>
                --}}
            </div>

        </div>
    </body>
</html>