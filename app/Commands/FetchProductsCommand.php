<?php

namespace App\Commands;

class FetchProductsCommand
{
    public int $limit;

    public function __construct(int $limit) {
        $this->limit = $limit;
    }
}
