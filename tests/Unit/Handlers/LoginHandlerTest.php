<?php

namespace Tests\Unit\Handlers;

use App\Commands\LoginCommand;
use App\Contracts\Services\UserServiceContract;
use App\Exceptions\InvalidCredentialsException;
use App\Handlers\LoginHandler;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginHandlerTest extends TestCase
{
    protected $userService;

    protected $loginHandler;

    public string $hashed;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userService = $this->createMock(UserServiceContract::class);
        $this->loginHandler = new LoginHandler($this->userService);
        $this->hashed = bcrypt('password');
    }

    public function test_user_can_login(): void
    {
        $command = new LoginCommand('test@example.com', 'password');

        $userMock = $this->getMockBuilder(User::class)
            ->onlyMethods(['createToken'])
            ->getMock();
        $userMock->method('createToken')->willReturn((object) ['plainTextToken' => 'api_token']);

        $this->userService->expects($this->once())
            ->method('findUserByEmail')
            ->with('test@example.com')
            ->willReturn($userMock);

        Hash::shouldReceive('check')->once()->andReturn(true);

        $res = $this->loginHandler->handle(($command));
        $this->assertSame(['token' => 'api_token'], $res);
    }

    public function test_wrong_password_throws_an_exception(): void
    {
        Hash::shouldReceive('check')->once()->andReturn(false);
        Hash::shouldIgnoreMissing();

        $this->userService->method('findUserByEmail')
            ->willReturn(new User(['email' => 'test@example.com', 'password' => $this->hashed]));

        $this->expectException(InvalidCredentialsException::class);
        $command = new LoginCommand('test@example.com', 'wrong-password');
        $this->loginHandler->handle($command);
    }
}
