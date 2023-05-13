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

    public function test_if_cms_is_deleted_then_cms_detail_will_be_deleted()
    {
        $cms = $this->createCMS();
        $cms_detail = $this->createCmsDetail(['cms_id' => $cms->id]);
        $cms_detail_loc = $this->createCmsDetail();

        $cms->delete();

        $this->assertDatabaseMissing('cms', ['id' => $cms->id]);
        $this->assertDatabaseMissing('cms_details', ['id' => $cms_detail->id]);
        $this->assertDatabaseHas('cms_details', ['id' => $cms_detail_loc->id]);
    }
}
