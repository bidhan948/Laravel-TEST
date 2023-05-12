<?php

namespace App\Http\Controllers;

use App\Models\cms;
use App\Models\cms_detail;
use Illuminate\Http\Request;

class CmsDetailController extends Controller
{
    public function index(cms $cm)
    {
        return response()->json(cms_detail::query()
            ->where('cms_id', $cm->id)
            ->get());
    }
}
