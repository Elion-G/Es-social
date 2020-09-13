<?php

use Illuminate\Support\Facades\Route;


Route::get('/','HomeController@index');
Route::post('post', 'PostController@store');
Route::get('post', 'PostController@index');

Auth::routes();