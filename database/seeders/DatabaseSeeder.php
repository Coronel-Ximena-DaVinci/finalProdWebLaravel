<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Categories
        Category::updateOrCreate(['id' => 1], ['name' => 'Electrónica']);

        // Roles
        Role::updateOrCreate(['id' => Role::ADMIN], ['name' => 'Administrador']);
        Role::updateOrCreate(['id' => Role::CUSTOMER], ['name' => 'Comprador']);

        User::firstOrCreate(['email' => 'admin@admin.com'], [
            'name' => 'admin',
            'password' => Hash::make('admin'),
            'role_id' => Role::ADMIN,
        ]);
    }
}
