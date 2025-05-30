@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Permissões</h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 rounded">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('permissions.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Criar Nova Permissão</a>

    <table class="w-full bg-white dark:bg-gray-800 rounded shadow overflow-hidden">
        <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
                <th class="text-left px-4 py-2">Nome</th>
                <th class="text-right px-4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($permissions as $permission)
            <tr class="border-t border-gray-200 dark:border-gray-700">
                <td class="px-4 py-2 text-gray-800 dark:text-gray-200">{{ $permission->name }}</td>
                <td class="px-4 py-2 text-right space-x-2">
                    <a href="{{ route('permissions.edit', $permission->id) }}" class="text-blue-600 hover:underline">Editar</a>
                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Confirma exclusão?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $permissions->links() }}
    </div>
</div>
@endsection
