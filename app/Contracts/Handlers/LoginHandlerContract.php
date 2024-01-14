<?php

namespace App\Contracts\Handlers;

use App\Commands\LoginCommand;

interface LoginHandlerContract
{
    public function handle(LoginCommand $command);
}
