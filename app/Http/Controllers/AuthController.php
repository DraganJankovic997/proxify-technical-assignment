<?php

namespace App\Http\Controllers;

use App\Commands\CreateUserCommand;
use App\Contracts\Handlers\CreateUserHandlerContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    private CreateUserHandlerContract $handler;

    public function __construct(CreateUserHandlerContract $handler) {
        $this->handler = $handler;
    }

    public function signUp(Request $request) {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed'],
        ]);

        try {
            $command = new CreateUserCommand(
                $validated['name'],
                $validated['email'],
                $validated['password']
            );

            return response($this->handler->handle($command), 201);
        } catch(\Exception $ex) {
            return response('Internal server error.', 500);
        }

    }
}
