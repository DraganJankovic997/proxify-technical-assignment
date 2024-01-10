<?php

namespace App\Handlers;

use App\Contracts\Handlers\FetchProductsHandlerContract;
use App\Contracts\Services\StoreServiceContract;

final class FetchProductsHandler implements FetchProductsHandlerContract {

    private StoreServiceContract $storeService;

    public function __command(StoreServiceContract $storeService) {
        $this->storeService = $storeService;
    }

    public function handle()
    {
        return $this->storeService->getProducts();
    }
}
