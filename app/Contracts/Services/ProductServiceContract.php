<?php

namespace App\Contracts\Services;

use App\Models\Product;

interface ProductServiceContract
{
    function saveOrUpdate(array $product);
}
