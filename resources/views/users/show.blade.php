@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-md">
    <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-gray-100">Detalhes do Usuário</h1>

    <div class="bg-white dark:bg-gray-800 shadow rounded p-6 text-gray-900 dark:text-gray-100">
        <p><strong>ID:</strong> {{ $user->id }}</p>
        <p><strong>Nome:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Cliente:</strong> {{ $client ? $client->name : 'Não informado' }}</p>
        <p><strong>Criado em:</strong> {{ $user->created_at->format('d/m/Y H:i') }}</p>
        <p><strong>Atualizado em:</strong> {{ $user->updated_at->format('d/m/Y H:i') }}</p>
    </div>

    <a href="{{ route('users.index') }}" class="inline-block mt-4 text-blue-600 dark:text-blue-400 hover:underline">
        Voltar
    </a>
</div>
@endsection
