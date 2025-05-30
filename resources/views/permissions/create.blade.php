@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto p-6 bg-white dark:bg-gray-800 rounded shadow">
    <h1 class="text-xl font-bold mb-6 text-gray-900 dark:text-white">Criar Nova Permissão</h1>

    @if($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('permissions.store') }}">
        @csrf
        <label class="block mb-2 text-gray-700 dark:text-gray-300" for="name">Nome da Permissão</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}"
            class="w-full px-3 py-2 mb-4 border rounded dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('permissions.index') }}" class="px-4 py-2 bg-gray-300 dark:bg-gray-600 rounded hover:bg-gray-400 dark:hover:bg-gray-500 transition">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Salvar</button>
        </div>
    </form>
</div>
@endsection
