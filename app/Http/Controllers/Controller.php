<?php

namespace App\Http\Controllers;

use App\Contracts\Services\StoreServiceContract;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    private StoreServiceContract $storeService;

    public function __construct(StoreServiceContract $storeService) {
        $this->storeService = $storeService;
    }

    public function test(Request $request) {
        return response($this->storeService->getProducts(), 200);
    }
}
