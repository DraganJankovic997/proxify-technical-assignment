<?php

namespace App\Handlers;

use App\Commands\CreateUserCommand;
use App\Contracts\Handlers\CreateUserHandlerContract;
use App\Contracts\Services\UserServiceContract;
use Illuminate\Support\Facades\Hash;

class CreateUserHandler implements CreateUserHandlerContract
{
    private UserServiceContract $userService;

    public function __construct(UserServiceContract $userService) {
        $this->userService = $userService;
    }

    public function handle(CreateUserCommand $command)
    {
        $user = $this->userService->createUser(
            $command->name,
            $command->email,
            bcrypt($command->password)
        );

        return [
            'token' => $user->createToken('apiToken')->plainTextToken
        ];
    }
}
