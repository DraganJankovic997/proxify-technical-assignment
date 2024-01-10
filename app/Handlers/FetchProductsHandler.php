<?php

namespace App\Handlers;

use App\Contracts\Handlers\FetchProductsHandlerContract;
use App\Contracts\Services\ProductServiceContract;
use App\Contracts\Services\StoreServiceContract;
use App\Services\ProductService;

final class FetchProductsHandler implements FetchProductsHandlerContract {

    private StoreServiceContract $storeService;
    private ProductServiceContract $productService;

    public function __construct(StoreServiceContract $storeService, ProductServiceContract $productService) {
        $this->storeService = $storeService;
        $this->productService = $productService;
    }

    public function handle()
    {
        $products = $this->storeService->getProducts();

        foreach ($products as $product) {
            $this->productService->saveOrUpdate($product);
        }
    }
}
