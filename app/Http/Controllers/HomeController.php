<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'tenantsCount' => Tenant::count(),
            'usersCount' => User::count(),
        ]);
    }
}
