<?php

namespace Tests;

use App\Models\cms;
use App\Models\cms_detail;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    
    public function setUp(): void
    {
        parent::setUp();
        
        $this->withoutExceptionHandling();
    }

    public function createCMS($args = [])
    {
        return cms::factory()->create($args);
    }

    public function createCmsDetail($args = [])
    {
        return cms_detail::factory()->create($args);
    }
}
