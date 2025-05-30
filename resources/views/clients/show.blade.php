@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-8 bg-white dark:bg-gray-800 p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">Detalhes do Cliente</h1>

    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded space-y-2">
        <p class="text-gray-800 dark:text-gray-200">
            <strong class="font-semibold">Nome:</strong> {{ $client->name }}
        </p>
        <p class="text-gray-800 dark:text-gray-200">
            <strong class="font-semibold">Documento:</strong> {{ $client->document }}
        </p>
        <p class="text-gray-800 dark:text-gray-200">
            <strong class="font-semibold">Tipo:</strong> {{ $client->type }}
        </p>
        <p class="text-gray-800 dark:text-gray-200">
            <strong class="font-semibold">E-mail:</strong> {{ $client->email }}
        </p>
        <p class="text-gray-800 dark:text-gray-200">
            <strong class="font-semibold">Telefone:</strong> {{ $client->phone }}
        </p>
        <p class="text-gray-800 dark:text-gray-200">
            <strong class="font-semibold">WhatsApp:</strong> {{ $client->whatsapp }}
        </p>
    </div>

    <div class="mt-4">
        <a href="{{ route('clients.edit', $client) }}" class="text-yellow-600 hover:underline dark:text-yellow-400">Editar</a>
        <a href="{{ route('clients.index') }}" class="ml-4 text-gray-600 hover:underline dark:text-gray-300">Voltar</a>
    </div>
</div>
@endsection
