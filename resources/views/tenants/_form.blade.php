<div class="mb-6">
    <label for="client_id" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Cliente</label>
    <select
        name="client_id"
        id="client_id"
        class="w-full px-3 py-2 border border-gray-300 rounded-md 
               focus:outline-none focus:ring-2 focus:ring-blue-500 
               dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 
               dark:focus:ring-blue-400"
        required
    >
        <option value="">-- Selecione um Cliente --</option>
        @foreach($clients as $client)
            <option value="{{ $client->id }}"
                {{ (old('client_id', $tenant->client_id ?? '') == $client->id) ? 'selected' : '' }}>
                {{ $client->name }}
            </option>
        @endforeach
    </select>
    @error('client_id')
        <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
    @enderror
</div>
