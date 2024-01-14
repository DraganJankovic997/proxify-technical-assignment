<?php

namespace App\Contracts\Handlers;

use App\Commands\CreateUserCommand;

interface CreateUserHandlerContract
{
    public function handle(CreateUserCommand $command);
}
