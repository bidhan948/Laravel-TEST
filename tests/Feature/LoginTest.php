<?php

namespace Tests\Feature;

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
}
