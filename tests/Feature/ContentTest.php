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
    /**
     * A basic feature test example.
     */
    public function test_cms_index(): void
    {
        cms::create(['name' => 'Randoom', 'slug' => Str::slug('this is title'), 'description' => Str::random(30)]);

        $response = $this->getJson(route('cms-json'));

        $this->assertEquals(1, count($response->json()));
    }
}
