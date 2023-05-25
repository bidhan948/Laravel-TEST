<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GoogleServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_user_can_connect_to_google_service(): void
    {
        $this->authUser();

        $response = $this->getJson(route('service.connect'))
            ->assertOk()
            ->json();

        $this->assertNotNull($response['url']);
    }
}
