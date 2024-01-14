<?php

namespace App\Http\Controllers;

use App\Commands\UpdateProductCommand;
use App\Contracts\Handlers\UpdateProductHandlerContract;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class UpdateProductController extends Controller
{

    private UpdateProductHandlerContract $handler;

    public function __construct(UpdateProductHandlerContract $handler) {
        $this->handler = $handler;
    }

    public function update(Request $request, string $uuid) {

        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'image' => ['nullable', 'url:http,https'],
        ]);

        try {
            $command = new UpdateProductCommand(
                $uuid,
                $validated['title'] ?? null,
                $validated['description'] ?? null,
                $validated['price'] ?? null,
                $validated['image'] ?? null
            );


            return response($this->handler->handle($command), 200);
        } catch(ModelNotFoundException $ex){
            return response('Product with UUID does not exist.', 404);
        } catch(\Exception $ex) {
            return response('Internal server error', 500);
        }
    }
}
