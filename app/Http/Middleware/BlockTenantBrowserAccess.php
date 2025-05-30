<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockTenantBrowserAccess
{
    public function handle(Request $request, Closure $next)
    {
        // Domínio principal, que pode acessar normalmente:
        $mainDomain = 'localhost';

        // Extrai o host da requisição, ex: cliente2.localhost
        $host = $request->getHost(); 

        // Verifica se está acessando pelo domínio principal ou subdomínio (tenant)
        // Aqui assumimos que tenant é qualquer coisa antes do domínio principal
        $isTenant = $host !== $mainDomain;

        // Se for tenant e não espera JSON (ou seja, acessou via navegador normal)
        if ($isTenant && !$request->expectsJson()) {
            return response()->json([
                'message' => 'Acesso via navegador não permitido para tenants. Use API REST.'
            ], 403);
        }

        return $next($request);
    }
}
