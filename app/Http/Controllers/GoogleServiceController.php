<?php

namespace App\Http\Controllers;

use Google\Client;
use Illuminate\Http\Request;

class GoogleServiceController extends Controller
{
    const GOOGLE_SCOPE = [
        'https://www.googleapis.com/auth/drive',
        'https://www.googleapis.com/auth/drive.file',
    ];

    public function connect()
    {
        $client = new Client();
        $config = config('services.google');
        $client->setClientId($config['id']);
        $client->setClientSecret($config['secret']);
        $client->setRedirectUri($config['redirect_uri']);
        $client->setScopes(self::GOOGLE_SCOPE);
        $url = $client->createAuthUrl();
        return response()->json(['url' => $url]);
    }
}
