<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CmsDetailController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;


Route::apiResource('cms', TestController::class);
Route::apiResource('cms.cms_detail', CmsDetailController::class)
    ->except('show')
    ->shallow();

Route::post('user/register', RegisterController::class)
    ->name('user.register');
