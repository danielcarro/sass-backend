@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-100">Tenants</h1>
        <a href="{{ route('tenants.create') }}"
           class="w-full sm:w-auto text-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-400 dark:focus:ring-blue-500">
            Novo Tenant
        </a>
    </div>

    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded mb-6 
                dark:bg-green-700 dark:text-white dark:border-green-500 text-sm sm:text-base">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
            <thead class="bg-gray-100 dark:bg-gray-700 text-xs sm:text-sm">
                <tr>
                    <th class="px-3 py-2 text-left font-semibold text-gray-700 dark:text-gray-300">#</th>
                    <th class="px-3 py-2 text-left font-semibold text-gray-700 dark:text-gray-300">Nome</th>
                    <th class="px-3 py-2 text-left font-semibold text-gray-700 dark:text-gray-300">Cliente</th>
                    <th class="px-3 py-2 text-left font-semibold text-gray-700 dark:text-gray-300">Domínio</th>
                    <th class="px-3 py-2 text-left font-semibold text-gray-700 dark:text-gray-300">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @forelse ($tenants as $tenant)
                <tr>
                    <td class="px-3 py-2 text-gray-800 dark:text-gray-200">{{ $tenant->id }}</td>
                    <td class="px-3 py-2 text-gray-800 dark:text-gray-200">{{ $tenant->name }}</td>
                    <td class="px-3 py-2 text-gray-800 dark:text-gray-200">
                        {{ $tenant->client->name ?? '—' }}
                    </td>
                    <td class="px-3 py-2 text-gray-800 dark:text-gray-200">
                        @foreach ($tenant->domains as $domain)
                            <div class="break-all">{{ $domain->domain }}</div>
                        @endforeach
                    </td>
                    <td class="px-3 py-2">
                        <div class="flex flex-wrap gap-2 text-sm">
                            <a href="{{ route('tenants.show', $tenant->id) }}"
                               class="text-blue-600 hover:underline dark:text-blue-400">
                                Ver
                            </a>
                            <a href="{{ route('tenants.edit', $tenant->id) }}"
                               class="text-yellow-600 hover:underline dark:text-yellow-400">
                                Editar
                            </a>
                            <form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST"
                                  onsubmit="return confirm('Tem certeza que deseja excluir?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline dark:text-red-400">
                                    Excluir
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-3 py-6 text-center text-gray-500 dark:text-gray-400">
                        Nenhum tenant cadastrado.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">
            {{ $tenants->links() }}
        </div>
    </div>
</div>
@endsection
