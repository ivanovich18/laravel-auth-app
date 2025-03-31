<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Dynamically set the page title based on the route --}}
        <title>
            @if (Route::is('login'))
                {{ __('Login') }}
            @elseif (Route::is('register'))
                {{ __('Register') }}
            @endif
            - {{ config('app.name', 'Laravel Auth App') }}
        </title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        {{-- Main container with your custom gradient background --}}
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-primary-100 via-neutral-light to-secondary-100">

            {{-- Dynamic Heading based on the current route --}}
            <div class="mb-4">
                <h1 class="text-3xl font-bold text-primary-700">
                    @if (Route::is('login'))
                        {{ __('Login') }} {{-- Display "Login" if on the login route --}}
                    @elseif (Route::is('register'))
                        {{ __('Register') }} {{-- Display "Register" if on the register route (You can change this to 'Sign Up' if you prefer) --}}
                    @endif
                    {{-- No title shown if it's neither login nor register --}}
                </h1>
            </div>

            {{-- Revamped Form Card --}}
            <div class="w-full sm:max-w-md mt-2 px-8 py-6 bg-white shadow-xl overflow-hidden sm:rounded-xl border border-primary-200">
                {{ $slot }} {{-- This is where login/register form content appears --}}
            </div>

        </div>
    </body>
</html>