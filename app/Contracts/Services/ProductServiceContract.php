<?php

namespace App\Contracts\Services;

use App\Models\Product;

interface ProductServiceContract
{
    function saveOrUpdate(array $product);
    function update(string $uuid, ?string $title, ?string $description, ?string $price, ?string $image);
}
