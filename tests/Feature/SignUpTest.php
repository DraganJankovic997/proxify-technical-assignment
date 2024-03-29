<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SignUpTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_sign_up(): void
    {
        $response = $this->post('/api/auth/register', [
            'name' => 'Test Name',
            'email' => 'example@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertJsonStructure(['token']);
        $response->assertStatus(201);

        $this->assertDatabaseHas('users', [
            'name' => 'Test Name',
            'email' => 'example@gmail.com',
        ]);
    }
}
