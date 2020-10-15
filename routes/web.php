<?php

use Illuminate\Support\Facades\Route;


Route::get('/','HomeController@index');
Route::post('post', 'PostController@store');
Route::get('post', 'PostController@index');

Route::post('posts/{post}/likes','PostLikeController@store')->name('posts.post.like.store');
Route::delete('posts/{post}/likes','PostLikeController@destroy')->name('posts.post.like.destroy');

Route::post('posts/{post}/coments','PostComentsController@store')->name('posts.post.coments.store')->middleware('auth');

Route::post('coments/{coment}/likes','ComentLikeController@store')->name('coments.coment.like.store');
Route::delete('coments/{coment}/likes','ComentLikeController@destroy')->name('coments.coment.like.destroy');

Route::get('@{user}','UserController@show')->name('users.show');

Auth::routes();