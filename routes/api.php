<?php

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

Route::group(['middleware' => ['api', 'auth:sanctum']], function () {
    Route::get('/challenges/history', [App\Http\Controllers\Api\ChallengeController::class, 'history'])->name('challenges.history');
    Route::apiResource('challenges', App\Http\Controllers\Api\ChallengeController::class);
    Route::apiResource('user_avators', App\Http\Controllers\Api\UserAvatorController::class);
    Route::apiResource('challenges.comments', App\Http\Controllers\Api\CommentController::class);
    Route::apiResource('challenges.goods', App\Http\Controllers\Api\GoodController::class);
});

Route::post('/register', [App\Http\Controllers\Api\RegisterController::class, 'register']);

Route::post('/login', [App\Http\Controllers\Api\LoginController::class, 'login']);
