<?php

namespace Database\Seeders;

use App\Models\MitraProfile;
use App\Models\UserProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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

        UserProfile::create([
            'user_id' => $user->id,
            'uuid' => Str::uuid(),
            'profile_image' => 'profile_default.jpg'
        ]);

        $admin = \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123')
        ]);
        $admin->assignRole($roleAdmin);

        $mitra = \App\Models\User::create([
            'name' => 'Mitra',
            'email' => 'mitra@gmail.com',
            'password' => bcrypt('mitra123')
        ]);
        $mitra->assignRole($roleMitra);

        MitraProfile::create([
            'user_id' => $mitra->id,
            'logo' => 'profile_default.jpg',
            'uuid' => Str::uuid()
        ]);

        $mitra = \App\Models\User::create([
            'name' => 'Tokopedia',
            'email' => 'tokopedia@gmail.com',
            'password' => bcrypt('mitra123')
        ]);
        $mitra->assignRole($roleMitra);

        MitraProfile::create([
            'user_id' => $mitra->id,
            'logo' => 'tokopedia.png',
            'uuid' => Str::uuid()
        ]);
    }
}
