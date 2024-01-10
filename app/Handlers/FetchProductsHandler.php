<?php

namespace App\Handlers;

use App\Contracts\Handlers\FetchProductsHandlerContract;
use App\Contracts\Services\StoreServiceContract;

final class FetchProductsHandler implements FetchProductsHandlerContract {

    private StoreServiceContract $storeService;

    public function __construct(StoreServiceContract $storeService) {
        $this->storeService = $storeService;
    }

    public function handle()
    {
        $products = $this->storeService->getProducts();

        foreach ($products as $product) {

        }

        return $this->storeService->getProducts();
    }
}
