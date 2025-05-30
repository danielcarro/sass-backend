@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-gray-100">Editar Usuário</h1>

        @if ($errors->any())
            <div class="bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 p-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <select name="role" id="role"  
                class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                required>
                @foreach (['admin', 'owner', 'manager', 'viewer'] as $role)
                    <option value="{{ $role }}" @if ($user->hasRole($role)) selected @endif>
                        {{ ucfirst($role) }}
                    </option>
                @endforeach
            </select>

            <div>
                <label for="client_id" class="block mb-1 font-semibold text-gray-900 dark:text-gray-100">Cliente</label>
                <select name="client_id" id="client_id" required
                    class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Selecione um cliente</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}" {{ old('client_id', $user->client_id) == $client->id ? 'selected' : '' }}>
                            {{ $client->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1 font-semibold text-gray-900 dark:text-gray-100" for="name">Nome</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                    class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded px-3 py-2"
                    required>
            </div>

            <div>
                <label class="block mb-1 font-semibold text-gray-900 dark:text-gray-100" for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                    class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded px-3 py-2"
                    required>
            </div>

            <div>
                <label class="block mb-1 font-semibold text-gray-900 dark:text-gray-100" for="password">
                    Senha <small class="text-gray-600 dark:text-gray-400">(Deixe em branco para manter)</small>
                </label>
                <input type="password" name="password" id="password"
                    class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded px-3 py-2">
            </div>

            <div>
                <label class="block mb-1 font-semibold text-gray-900 dark:text-gray-100"
                    for="password_confirmation">Confirmar Senha</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded px-3 py-2">
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
                Atualizar
            </button>
            <a href="{{ route('users.index') }}" class="ml-4 text-gray-600 dark:text-gray-400 hover:underline">Cancelar</a>
        </form>
    </div>
@endsection
