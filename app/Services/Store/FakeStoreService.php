<?php

namespace App\Services\Store;

use App\Contracts\Services\StoreServiceContract;
use Illuminate\Support\Facades\Http;

final class FakeStoreService implements StoreServiceContract
{
    public function getProducts()
    {
        return Http::get(config('services.fakeStore.url').config('services.fakeStore.slug'))->json();
    }
}
