<?php

use App\Http\Controllers\DetailsController;
use App\Http\Controllers\oldHomeController;
use App\Http\Controllers\MailController;
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

Route::get('/', [oldHomeController::class, 'show'])->name('home');

Route::get('/upload', '\App\Http\Controllers\UploadController@show')->name('upload');
Route::post('/uploadBeat', '\App\Http\Controllers\UploadController@store')->name('uploadBeat');

Route::get('/EmailTest', [MailController::class, 'show'])->name('email');

Route::get('/details', 'App\Http\Controllers\DetailsController@show')->name('details');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
