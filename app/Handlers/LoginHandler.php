<?php

namespace App\Handlers;

use App\Commands\LoginCommand;
use App\Contracts\Handlers\LoginHandlerContract;
use App\Contracts\Services\UserServiceContract;
use App\Exceptions\InvalidCredentialsException;
use Illuminate\Support\Facades\Hash;

class LoginHandler implements LoginHandlerContract
{
    private UserServiceContract $userService;

    public function __construct(UserServiceContract $userService)
    {
        $this->userService = $userService;
    }

    public function handle(LoginCommand $command)
    {
        $user = $this->userService->findUserByEmail($command->email);

        if (! Hash::check($command->password, $user->password)) {
            throw new InvalidCredentialsException();
        }

        return [
            'token' => $user->createToken('apiToken')->plainTextToken,
        ];
    }
}
