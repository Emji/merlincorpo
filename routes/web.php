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

Route::resource('/', 'HomeController');


Auth::routes();

Route::middleware('isAdmin')->group(function () {


Route::get('/admin', 'AdminController');
Route::resource('/admin/photo', 'AdminPhotoController');
Route::resource('/admin/session', 'AdminSessionController');



 });


