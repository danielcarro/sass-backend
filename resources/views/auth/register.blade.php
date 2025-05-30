@extends('layouts.guest')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-800 px-4">
    <div class="w-full max-w-md bg-white dark:bg-gray-700 shadow-md rounded-lg px-8 py-6">
        <h2 class="text-2xl font-semibold text-center mb-6">{{ __('Register') }}</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Name --}}
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium mb-2">
                    {{ __('Name') }}
                </label>
                <input id="name" type="text" name="name"
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white dark:bg-gray-600 text-black dark:text-white @error('name') border-red-500 @enderror"
                       value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium mb-2">
                    {{ __('Email Address') }}
                </label>
                <input id="email" type="email" name="email"
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white dark:bg-gray-600 text-black dark:text-white @error('email') border-red-500 @enderror"
                       value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium mb-2">
                    {{ __('Password') }}
                </label>
                <input id="password" type="password" name="password"
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white dark:bg-gray-600 text-black dark:text-white @error('password') border-red-500 @enderror"
                       required autocomplete="new-password">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="mb-6">
                <label for="password-confirm" class="block text-sm font-medium mb-2">
                    {{ __('Confirm Password') }}
                </label>
                <input id="password-confirm" type="password" name="password_confirmation"
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white dark:bg-gray-600 text-black dark:text-white"
                       required autocomplete="new-password">
            </div>

            {{-- Submit --}}
            <div class="flex justify-center">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-md transition duration-200">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
