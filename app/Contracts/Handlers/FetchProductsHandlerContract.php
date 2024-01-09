<?php

namespace App\Contracts\Handlers;

use App\Commands\FetchProductsCommand;

interface FetchProductsHandlerContract {
    public function handle(FetchProductsCommand $command);
}
