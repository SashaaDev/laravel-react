<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
require app_path('Modules/Post/Routes/api.php');
require app_path('Modules/Auth/Routes/api.php');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

