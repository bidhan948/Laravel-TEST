<?php

use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('cms-json',[TestController::class,'cmsJSON'])->name('cms-json');