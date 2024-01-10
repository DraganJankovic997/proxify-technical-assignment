<?php

namespace App\Services;

use App\Contracts\Services\ProductServiceContract;
use App\Models\Product;

final class ProductService implements ProductServiceContract {

    function saveOrUpdate(array $product)
    {
        return Product::updateOrCreate(
            [
                'id' => $product['id']
            ],
            [
                'title' => $product['title'],
                'price' => $product['price'],
                'description' => $product['description'],
                'category' => $product['category'],
                'image' => $product['image'],
                'rate' => $product['rating']['rate'],
                'count' => $product['rating']['count'],
            ]);
    }
}
