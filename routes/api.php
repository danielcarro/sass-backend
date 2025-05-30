<?php
// routes/api.php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\Api\TenantApiController;


Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken('api-token')->plainTextToken;
});

Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});

Route::middleware(['api', 'auth:sanctum'])->group(function () {
    Route::post('/tenants', [TenantApiController::class, 'store']);
});

Route::middleware([
    'api',
    'auth:sanctum',
    InitializeTenancyByDomain::class,
    'tenant.access',
])->group(function () {
    Route::get('/tenant', [TenantApiController::class, 'me']);
    Route::get('/user', function (Request $request) {
        return $request->user(); // retorna dados do usuário autenticado
    });
});




/*

Route::middleware([
    'api',
    'auth:sanctum',
    InitializeTenancyByDomain::class,
])->prefix('owner')->group(function () {
    Route::apiResource('tenants', \App\Http\Controllers\TenantController::class)
        ->except(['destroy']);
      Route::get('/user', function (Request $request) {
        return $request->user(); 
    });
     
});

Route::middleware([
    'api',
    'auth:sanctum',
    InitializeTenancyByDomain::class,
])->prefix('manager')->group(function () {    
      Route::get('/user', function (Request $request) {
        return $request->user(); 
    });
       // Ex: Gestão de usuários do tenant
    //Route::apiResource('users', \App\Http\Controllers\UserController::class);

    // Ex: Acesso a relatórios operacionais
    //Route::get('/reports', [\App\Http\Controllers\ReportController::class, 'index']);
     
});

Route::middleware([
    'api',
    'auth:sanctum',
    InitializeTenancyByDomain::class,
])->prefix('viewer')->group(function () {    
      Route::get('/user', function (Request $request) {
        return $request->user(); 
    });   
      // Ex: Acesso somente a relatórios
    //Route::get('/reports', [\App\Http\Controllers\ReportController::class, 'index']);  
});

*/
