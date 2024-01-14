<?php

namespace App\Contracts\Services;

interface UserServiceContract
{
    public function createUser(string $name, string $email, string $password);
}
