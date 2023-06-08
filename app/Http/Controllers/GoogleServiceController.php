<?php

namespace App\Http\Controllers;

use App\Models\google_service;
use Exception;
use Google\Client;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GoogleServiceController extends Controller
{
    const GOOGLE_SCOPE = [
        'https://www.googleapis.com/auth/drive',
        'https://www.googleapis.com/auth/drive.file',
    ];

    protected $config = [];

    public function __construct()
    {
        $this->config = config('services.google');
    }

    public function connect(Client $client)
    {
        $client->setScopes(self::GOOGLE_SCOPE);
        $url = $client->createAuthUrl();
        return response()->json(['url' => $url]);
    }

    public function callback(Request $request, Client $client)
    {
        try {
            $code = $request->code;
            $access_token = $client->fetchAccessTokenWithAuthCode($code);
            $google_service = google_service::create(['token' => $access_token, 'user_id' => auth()->id()]);

            return response()->json($google_service, Response::HTTP_CREATED);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }
}
