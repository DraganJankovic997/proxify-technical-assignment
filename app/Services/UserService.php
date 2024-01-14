<?php

namespace App\Services;

use App\Contracts\Services\UserServiceContract;
use App\Models\User;

class UserService implements UserServiceContract
{

    public function createUser(string $name, string $email, string $password)
    {
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);
    }

    public function findUserByEmail(string $email) {
        return User::where('email', $email)->firstOrFail();
    }
}
