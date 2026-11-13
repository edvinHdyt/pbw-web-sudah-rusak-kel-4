<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['id_roles' => (string) Str::uuid(), 'nama_role' => 'Super Admin', 'created_at' => now(), 'updated_at' => now()],
            ['id_roles' => (string) Str::uuid(), 'nama_role' => 'Admin', 'created_at' => now(), 'updated_at' => now()],
            ['id_roles' => (string) Str::uuid(), 'nama_role' => 'Teknisi', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('roles')->insert($roles);
    }
}
