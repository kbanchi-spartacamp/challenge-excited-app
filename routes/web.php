<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('challenges', App\Http\Controllers\ChallengeController::class);

Route::resource('user_avators', App\Http\Controllers\UserAvatorController::class);

Route::resource('challenges.comments', App\Http\Controllers\CommentController::class);

Route::resource('challenges.goods', App\Http\Controllers\GoodController::class);
