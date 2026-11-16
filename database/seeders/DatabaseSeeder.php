<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Roles;
use App\Models\UserRoles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            ServiceSeeder::class,
        ]);

        // Create test user if not exists
        if (!User::where('email', 'test@example.com')->exists()) {
            $user = User::create([
                'nama' => 'Test User',
                'email' => 'test@example.com',
                'password' => Hash::make('password'),
                'no_telpon' => '081234567890',
                'alamat' => 'Bekasi',
            ]);

            // Assign admin role to test user
            $adminRole = Roles::where('nama_role', 'admin')->first();
            if ($adminRole) {
                UserRoles::create([
                    'id_user' => $user->id_user,
                    'id_role' => $adminRole->id_roles,
                ]);
            }
        }
    }
}
