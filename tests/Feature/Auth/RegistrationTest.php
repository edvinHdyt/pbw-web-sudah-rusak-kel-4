<?php

namespace Tests\Feature\Auth;

use App\Models\Roles;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register(): void
    {
        $this->seed(RoleSeeder::class);

        $response = $this->post('/register', [
            'nama' => 'Test User',
            'no_telpon' => '081234567890',
            'email' => 'test@example.com',
            'alamat' => 'Bekasi Timur',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));

        $user = User::where('email', 'test@example.com')->first();
        $this->assertNotNull($user);
        $this->assertSame('Test User', $user->nama);
        $this->assertSame('081234567890', $user->no_telpon);
        $this->assertSame('Bekasi Timur', $user->alamat);
        $this->assertTrue($user->hasRole('admin'));
    }
}
