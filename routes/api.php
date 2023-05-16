<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CmsDetailController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserCategoryController;
use Illuminate\Support\Facades\Route;

Route::post('user/register', RegisterController::class)
    ->name('user.register');

Route::post('user', LoginController::class)
    ->name('user.login');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('cms', TestController::class);
    Route::apiResource('cms.cms_detail', CmsDetailController::class)
        ->except('show')
        ->shallow();
    Route::apiResource('category', UserCategoryController::class);
});
