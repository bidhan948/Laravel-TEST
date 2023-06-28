<?php

use Illuminate\Support\Facades\Route;
use Google\Client;

Route::get('/', function () { 
    return view('welcome');
});

Route::get('upload', function () {
    $client = new Client();
    $access_token = 'ya29.a0AWY7CknykBRYBXfNd6Agb5Kham4AsOqYpeUf0tTcmRNA-INma676TPxkLMY55g7wtIn1jfMWzJPZTWV1KEdZ2Mj73eJjm9txOctKVl1cMebOmi-gpxlaErw1jiswEypQrw-z_gVEjaivimcW2LiR29LcSCEOaCgYKARQSARESFQG1tDrp5I7B-HI-o4Og1DWqCnB5xQ0163';

    $client->setAccessToken($access_token);
    $service = new Google\Service\Drive($client);
    $file = new Google\Service\Drive\DriveFile();

    DEFINE("TESTFILE", 'testfile-small.txt');
    if (!file_exists(TESTFILE)) {
        $fh = fopen(TESTFILE, 'w');
        fseek($fh, 1024 * 1024);
        fwrite($fh, "!", 1);
        fclose($fh);
    }

    $file->setName("Hello World!");
    $service->files->create(
        $file,
        array(
            'data' => file_get_contents(TESTFILE),
            'mimeType' => 'application/octet-stream',
            'uploadType' => 'multipart'
        )
    );
});