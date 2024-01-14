<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class FetchProductsCommandTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $this->assertEquals(DB::table('products')->count(), 0);
        $this->artisan('fetch-products');

        $this->assertTrue(DB::table('products')->count() > 0);
    }
}
