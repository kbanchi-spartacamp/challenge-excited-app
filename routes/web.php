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

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])
    ->name('welcome');

Route::get('/legal', function () {
    return view('legal');
})->name('legal');

Route::get('/guide', function () {
    return view('guide');
})->name('guide');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('challenges/history', [
    App\Http\Controllers\ChallengeController::class, 'history'
])->name('challenges.history')->middleware('auth');

Route::resource('challenges', App\Http\Controllers\ChallengeController::class)
    ->only(['index', 'create', 'store', 'show', 'destroy'])
    ->middleware('auth');

Route::resource('user_avators', App\Http\Controllers\UserAvatorController::class)
    ->only(['create', 'store', 'show'])
    ->middleware('auth');

Route::resource('challenges.comments', App\Http\Controllers\CommentController::class)
    ->only(['store'])
    ->middleware('auth');

Route::resource('challenges.goods', App\Http\Controllers\GoodController::class)
    ->only(['store', 'destroy'])
    ->middleware('auth');
