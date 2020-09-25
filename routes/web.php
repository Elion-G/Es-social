<?php

use Illuminate\Support\Facades\Route;


Route::get('/','HomeController@index');
Route::post('post', 'PostController@store');
Route::get('post', 'PostController@index');

Route::post('posts/{post}/likes','PostLikeController@store')->name('posts.post.like.store');
Route::delete('posts/{post}/likes','PostLikeController@destroy')->name('posts.post.like.destroy');

Route::post('posts/{post}/coments','PostComentsController@store')->name('posts.post.coments.store')->middleware('auth');

Auth::routes();