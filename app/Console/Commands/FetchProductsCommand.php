<?php

namespace App\Console\Commands;

use App\Contracts\Handlers\FetchProductsHandlerContract;
use Illuminate\Console\Command;

class FetchProductsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command sends a GET request to the Store API and saves or updates the products in the local database';

    /**
     * Execute the console command.
     */
    public function handle(FetchProductsHandlerContract $handler)
    {
        try {
            $handler->handle();
            echo 'Product fetching complete.';
        } catch (\Exception $exception) {
            echo 'Product fetching failed with message: '.$exception->getMessage();
            echo $exception->getTrace();
        }
    }
}
