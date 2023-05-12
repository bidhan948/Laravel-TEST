<?php

use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('cms',[TestController::class,'cmsJSON'])->name('cms.index');
Route::get('cms/show/{cms}',[TestController::class,'show'])->name('cms.show');
Route::post('cms',[TestController::class,'store'])->name('cms.store');
Route::delete('cms/{cms}',[TestController::class,'destroy'])->name('cms.destroy');
Route::put('cms/edit/{cms}',[TestController::class,'update'])->name('cms.update');