@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
        Editar Permissões do Papel: <span class="text-blue-600 dark:text-blue-400">{{ $role->name }}</span>
    </h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('roles.update', $role->id) }}">
        @csrf
        @method('PUT')

        <div class="bg-white dark:bg-gray-800 shadow rounded p-6">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Permissões Disponíveis</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 max-h-[400px] overflow-y-auto">
                @foreach($permissions as $permission)
                    <label class="flex items-center space-x-2 text-gray-800 dark:text-gray-200">
                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                               @if($role->permissions->pluck('name')->contains($permission->name)) checked @endif
                               class="text-blue-600 focus:ring-blue-500 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:checked:bg-blue-500 dark:ring-offset-gray-800">
                        <span>{{ $permission->name }}</span>
                    </label>
                @endforeach
            </div>

            <div class="mt-6 flex justify-end space-x-3">
                <a href="{{ route('roles.index') }}" class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                    Cancelar
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    Salvar
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
