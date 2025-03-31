<x-app-layout> {{-- This uses layouts/app.blade.php --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                {{-- Increased padding and added vertical spacing between elements --}}
                <div class="p-6 md:p-8 text-gray-900 dark:text-gray-100 space-y-4">

                    {{-- 1. Personalized Welcome Message --}}
                    <h3 class="text-2xl font-semibold">
                        Welcome back, {{ auth()->user()->name }}!
                    </h3>

                    {{-- 2. Some User Information --}}
                    <p>
                        You are logged in with the email address:
                        {{-- Display email with slightly different styling --}}
                        <span class="font-medium text-primary-600 dark:text-primary-400">{{ auth()->user()->email }}</span>.
                    </p>


                    {{-- 3. Optional: Note about API Tokens --}}
                    {{-- Uncomment this section if you plan to add API token management later --}}
                    {{-- You would need to build the profile/API token management page separately --}}
                    {{-- Also ensure the 'profile.edit' route issue from earlier logs is fixed --}}
                    {{--
                    <div class="mt-6 p-4 bg-blue-50 dark:bg-gray-700 border border-blue-200 dark:border-blue-600 rounded-md text-sm text-blue-700 dark:text-blue-300">
                        <strong>Developer Note:</strong> If this application requires API access, API tokens can typically be generated and managed in your <a href="{{ route('profile.edit') }}" class="underline font-medium hover:text-blue-600 dark:hover:text-blue-200">profile settings</a>. (This feature may need to be implemented).
                    </div>
                    --}}

                    {{-- Original Message (You can keep or remove this) --}}
                    {{-- <p>{{ __("You're logged in!") }} </p> --}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>