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
            ['id_roles' => (string) Str::uuid(), 'nama_role' => 'superadmin', 'created_at' => now(), 'updated_at' => now()],
            ['id_roles' => (string) Str::uuid(), 'nama_role' => 'admin', 'created_at' => now(), 'updated_at' => now()],
            ['id_roles' => (string) Str::uuid(), 'nama_role' => 'teknisi', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('roles')->insert($roles);
    }
}
