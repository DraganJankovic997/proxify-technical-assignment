<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class FetchProductsCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_command_inserts_new_products(): void
    {
        Http::fake([
            'http://fakestoreapi.com/products' => Http::response($this->getproductsArray()),
        ]);
        $this->assertEquals(DB::table('products')->count(), 0);
        $this->artisan('fetch-products');

        $this->assertEquals(DB::table('products')->count(), count($this->getproductsArray()));
    }

    public function test_command_updates_existing_products(): void
    {
        Http::fake([
            'http://fakestoreapi.com/products' => Http::response($this->getproductsArray()),
        ]);

        DB::table('products')->insert([
            'uuid' => 'some-valid-test-uuid',
            'id' => 3,
            'title' => 'Should be overwritten',
            'price' => 55.99,
            'description' => 'Great outerwear jackets for Spring/Autumn/Winter.',
            'category' => 'men\'s clothing',
            'image' => 'https://fakestoreapi.com/img/71li-ujtlUL._AC_UX679_.jpg',
            'rate' => 4.7,
            'count' => 500,
        ]);

        $prod = DB::table('products')->where('id', 3)->first();
        $this->assertEquals($prod->title, 'Should be overwritten');
        $this->artisan('fetch-products');
        $prod = DB::table('products')->where('id', 3)->first();
        $this->assertEquals($prod->title, 'Mens Cotton Jacket');
    }

    public function getproductsArray()
    {
        return [
            [
                'id' => 1,
                'title' => 'Fjallraven - Foldsack No. 1 Backpack, Fits 15 Laptops',
                'price' => 109.95,
                'description' => 'Your perfect pack for everyday use and walks in the forest.',
                'category' => 'men\'s clothing',
                'image' => 'https://fakestoreapi.com/img/81fPKd-2AYL._AC_SL1500_.jpg',
                'rating' => [
                    'rate' => 3.9,
                    'count' => 120,
                ],
            ],
            [
                'id' => 2,
                'title' => 'Mens Casual Premium Slim Fit T-Shirts ',
                'price' => 22.3,
                'description' => 'Slim-fitting style, contrast raglan long sleeve.',
                'category' => 'men\'s clothing',
                'image' => 'https://fakestoreapi.com/img/71-3HjGNDUL._AC_SY879._SX._UX._SY._UY_.jpg',
                'rating' => [
                    'rate' => 4.1,
                    'count' => 259,
                ],
            ],
            [
                'id' => 3,
                'title' => 'Mens Cotton Jacket',
                'price' => 55.99,
                'description' => 'Great outerwear jackets for Spring/Autumn/Winter.',
                'category' => 'men\'s clothing',
                'image' => 'https://fakestoreapi.com/img/71li-ujtlUL._AC_UX679_.jpg',
                'rating' => [
                    'rate' => 4.7,
                    'count' => 500,
                ],
            ],
        ];
    }
}
