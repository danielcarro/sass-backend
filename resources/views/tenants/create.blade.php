@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-3xl">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 dark:text-gray-100">Criar Tenant</h1>

        <form action="{{ route('tenants.store') }}" method="POST"
            class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            {{-- Campo Nome --}}
            <div class="mb-6">
                <label for="name" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Nome</label>
                <input type="text" name="name" id="name"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md 
                       focus:outline-none focus:ring-2 focus:ring-blue-500 
                       dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 
                       dark:focus:ring-blue-400"
                    value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>

            {{-- Campo Client (select) --}}
            <div class="mb-6">
                <label for="client_id" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Cliente</label>
                <select name="client_id" id="client_id"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md 
                       focus:outline-none focus:ring-2 focus:ring-blue-500 
                       dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 
                       dark:focus:ring-blue-400"
                    required>
                    <option value="" disabled selected>-- Selecione um cliente --</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                            {{ $client->name }}
                        </option>
                    @endforeach
                </select>
                @error('client_id')
                    <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>
            {{-- Campo Usuário Principal --}}
            <div class="mb-6">
                <label for="user_id" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Usuário
                    Principal</label>
                <select name="user_id" id="user_id"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md 
               focus:outline-none focus:ring-2 focus:ring-blue-500 
               dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 
               dark:focus:ring-blue-400"
                    required>
                    <option value="" disabled selected>-- Selecione um usuário --</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>


            {{-- Botões --}}
            <div class="flex space-x-4">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded 
                       focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400">
                    Criar
                </button>

                <a href="{{ route('tenants.index') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-6 rounded 
                       focus:outline-none focus:ring-2 focus:ring-gray-400 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 dark:focus:ring-gray-500">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
