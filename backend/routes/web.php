<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TwitterController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login/twitter', [LoginController::class, 'redirectToTwitterProvider']);
Route::get('/login/twitter/callback', [LoginController::class, 'handleTwitterProviderCallback']);

Route::get('/', [TwitterController::class, 'index']);
Route::post('/tweet', [TwitterController::class, 'tweet'])->name('tweet');