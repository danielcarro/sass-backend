<?php
// routes/web.php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;

Auth::routes([
    'register' => false,       // Desativa o registro
    'reset' => false,          // Desativa "esqueci a senha"
    'verify' => false,         // Desativa verificação de e-mail
]);


Route::middleware(['block.tenant.browser', 'auth', 'role:admin'])->group(function () {

    Route::resource('tenants', TenantController::class);
    Route::resource('users', UserController::class,);
    Route::resource('roles', RoleController::class,);
    Route::resource('permissions', PermissionController::class);
    Route::resource('clients', ClientController::class);
    Route::get('/', [DashboardController::class, 'index'])->name('/');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
});

Route::get('/teste', function () {
    return 'Você é admin!';
})->middleware('auth', 'role:admin');
