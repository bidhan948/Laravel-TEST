<?php

namespace Tests;

use App\Models\cms;
use App\Models\cms_detail;
use App\Models\User;
use App\Models\user_category;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Sanctum\Sanctum;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();
    }

    public function createCMS($args = []): cms
    {
        return cms::factory()->create($args);
    }

    public function createCmsDetail($args = []): cms_detail
    {
        return cms_detail::factory()->create($args);
    }

    public function createUser($args = []): User
    {
        return User::factory()->create($args);
    }

    public function authUser()
    {
        return Sanctum::actingAs($this->createUser());
    }

    public function createUserCategory($args = [])
    {
        return user_category::factory()->create($args);
    }
}
