<?php

use App\Http\Controllers\CmsDetailController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;


Route::apiResource('cms', TestController::class);
Route::apiResource('cms.cms_detail', CmsDetailController::class)
    ->except('show')
    ->shallow();
