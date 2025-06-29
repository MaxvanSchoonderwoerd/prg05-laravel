<?php


use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/', [PostController::class, 'index'])->name('home');

Route::post('/post/{post}/like', 'App\Http\Controllers\PostLikesController@store');
Route::delete('/post/{post}/dislike', 'App\Http\Controllers\PostLikesController@destroy');

Route::post('/post/like', 'App\Http\Controllers\PostController@like')->name('like');
Route::post('/post/switch', 'App\Http\Controllers\PostController@switch')->name('switch');
Route::get('/post/create', 'App\Http\Controllers\PostController@create')->name('create')->middleware('auth');
Route::get('/post/manage', 'App\Http\Controllers\PostController@manage')->name('manage')->middleware('admin');

Route::resource('post', PostController::class);

Route::group(['middleware' => ['auth']], function () {
    Route::resource('user', UserController::class);
});

Route::get('/EmailTest', [MailController::class, 'show'])->name('email');

Auth::routes();