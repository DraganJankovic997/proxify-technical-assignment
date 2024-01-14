<?php

namespace App\Http\Controllers;

use App\Commands\CreateUserCommand;
use App\Commands\LoginCommand;
use App\Contracts\Handlers\CreateUserHandlerContract;
use App\Contracts\Handlers\LoginHandlerContract;
use App\Exceptions\InvalidCredentialsException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private CreateUserHandlerContract $signupHandler;

    private LoginHandlerContract $loginHandler;

    public function __construct(CreateUserHandlerContract $signupHandler, LoginHandlerContract $loginHandler)
    {
        $this->signupHandler = $signupHandler;
        $this->loginHandler = $loginHandler;
    }

    public function signUp(Request $request)
    {
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

            return response($this->signupHandler->handle($command), 201);
        } catch (\Exception $ex) {
            return response('Internal server error.', 500);
        }

    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        try {
            $command = new LoginCommand($validated['email'], $validated['password']);

            return response($this->loginHandler->handle($command), 200);
        } catch (InvalidCredentialsException $ex) {
            return response('Incorrect username or password', 400);
        } catch (ModelNotFoundException $ex) {
            return response('User with that email does not exist', 404);
        } catch (\Exception $ex) {
            return response('Internal server error', 500);
        }
    }
}
