<?php

namespace App\Handlers;

use App\Commands\FetchProductsCommand;
use App\Contracts\Handlers\FetchProductsHandlerContract;
use App\Contracts\Services\StoreServiceContract;
use App\Services\Store\FakeStoreService;

final class FetchProductsHandler implements FetchProductsHandlerContract {

    private StoreServiceContract $storeService;

    public function __command(StoreServiceContract $storeService) {
        $this->storeService = $storeService;
    }

    public function handle(FetchProductsCommand $command)
    {
        return $this->storeService->getProducts($command->limit);
    }
}
