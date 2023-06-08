<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery\MockInterface;
use Tests\TestCase;
use Google\Client;

class GoogleServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = $this->authUser();
    }

    public function test_if_user_can_connect_to_google_service(): void
    {
        $this->mock(Client::class, function (MockInterface $mock) {
            $mock->shouldReceive('setScopes');
            $mock->shouldReceive('createAuthUrl')
                ->andReturn('http://localhost:8000');
        });

        $response = $this->getJson(route('service.connect'))
            ->assertOk()
            ->json();

        $this->assertNotNull($response['url']);
    }

    public function test_if_user_google_service_acess_token_is_stored(): void
    {
        $this->mock(Client::class, function (MockInterface $mock) {
            $mock->shouldReceive('fetchAccessTokenWithAuthCode')
                ->andReturn('myCode');
        });

        $this->postJson(
            route('service.callback'),
            [
                'user_id' => $this->user->id,
                'code' => 'myCode'
            ]
        )
            ->assertCreated();

        $this->assertDatabaseHas('google_services', ['user_id' => $this->user->id]);
    }
}
