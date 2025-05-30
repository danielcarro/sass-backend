<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserBelongsToTenant
{
    public function handle(Request $request, Closure $next): Response
    {
        $tenant = tenant(); // atual tenant da URL (carregado pelo domínio)
        $user = auth()->user();

        if (!$tenant || !$user) {
            return response()->json(['message' => 'Não autenticado.'], 401);
        }

        // Verifica se o usuário está vinculado ao tenant
        if (!$tenant->users()->where('user_id', $user->id)->exists()) {
            return response()->json(['message' => 'Acesso negado ao tenant.'], 403);
        }

        return $next($request);
    }
}
