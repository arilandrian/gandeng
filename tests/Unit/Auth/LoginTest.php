<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase; // Ini akan me-refresh database sebelum setiap test

    /** @test */
    public function user_can_view_a_login_form()
    {
        $response = $this->get('/login'); // Mengunjungi halaman login

        $response->assertSuccessful(); // Memastikan status HTTP 200 (OK)
        $response->assertViewIs('auth.login'); // Memastikan view yang dirender adalah 'auth.login'
    }

    /** @test */
    public function user_can_login_with_correct_credentials()
    {
        // Membuat user dummy untuk pengujian
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => 'donatur', // Sesuaikan role
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $this->assertAuthenticatedAs($user); // Memastikan user sudah terautentikasi
        $response->assertRedirect('/dashboard/donatur'); // Memastikan redirect ke dashboard donatur
    }

    /** @test */
    public function user_cannot_login_with_invalid_credentials()
    {
        // Membuat user dummy (untuk memastikan database tidak kosong)
        User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => 'donatur',
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'wrong-password', // Password salah
        ]);

        $this->assertGuest(); // Memastikan user tidak terautentikasi (masih guest)
        $response->assertSessionHasErrors('email'); // Memastikan ada error pada field email
    }

    /** @test */
    public function authenticated_user_cannot_view_login_form()
    {
        $user = User::factory()->create(); // Membuat user dan langsung mengautentikasi

        $response = $this->actingAs($user)->get('/login'); // Mengunjungi halaman login sebagai user yang sudah login

        $response->assertRedirect('/home'); // Laravel/ui default ke /home jika sudah login. Sesuaikan dengan redirectIfAuthenticated di app/Http/Middleware/RedirectIfAuthenticated.php
    }
}