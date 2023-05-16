<?php

namespace App\Http\Controllers;

use App\Models\user_category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserCategoryController extends Controller
{
    public function index()
    {
        return response()->json(auth()->user()->Categories);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required', 'description' => 'required']);

        return response()->json(
            auth()
                ->user()
                ->Categories()
                ->create($request->all()),
            Response::HTTP_CREATED
        );
    }

    public function update(Request $request, user_category $category)
    {
        $request->validate(['name' => 'required', 'description' => 'sometimes']);

        return response()->json($category->update($request->all()));
    }

    public function destroy(user_category $category)
    {
        $category->delete();

        return response()->json('', Response::HTTP_NO_CONTENT);
    }
}
