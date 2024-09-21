<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix('posts')->controller(PostController::class)->group(function () {
    Route::get('', 'index');
    Route::post('', 'store');
    Route::get('/search', 'search');
    Route::patch('/{post}','update');
    Route::delete('/{post}','destroy');
});
