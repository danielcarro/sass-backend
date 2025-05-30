@extends('layouts.guest')

@section('content')
<div class="flex items-center justify-center min-h-screen shadow bg-white text-black dark:bg-gray-800 dark:text-white">
    <div class="w-full max-w-md bg-white text-black dark:bg-gray-700 dark:text-white shadow-md rounded px-8 py-6">
        <h2 class="text-2xl font-semibold text-center  mb-6">{{ __('Reset Password') }}</h2>

        @if (session('status'))
            <div class="mb-4 text-sm text-green-600 bg-green-100 p-3 rounded">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block  text-sm font-medium mb-2">
                    {{ __('Email Address') }}
                </label>
                <input id="email" type="email" name="email"
                       class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                       value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Botão --}}
            <div class="flex justify-end">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
