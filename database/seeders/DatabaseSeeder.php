<?php

namespace Database\Seeders;

use App\Models\User;
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
        ]);

        User::create([
            'id_user' => (string) Str::uuid(),
            'nama' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'no_telpon' => '081234567890',
            'alamat' => 'Bekasi',
        ]);
    }
}