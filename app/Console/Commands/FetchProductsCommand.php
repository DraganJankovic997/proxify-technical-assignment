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
    protected $description = 'This command sends a GET request to the Store API and saves or updates the products in the localdatabase';

    /**
     * Execute the console command.
     */
    public function handle(FetchProductsHandlerContract $handler)
    {
        $handler->handle();
    }
}
