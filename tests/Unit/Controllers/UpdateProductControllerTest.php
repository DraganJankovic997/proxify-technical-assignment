<?php

namespace Tests\Unit\Controllers;

use App\Commands\UpdateProductCommand;
use App\Contracts\Handlers\UpdateProductHandlerContract;
use App\Http\Controllers\UpdateProductController;
use Illuminate\Http\Request;
use Tests\TestCase;
use Mockery;

class UpdateProductControllerTest extends TestCase
{

    public function test_controller_calls_handler_with_proper_parameters(): void
    {
        $handlerMock = Mockery::mock(UpdateProductHandlerContract::class);

        $handlerMock->shouldReceive('handle')
            ->once()
            ->with(Mockery::on(function ($command) {
                return $command instanceof UpdateProductCommand
                    && $command->uuid === '9b17ca6d-c9ad-4552-a27d-b6e66a8796bb'
                    && $command->title === 'test_title'
                    && $command->description === 'test_description'
                    && $command->price === 10.99
                    && $command->image === 'http://example.com/some_image';
            }));

        $controller = new UpdateProductController($handlerMock);

        $controller->update(Request::create('/api/product/9b17ca6d-c9ad-4552-a27d-b6e66a8796bb', 'PUT', [
            'title' => 'test_title',
            'description' => 'test_description',
            'price' => 10.99,
            'image' => 'http://example.com/some_image'
        ]), '9b17ca6d-c9ad-4552-a27d-b6e66a8796bb');
    }
}
