@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto mt-8 bg-white dark:bg-gray-800 p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">Clientes</h1>

    <a href="{{ route('clients.create') }}"
       class="mb-4 inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
        ➕ Novo Cliente
    </a>

    @if(session('success'))
        <div class="bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-200 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full table-auto text-sm text-gray-800 dark:text-gray-200">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left">Nome</th>
                    <th class="px-4 py-2 text-left">Documento</th>
                    <th class="px-4 py-2 text-left">Tipo</th>
                    <th class="px-4 py-2 text-left">E-mail</th>
                    <th class="px-4 py-2 text-left">Telefone</th>
                    <th class="px-4 py-2 text-left">WhatsApp</th>
                    <th class="px-4 py-2 text-left">Ações</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800">
                @forelse($clients as $client)
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-4 py-2">{{ $client->name }}</td>
                        <td class="px-4 py-2">{{ $client->document }}</td>
                        <td class="px-4 py-2">{{ $client->type }}</td>
                        <td class="px-4 py-2">{{ $client->email }}</td>
                        <td class="px-4 py-2">{{ $client->phone }}</td>
                        <td class="px-4 py-2">{{ $client->whatsapp }}</td>
                        <td class="px-4 py-2 space-x-2 whitespace-nowrap">
                            <a href="{{ route('clients.show', $client) }}" class="text-blue-600 hover:underline dark:text-blue-400">Ver</a>
                            <a href="{{ route('clients.edit', $client) }}" class="text-yellow-600 hover:underline dark:text-yellow-400">Editar</a>
                            <form action="{{ route('clients.destroy', $client) }}" method="POST" class="inline" onsubmit="return confirm('Deseja excluir?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline dark:text-red-400">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-2 text-center text-gray-600 dark:text-gray-400">Nenhum cliente encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
