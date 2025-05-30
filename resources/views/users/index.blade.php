@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-6xl">
        <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-gray-100">Usuários</h1>

        @if (session('success'))
            <div class="bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('users.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded mb-4 inline-block">
            Criar Novo Usuário
        </a>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-800 shadow rounded">
                <thead>
                    <tr>
                        <th
                            class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-900 dark:text-gray-100">
                            ID</th>
                        <th
                            class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-900 dark:text-gray-100">
                            Nome</th>
                        <th
                            class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-900 dark:text-gray-100">
                            Email</th>
                        <th
                            class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-900 dark:text-gray-100">
                            Cliente</th>
                        <th
                            class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-900 dark:text-gray-100">
                            Papel</th>
                        <th
                            class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-left text-gray-900 dark:text-gray-100">
                            Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td
                                class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-100">
                                {{ $user->id }}</td>
                            <td
                                class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-100">
                                {{ $user->name }}</td>
                            <td
                                class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-100">
                                {{ $user->email }}</td>
                            <td
                                class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-100">
                                {{ $user->client ? $user->client->name : '—' }}</td>
                            <td
                                class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-100">
                                {{ $user->getRoleNames()->join(', ') ?: 'Sem papel' }}
                            </td>
                            <td
                                class="py-2 px-4 border-b border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-100 space-x-2">
                                <a href="{{ route('users.show', $user) }}"
                                    class="text-blue-600 dark:text-blue-400 hover:underline">Ver</a>
                                <a href="{{ route('users.edit', $user) }}"
                                    class="text-yellow-600 dark:text-yellow-400 hover:underline">Editar</a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Tem certeza que deseja deletar este usuário?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 dark:text-red-400 hover:underline">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4 text-gray-900 dark:text-gray-100">
            {{ $users->links() }}
        </div>
    </div>
@endsection
