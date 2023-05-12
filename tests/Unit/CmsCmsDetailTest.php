<?php

namespace Tests\Unit;

use App\Models\cms;
use App\Models\cms_detail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CmsCmsDetailTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_cms_has_many_relation_with_cms_detail(): void
    {
        $cms = $this->createCMS();
        $this->createCmsDetail(['cms_id' => $cms->id]);

        $this->assertInstanceOf(cms_detail::class, $cms->cmsDetails->first());
    }

    public function test_if_cms_detail_belongs_cms(): void
    {
        $cms = $this->createCMS();
        $cms_detail = $this->createCmsDetail(['cms_id' => $cms->id]);

        $this->assertInstanceOf(cms::class, $cms_detail->Cms);
    }
}
