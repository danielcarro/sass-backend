@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">
        Papel: <span class="text-blue-600 dark:text-blue-400">{{ $role->name }}</span>
    </h1>

    <div class="bg-white dark:bg-gray-800 shadow rounded p-6 mb-6">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Permissões Associadas</h2>

        @if($role->permissions->isEmpty())
            <p class="text-gray-600 dark:text-gray-300">Nenhuma permissão associada a este papel.</p>
        @else
            <ul class="list-disc list-inside text-gray-800 dark:text-gray-200">
                @foreach($role->permissions as $permission)
                    <li>{{ $permission->name }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <a href="{{ route('roles.edit', $role->id) }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
        Editar Permissões
    </a>

    <a href="{{ route('roles.index') }}" class="ml-4 inline-block px-4 py-2 bg-gray-300 dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded hover:bg-gray-400 dark:hover:bg-gray-600 transition">
        Voltar à Lista
    </a>
</div>
@endsection
