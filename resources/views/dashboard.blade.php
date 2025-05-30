@extends('layouts.app')

@section('content')

<div class="flex justify-center">
    <div class="w-full max-w-4xl">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
            <div class="bg-gray-100 dark:bg-gray-700 px-6 py-4 text-lg font-semibold text-gray-800 dark:text-white">
                {{ __('Dashboard') }}
            </div>

            <div class="p-6 text-gray-800 dark:text-gray-100 space-y-6">

                @if (session('status'))
                    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="p-4 bg-blue-100 dark:bg-blue-900 rounded shadow text-center">
                        <h2 class="text-2xl font-bold">{{ $tenantsCount }}</h2>
                        <p class="mt-2">Tenants cadastrados</p>
                    </div>

                    <div class="p-4 bg-green-100 dark:bg-green-900 rounded shadow text-center">
                        <h2 class="text-2xl font-bold">{{ $usersCount }}</h2>
                        <p class="mt-2">Usuários cadastrados</p>
                    </div>
                </div>

                <div class="mt-6">
                    <p>Para gerenciar seus tenants, vá até a seção <a href="{{ route('tenants.index') }}" class="text-blue-600 underline hover:text-blue-800 dark:text-blue-400">Tenants</a>.</p>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
