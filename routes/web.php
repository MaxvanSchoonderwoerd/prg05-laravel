<?php

use App\Http\Controllers\DetailsController;
use App\Http\Controllers\oldHomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;

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

Route::get('/', [PostController::class, 'index'])->name('home');


Route::post('/post/like', 'App\Http\Controllers\PostController@like')->name('like');
Route::post('/post/switch', 'App\Http\Controllers\PostController@switch')->name('switch');
Route::resource('post', PostController::class);

Route::resource('user', UserController::class);

Route::get('/EmailTest', [MailController::class, 'show'])->name('email');

Auth::routes();

