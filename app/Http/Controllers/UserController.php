<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Mostrar lista de usuários com paginação
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    // Mostrar formulário para criar usuário
    public function create()
    {
        // Pega todos os clientes para popular o select
        $clients = Client::all(); // ou o modelo correto para seus clientes

        // Passa a variável para a view
        return view('users.create', compact('clients'));
    }


    // Salvar usuário novo
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|confirmed|min:6',
            'role' => 'required|in:admin,owner,manager,viewer',
            'client_id' => 'nullable|exists:clients,id',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'client_id' => $validated['client_id'] ?? null,
        ]);

        $user->assignRole($validated['role']);

        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso.');
    }


    public function show(User $user)
    {
        $client = null;
        if ($user->client_id) {
            $client = Client::find($user->client_id);
        }
        return view('users.show', compact('user', 'client'));
    }


    public function edit(User $user)
    {
        // Carrega os clientes, ajuste conforme sua model
        $clients = Client::all();

        // Passa o usuário e os clientes para a view
        return view('users.edit', compact('user', 'clients'));
    }
    // Atualizar dados do usuário
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|confirmed|min:6',
            'role' => 'required|in:admin,owner,manager,viewer',
            'client_id' => 'nullable|exists:clients,id',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->client_id = $validated['client_id'] ?? null;

        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }

        $user->save();

        $user->syncRoles($validated['role']);

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso.');
    }

    // Deletar usuário
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuário deletado com sucesso.');
    }
}
