<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Post\Controllers\PostController;

Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index']);
    Route::get('{id}', [PostController::class, 'show']);
    Route::post('/', [PostController::class, 'create']);
    Route::put('{id}', [PostController::class, 'update']);
    Route::delete('{id}', [PostController::class, 'destroy']);
});
