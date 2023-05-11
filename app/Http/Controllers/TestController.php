<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function cmsJSON()
    {
        return response()->json(true);
    }
}
