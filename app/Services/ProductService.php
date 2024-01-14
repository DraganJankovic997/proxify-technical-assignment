<?php

namespace App\Services;

use App\Contracts\Services\ProductServiceContract;
use App\Models\Product;

final class ProductService implements ProductServiceContract
{
    public function saveOrUpdate(array $product)
    {
        return Product::updateOrCreate(
            [
                'id' => $product['id'],
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

    public function update(string $uuid, ?string $title, ?string $description, ?string $price, ?string $image)
    {
        $product = Product::where('uuid', $uuid)->firstOrFail();

        $product->title = $title ?? $product->title;
        $product->description = $description ?? $product->description;
        $product->price = $price ?? $product->price;
        $product->image = $image ?? $product->image;

        return $product->save();
    }
}
