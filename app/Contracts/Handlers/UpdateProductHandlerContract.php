<?php

namespace App\Contracts\Handlers;

use App\Commands\UpdateProductCommand;

interface UpdateProductHandlerContract {
    public function handle(UpdateProductCommand $command);
}
