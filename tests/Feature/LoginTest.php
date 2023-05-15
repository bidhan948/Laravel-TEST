<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_user_can_login_with_email_and_password(): void
    {
        $user = $this->createUser();

        $response = $this->postJson(route('user.login'), [
            'email' => $user->email,
            'password' => 'password'
        ])->assertOk()->json();

        $this->assertArrayHasKey('token', $response);
    }

    public function test_if_user_email_is_wrong_then_throw_error(): void
    {
        $this->postJson(route('user.login'), [
            'email' => 'bidhanbaniya789@gmail.com',
            'password' => 'password'
        ])->assertUnauthorized();
    }

    public function test_if_user_password_is_wrong_then_throw_error(): void
    {
        $user = $this->createUser();

        $this->postJson(route('user.login'), [
            'email' => $user->email,
            'password' => 'nopassword'
        ])->assertUnauthorized();
    }
}
