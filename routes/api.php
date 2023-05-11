<?php

use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('cms-json',[TestController::class,'cmsJSON'])->name('cms-json');
Route::get('cms-json-show/{cms}',[TestController::class,'show'])->name('cms.show');
Route::post('cms-post',[TestController::class,'store'])->name('cms.store');