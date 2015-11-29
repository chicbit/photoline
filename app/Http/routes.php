<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/s3', 'ApiController@save_s3');
Route::get('/push', 'ApiController@push');
Route::get('/tel', 'ApiController@twilio');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', 'ApiController@admin');