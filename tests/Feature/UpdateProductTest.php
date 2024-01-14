<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\Models\User;

class UpdateProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_update_product(): void
    {
        $user =  User::factory()->create();
        $token = $user->createToken('test-token')->plainTextToken;
        $uuid = '9b17ca6d-c9ad-4552-a27d-b6e66a8796bb';

        $initial = [
            'uuid' => $uuid,
            'id' => 99,
            'title' => 'Test title',
            'price' => 99.99,
            'description' => 'Test description',
            'category' => 'Test category',
            'image' => 'https://example.com/image',
            'rate' => 3.3,
            'count' => 250
        ];

        DB::table('products')->insert($initial);

        $this->assertDatabaseHas('products', [
            'title' => 'Test title',
            'uuid' => $uuid
        ]);

        $response = $this->put(
            '/api/product/' . $uuid,
            [ 'title' => 'New test title' ],
            [ 'Authorization' => 'Bearer ' . $token]
        );

        $response->assertStatus(200);
        $this->assertDatabaseMissing('products', [
            'title' => 'Test title',
            'uuid' => $uuid
        ]);
        $this->assertDatabaseHas('products', [
            'title' => 'New test title',
            'uuid' => $uuid
        ]);

    }

    public function test_user_cannot_update_nonexistent_product(): void
    {
        // Create a user and get the token.
        $user = User::factory()->create();
        $token = $user->createToken('test-token')->plainTextToken;

        // Generate a uuid that doesn't exist in your database
        $nonexistentUuid = 'non-existent-uuid';

        // Try to update product with non-existent uuid
        $response = $this->put(
            '/api/product/' . $nonexistentUuid,
            ['title' => 'New test title'],
            ['Authorization' => 'Bearer ' . $token]
        );

        // Assert that the response status is a 404 (not found).
        $response->assertStatus(404);
    }
}
