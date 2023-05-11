<?php

namespace Tests\Feature;

use App\Models\cms;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;

class ContentTest extends TestCase
{
    use RefreshDatabase;

    private $cms;

    public function setUp(): void
    {
        parent::setUp();
        $this->cms = cms::factory()->create();
    }

    public function test_cms_index(): void
    {
        // Action
        // $cms = cms::factory()->create();

        // Act
        $response = $this->getJson(route('cms-json'));

        // Assert
        $this->assertEquals(1, count($response->json()));
    }

    public function test_cms_show()
    {

        $response = $this->getJson(route('cms.show', $this->cms))
            ->assertOk()
            ->json();

        $this->assertEquals($this->cms->slug, $response['slug']);
    }
}
