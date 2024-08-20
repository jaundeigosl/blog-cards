<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get','post'],'blog',[BlogController::class,'index'])->name('blog');

Route::post('specific-post',[BlogController::class,'specificPost'])->name('specific-post');

Route::get('create-post',[BlogController::class,'createPost'])->name('create-post');