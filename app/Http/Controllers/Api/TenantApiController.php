<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Str;

class TenantApiController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'nullable|exists:users,id',
            'role' => 'nullable|string|max:255',
        ]);

        $user = $request->user(); // usuário autenticado

        // ⚙️ Define client_id dinamicamente a partir do usuário
        $clientId = $user->client_id ?? null;
        if (!$clientId) {
            return response()->json(['message' => 'Usuário não possui client_id vinculado.'], 422);
        }

        // 🎯 Criação do Tenant
        $tenant = Tenant::create([
            'name' => $validated['name'],
            'client_id' => $clientId,
        ]);

        // 🌐 Criação do domínio fictício (ajuste se necessário)
        $tenant->domains()->create([
            'domain' => Str::slug($validated['name']) . '.localhost',
        ]);

        // 👤 Vincula usuário ao tenant
        $userId = $validated['user_id'] ?? $user->id;
        $role = $validated['role'] ?? 'admin';

        $tenant->users()->attach($userId, ['role' => $role]);

        return response()->json([
            'message' => 'Tenant criado com sucesso.',
            'tenant' => $tenant->load(['domains', 'users:id,name,email']),
        ], 201);
    }

    // Mostrar um tenant específico
    public function show(Request $request, Tenant $tenant)
    {
        return response()->json($tenant);
    }

    public function edit($id)
    {
        $tenant = Tenant::with('client', 'users')->findOrFail($id);
        $clients = Client::all();
        $users = User::all();

        return response()->json([
            'tenant' => $tenant,
            'clients' => $clients,
            'users' => $users,
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'client_id' => 'required|exists:clients,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $tenant = Tenant::findOrFail($id);
        $tenant->name = $request->input('name');
        $tenant->client_id = $request->input('client_id');
        $tenant->save();

        // Sincroniza o usuário principal (removendo outros, se houver)
        $tenant->users()->sync([
            $request->input('user_id') => ['role' => 'admin']
        ]);

        return response()->json([
            'message' => 'Tenant atualizado com sucesso.',
            'tenant' => $tenant->load('client', 'users'),
        ]);
    }


    public function me(Request $request)
    {
        $tenant = tenancy()->tenant;

        if (!$tenant) {
            return response()->json(['error' => 'Tenant não encontrado'], 404);
        }

        // Carregar relacionamentos
        $tenant->load(['users', 'domains', 'client']);

        return response()->json($tenant);
    }
}
