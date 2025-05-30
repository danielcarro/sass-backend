<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Exibe a lista de todos os papéis (roles).
     */
    public function index()
    {
        $roles = Role::with('permissions')->get(); // Carrega também as permissões de cada role
        return view('roles.index', compact('roles'));
    }

    /**
 * Exibe o formulário para criar um novo papel.
 */
public function create()
{
    $permissions = Permission::all();
    return view('roles.create', compact('permissions'));
}

/**
 * Salva um novo papel e atribui permissões, se fornecidas.
 */
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|unique:roles,name',
        'permissions' => 'array',
        'permissions.*' => 'exists:permissions,id',
    ]);

    $role = Role::create(['name' => $request->name]);
    $role->syncPermissions($request->permissions ?? []);

    return redirect()->route('roles.index')->with('success', 'Papel criado com sucesso!');
}


    /**
     * Exibe detalhes de um papel específico e suas permissões.
     */
    public function show($id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        return view('roles.show', compact('role'));
    }

    /**
     * Exibe o formulário de edição de permissões de um papel.
     */
    public function edit($roleId)
    {
        $role = Role::findOrFail($roleId);
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Atualiza as permissões de um papel.
     */
    public function update(Request $request, $roleId)
    {
        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permissions ?? []);
        return redirect()->back()->with('success', 'Permissões atualizadas com sucesso!');
    }

    /**
     * Remove um papel.
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Papel excluído com sucesso!');
    }
}
