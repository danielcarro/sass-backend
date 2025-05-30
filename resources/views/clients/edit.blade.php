@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-8 bg-white dark:bg-gray-800 p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">Editar Cliente</h1>

    <form action="{{ route('clients.update', $client) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nome</label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ $client->name }}"
                class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                required>
        </div>

        <div>
            <label for="document" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Documento</label>
            <input
                type="text"
                name="document"
                id="document"
                value="{{ $client->document }}"
                class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Tipo</label>
            <div class="flex items-center gap-4">
                <label class="flex items-center">
                    <input type="radio" name="type" value="PF" class="mr-2" {{ $client->type === 'PF' ? 'checked' : '' }} required>
                    <span class="text-gray-700 dark:text-gray-200">Pessoa Física (PF)</span>
                </label>
                <label class="flex items-center">
                    <input type="radio" name="type" value="PJ" class="mr-2" {{ $client->type === 'PJ' ? 'checked' : '' }} required>
                    <span class="text-gray-700 dark:text-gray-200">Pessoa Jurídica (PJ)</span>
                </label>
            </div>
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">E-mail</label>
            <input
                type="email"
                name="email"
                id="email"
                value="{{ $client->email }}"
                class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                required>
        </div>

        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Telefone</label>
            <input
                type="text"
                name="phone"
                id="phone"
                value="{{ $client->phone }}"
                class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
        </div>

        <div>
            <label for="whatsapp" class="block text-sm font-medium text-gray-700 dark:text-gray-200">WhatsApp</label>
            <input
                type="text"
                name="whatsapp"
                id="whatsapp"
                value="{{ $client->whatsapp }}"
                class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
        </div>

        <div class="flex items-center">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Atualizar
            </button>
            <a href="{{ route('clients.index') }}" class="ml-4 text-gray-600 dark:text-gray-300 hover:underline">
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
