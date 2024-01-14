<?php

namespace App\Contracts\Services;

interface ProductServiceContract
{
    public function saveOrUpdate(array $product);

    public function update(string $uuid, ?string $title, ?string $description, ?string $price, ?string $image);
}
