<?php

namespace Tests\Feature;

use App\Models\user_category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserCategoryTest extends TestCase
{
    use RefreshDatabase;

    protected $user_category;
    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = $this->authUser();
        $this->user_category = $this->createUserCategory();
    }

    public function test_user_category_index(): void
    {
        $this->createUserCategory(['user_id' => $this->user->id]);

        $response = $this->getJson(route('category.index'))->json();

        $this->assertEquals(1, count($response));
    }


    public function test_user_category_store(): void
    {
        $user_category = user_category::factory()->raw();

        $this->postJson(route('category.store'), $user_category)->assertCreated();

        $this->assertDatabaseHas('user_categories', ['name' => $user_category['name']]);
    }

    public function test_user_category_update(): void
    {
        $this->putJson(route('category.update', $this->user_category), [
            'name' => 'TESTTTT'
        ])->assertOk();

        $this->assertDatabaseHas('user_categories', ['name' => 'TESTTTT']);
    }

    public function test_user_category_destroy(): void
    {
        $this->deleteJson(route('category.destroy', $this->user_category))->assertNoContent();

        $this->assertDatabaseMissing('user_categories', ['name' => $this->user_category->name]);
    }

    public function test_user_category_store_validation(): void
    {
        $this->withExceptionHandling();

        $this->postJson(route('category.store'))
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['name']);
    }
}
