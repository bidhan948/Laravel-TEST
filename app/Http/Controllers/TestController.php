<?php

namespace App\Http\Controllers;

use App\Models\cms;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestController extends Controller
{
    public function cmsJSON()
    {
        return response()->json(cms::all());
    }

    public function show(cms $cms)
    {
        return response()->json($cms);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required', 'slug' => 'required']);
        return response()->json(cms::create($request->all()), Response::HTTP_CREATED);
    }
}
