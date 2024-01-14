<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_user_can_login(): void
    {
        $this->post('/api/auth/register', [
            'name' => 'Login Test',
            'email' => 'login_test@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);


        $response = $this->post('/api/auth/login', [
            'email' => 'login_test@gmail.com',
            'password' => 'password'
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['token']);
    }
}
