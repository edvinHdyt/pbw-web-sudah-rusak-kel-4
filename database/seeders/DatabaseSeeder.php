<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Roles;
use App\Models\UserRoles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
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
        if (!User::where('email', 'suadmin@gmail.com')->exists()) {
            $user = User::create([
                'nama' => 'John Su',
                'email' => 'suadmin@gmail.com',
                'password' => Hash::make('password'),
                'no_telpon' => '081234567890',
                'alamat' => 'Bekasi',
                'email_verified_at' => Date::now()
            ]);

            // Assign admin role to test user
            $adminRole = Roles::where('nama_role', 'Super Admin')->first();
            if ($adminRole) {
                UserRoles::create([
                    'id_user' => $user->id_user,
                    'id_role' => $adminRole->id_roles,
                ]);
            }
        }

        if (!User::where('email', 'admin@gmail.com')->exists()) {
            $user = User::create([
                'nama' => 'Jane Min',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'no_telpon' => '081234567890',
                'alamat' => 'Bekasi',
                'email_verified_at' => Date::now()
            ]);

            // Assign admin role to test user
            $adminRole = Roles::where('nama_role', 'Admin')->first();
            if ($adminRole) {
                UserRoles::create([
                    'id_user' => $user->id_user,
                    'id_role' => $adminRole->id_roles,
                ]);
            }
        }

        if (!User::where('email', 'teknisi@gmail.com')->exists()) {
            $user = User::create([
                'nama' => 'Karsa',
                'email' => 'teknisi@gmail.com',
                'password' => Hash::make('password'),
                'no_telpon' => '081234567890',
                'alamat' => 'Bekasi',
                'email_verified_at' => Date::now()
            ]);

            // Assign admin role to test user
            $adminRole = Roles::where('nama_role', 'Teknisi')->first();
            if ($adminRole) {
                UserRoles::create([
                    'id_user' => $user->id_user,
                    'id_role' => $adminRole->id_roles,
                ]);
            }
        }
    }
}
