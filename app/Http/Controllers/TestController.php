<?php

namespace App\Http\Controllers;

use App\Models\cms;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestController extends Controller
{
    public function index()
    {
        return response()->json(cms::all());
    }

    public function show(cms $cm)
    {
        return response()->json($cm);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required', 'slug' => 'required']);
        return response()->json(cms::create($request->all()), Response::HTTP_CREATED);
    }

    public function destroy(cms $cm)
    {
        $cm->delete();

        return response('', Response::HTTP_NO_CONTENT);
    }

    public function update(cms $cm,Request $request)
    {

        $request->validate(['name'=>'required']);
        return response()->json($cm->update(['name' => 'This is test']));
    }
}
