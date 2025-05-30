<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TenantController extends Controller
{
    // Listar todos os tenants
    public function index(Request $request)
    {

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Not supported via API'], 405);
        }
        $tenants = Tenant::with('domains')->paginate(15);

        return view('tenants.index', compact('tenants'));
    }

    // Mostrar formulário para criar um novo tenant (apenas web)
    public function create(Request $request)
    {
        if ($request->wantsJson()) {
            return response()->json(['message' => 'Not supported via API'], 405);
        }

        // Buscar todos os clientes para popular o select na view
        $clients = Client::all();
        $users = User::all();

        // Passar os clientes para a view
        return view('tenants.create', compact('clients', 'users'));
    }

    // Armazenar novo tenant (web)
    public function store(Request $request)
    {
        if ($request->wantsJson()) {
            return response()->json(['message' => 'Deleting tenants via API not allowed'], 403);
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'client_id' => 'required|integer|exists:clients,id',  // validar client_id
            'user_id' => 'nullable|integer|exists:users,id',
            'role' => 'nullable|string|max:255',
        ]);

        $tenant = Tenant::create([
            'name' => $validated['name'],
            'client_id' => $validated['client_id'],  // inserir client_id aqui
            // outros campos que o Tenant exigir
        ]);

        $tenant->domains()->create([
            'domain' => Str::slug($validated['name']) . '.localhost',
        ]);

        $userId = $validated['user_id'] ?? auth()->id();
        $user = \App\Models\User::find($userId);

        // Captura o primeiro role do usuário (pode adaptar para múltiplos se precisar)
        $role = $user->getRoleNames()->first() ?? 'owner';

        $tenant->users()->attach($userId, ['role' => $role]);

        return redirect()->route('tenants.index')
            ->with('success', 'Tenant criado com sucesso.');
    }



    // Mostrar um tenant específico
    public function show(Request $request, Tenant $tenant)
    {
        if ($request->wantsJson()) {
            return response()->json(['message' => 'Deleting tenants via API not allowed'], 403);
        }
        return view('tenants.show', compact('tenant'));
    }

    // Mostrar formulário para editar um tenant (apenas web)
    public function edit($id)
    {
        // Buscar o Tenant pelo ID
        $tenant = Tenant::findOrFail($id);

        $users = User::all();  // ou o filtro que fizer sentido para trazer os usuários
        // Buscar todos os clients para popular o select
        $clients = Client::all();

        // Passar os dados para a view
        return view('tenants.edit', compact('tenant', 'clients', 'users'));
    }


    public function update(Request $request, Tenant $tenant)
    {
        if ($request->wantsJson()) {
            return response()->json(['message' => 'Deleting tenants via API not allowed'], 403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'client_id' => 'required|exists:clients,id', // valida o client_id
        ]);

        $tenant->update($validated);

        $tenant->domains()->update([
            'domain' => Str::slug($validated['name']) . '.localhost',
        ]);

        return redirect()->route('tenants.index')
            ->with('success', 'Tenant atualizado com sucesso.');
    }


    // Deletar tenant - permitido só via web
    public function destroy(Request $request, Tenant $tenant)
    {
        if ($request->wantsJson()) {
            return response()->json(['message' => 'Deleting tenants via API not allowed'], 403);
        }
        $tenant->delete();
        return redirect()->route('tenants.index')
            ->with('success', 'Tenant deletado com sucesso.');
    }
}
