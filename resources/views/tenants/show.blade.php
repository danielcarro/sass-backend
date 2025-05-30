@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-3xl">
    <h1 class="text-3xl font-bold mb-6 text-gray-800 dark:text-gray-100">Detalhes do Tenant</h1>

    <div class="bg-white dark:bg-gray-800 shadow-md rounded-md p-6 mb-6">
        <p class="text-gray-700 dark:text-gray-300 mb-2">
            <strong class="text-gray-900 dark:text-gray-100">ID:</strong> {{ $tenant->id }}
        </p>
        <p class="text-gray-700 dark:text-gray-300 mb-2">
            <strong class="text-gray-900 dark:text-gray-100">Nome:</strong> {{ $tenant->name }}
        </p>
        <p class="text-gray-700 dark:text-gray-300 mb-2">
            <strong class="text-gray-900 dark:text-gray-100">Cliente:</strong> 
            {{ $tenant->client->name ?? '—' }}
        </p>
        <p class="text-gray-700 dark:text-gray-300">
            <strong class="text-gray-900 dark:text-gray-100">Domínio:</strong> 
            {{ $tenant->domains->first() ? $tenant->domains->first()->domain : 'Nenhum domínio cadastrado' }}
        </p>
    </div>

    <a href="{{ route('tenants.index') }}"
       class="inline-block bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-6 rounded 
              focus:outline-none focus:ring-2 focus:ring-gray-400 
              dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 dark:focus:ring-gray-500">
        Voltar
    </a>
</div>
@endsection
