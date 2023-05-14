<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_user_can_register(): void
    {

        $this->postJson(
            route('user.register'),
            [
                'name' => 'Bidhan baniya',
                'email' => 'bidhanbaniya789@gmail.com',
                'password' => 'bidhan987',
                'password_confirmation' => 'bidhan987',
            ]
        )->assertCreated()->json();

        $this->assertDatabaseHas('users', ['email' => 'bidhanbaniya789@gmail.com']);
    }

    public function test_user_register_method_validation(): void
    {

        $this->withExceptionHandling();

        $this->postJson(
            route('user.register')
        )->assertUnprocessable()->assertJsonValidationErrors(['name', 'email', 'password']);
    }
}
