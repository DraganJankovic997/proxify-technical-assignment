<?php

namespace App\Handlers;

use App\Commands\UpdateProductCommand;
use App\Contracts\Handlers\UpdateProductHandlerContract;
use App\Contracts\Services\ProductServiceContract;

class UpdateProductHandler implements UpdateProductHandlerContract
{
    private ProductServiceContract $productService;

    public function __construct(ProductServiceContract $productService)
    {
        $this->productService = $productService;
    }

    public function handle(UpdateProductCommand $command)
    {
        return $this->productService->update(
            $command->uuid,
            $command->title,
            $command->description,
            $command->price,
            $command->image
        );
    }
}
