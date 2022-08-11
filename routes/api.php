<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriberApiController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API Resources
Route::apiResource('posts', PostController::class);
Route::apiResource('subscribers', SubscriberApiController::class)->only(['index', 'show']);
Route::get('subscribe', [SubscriberController::class, 'create']);
Route::get('unsubscribe/{email}', [SubscriberController::class, 'unsubscribe'])->name('unsubscribe');

Route::get('ok', function(){
    return "ok";
});
