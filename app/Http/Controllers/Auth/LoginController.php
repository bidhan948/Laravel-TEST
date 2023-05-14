<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $validate = $request->validate(['email' => 'required', 'password' => 'required']);

        $user = User::query()->whereEmail($validate['email'])->first();

        if ($user == null || Hash::check($validate['password'], $user->password)) {
            return response()->josn('Credential Did not match', Response::HTTP_UNAUTHORIZED);
        } else {
            return response()->json(['token' => ($user->createToken('mobile:' . $user->email)->plainTextToken)]);
        }
    }
}
