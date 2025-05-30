@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto p-6 bg-white dark:bg-gray-800 rounded shadow">
    <h1 class="text-xl font-bold mb-6 text-gray-900 dark:text-white">Detalhes da Permissão</h1>

    <div class="mb-4">
        <strong class="text-gray-700 dark:text-gray-300">Nome:</strong>
        <p class="text-gray-900 dark:text-white">{{ $permission->name }}</p>
    </div>

    <div class="flex justify-end space-x-3">
        <a href="{{ route('permissions.index') }}" class="px-4 py-2 bg-gray-300 dark:bg-gray-600 rounded hover:bg-gray-400 dark:hover:bg-gray-500 transition">Voltar</a>
        <a href="{{ route('permissions.edit', $permission->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Editar</a>
    </div>
</div>
@endsection
