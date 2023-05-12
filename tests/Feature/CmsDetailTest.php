<?php

namespace Tests\Feature;

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
}
