<?php

namespace App\Http\Controllers;

use App\Models\cms;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function cmsJSON()
    {
        return response()->json(cms::all());
    }
}
