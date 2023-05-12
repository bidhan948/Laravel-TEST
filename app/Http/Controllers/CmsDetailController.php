<?php

namespace App\Http\Controllers;

use App\Models\cms;
use App\Models\cms_detail;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CmsDetailController extends Controller
{
    public function index(cms $cm)
    {
        return response()->json(cms_detail::query()
            ->where('cms_id', $cm->id)
            ->get());
    }

    public function store(Request $request, cms $cm)
    {
        $request->validate(['name' => 'required']);

        return response()->json($cm->cmsDetails()->create($request->all()), Response::HTTP_CREATED);
    }
}
