<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleMitra = Role::create(['name' => 'mitra']);
        $roleUser = Role::create(['name' => 'user']);

        $user = \App\Models\User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user123')
        ]);
        $user->assignRole($roleUser);

        $user = \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123')
        ]);
        $user->assignRole($roleAdmin);

        $user = \App\Models\User::create([
            'name' => 'Mitra',
            'email' => 'mitra@gmail.com',
            'password' => bcrypt('mitra123')
        ]);
        $user->assignRole($roleMitra);
    }
}
