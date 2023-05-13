<?php

namespace Tests\Feature;

use App\Models\cms;
use App\Models\cms_detail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CmsDetailTest extends TestCase
{
    use RefreshDatabase;

    public function test_cms_detail_index(): void
    {
        $cms = $this->createCMS();
        $cms_detail = $this->createCmsDetail(['cms_id' => $cms->id]);

        $response = $this->getJson(route('cms.cms_detail.index', $cms))
            ->assertOk()
            ->json();

        $this->assertEquals($cms_detail->name, $response[0]['name']);
        $this->assertEquals($cms->id, $response[0]['cms_id']);
    }

    public function test_cms_detail_store(): void
    {
        $cms = $this->createCMS();
        $cms_detail = cms_detail::factory()->make();

        $this->postJson(route('cms.cms_detail.store', $cms), [
            'name' => $cms_detail->name,
            'description' => $cms_detail->description
        ])->assertCreated();

        $this->assertDatabaseHas('cms_details', ['name' => $cms_detail->name]);
    }

    public function test_cms_detail_store_validation(): void
    {
        $this->withExceptionHandling();

        $cms = $this->createCMS();

        $this->postJson(route('cms.cms_detail.store', $cms))
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['name']);
    }

    public function test_cms_detail_update(): void
    {
        $cms_detail = $this->createCmsDetail();

        $this->putJson(route('cms_detail.update', $cms_detail), [
            'name' => 'This is test',
        ])->assertOk();

        $this->assertDatabaseHas('cms_details', ['name' => 'This is test']);
    }

    public function test_cms_detail_update_validation(): void
    {
        $this->withExceptionHandling();
        
        $cms_detail = $this->createCmsDetail();

        $this->putJson(route('cms_detail.update', $cms_detail))
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['name']);
    }
}
