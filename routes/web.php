<?php

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

Auth::routes();
Route::post('/uploadImage', 'Auth\RegisterController@uploadImg')->name('uploadImage');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/profile/{id}', 'ProfileController@show')->name('show.profile');

// Axios routes
Route::post('/isLiked/{id}', 'LikeController@isLiked');
Route::post('/likeUser/{id}', 'LikeController@like');
Route::post('/unlikeUser/{id}', 'LikeController@unlike');
