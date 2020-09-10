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
Route::post('/store', 'HomeController@store');
Route::get('/heures','HomeController@Form');
Route::post('/newsletter', 'HomeController@RegisterNewsletter');



Auth::routes();

Route::middleware('isAdmin')->group(function () {


Route::get('/admin', 'AdminController');
Route::resource('/admin/photo', 'AdminPhotoController');

Route::resource('/admin/session', 'AdminSessionController');
Route::post('/admin/client/sendmailtoclient', 'AdminClientController@SendMailToClient')->name('SendMailToClient');
Route::resource('/admin/client', 'AdminClientController');
Route::resource('/admin/newsletter', 'AdminNewsletterController');
Route::resource('/admin/heures', 'AdminHeuresController');
Route::resource('/admin/temoignage', 'TestimoniesController');
Route::resource('/admin/textcorpo', 'CorpoTextController');




 });


