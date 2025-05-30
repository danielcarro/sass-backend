<?php

namespace Database\Seeders;

// database/seeders/RolesSeeder.php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    public function run()
    {
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'owner']);
        Role::firstOrCreate(['name' => 'manager']);
        Role::firstOrCreate(['name' => 'viewer']);
    }
}

