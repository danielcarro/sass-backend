@extends('layouts.guest')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white shadow-md rounded px-8 py-6">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">{{ __('Reset Password') }}</h2>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-medium mb-2">{{ __('Email Address') }}</label>
                <input id="email" type="email" name="email"
                       class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                       value="{{ $email ?? old('email') }}" required autofocus>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Nova Senha --}}
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-medium mb-2">{{ __('Password') }}</label>
                <input id="password" type="password" name="password"
                       class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror"
                       required autocomplete="new-password">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirmar Senha --}}
            <div class="mb-6">
                <label for="password-confirm" class="block text-gray-700 text-sm font-medium mb-2">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" name="password_confirmation"
                       class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required autocomplete="new-password">
            </div>

            {{-- Botão --}}
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
