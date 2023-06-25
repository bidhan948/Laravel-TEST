<?php

namespace Tests\Unit;

use App\Models\cms;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_user_has_many_relation_with_cms(): void
    {
        $user = $this->createUser();
        $this->createCMS(['user_id' => $user->id]);

        $this->assertInstanceOf(cms::class, $user->cms->first());
    }


    public function test_if_cms_has_belongs_to_relation_with_user(): void
    {
        $user = $this->createUser();
        $cms = $this->createCMS(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $cms->User);
    }

    public function test_if_google_service_has_belongs_to_relation_with_user(): void
    {
        $user =  $this->createUser();
        $google_service = $this->createGoogleService(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $google_service->User);
    }
}
