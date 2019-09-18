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

Route::get('/', 'HomeController@index')->name('home');

// Route::get('/profile', 'ProfileController@index')->name('profile');
// Route::get('/profile/{id}', 'ProfileController@show')->name('show.profile');
// Route::get('/profile/{id}/edit', 'ProfileController@edit')->name('edit.profile');
// Route::patch('/profile/update', 'ProfileController@update')->name('update.profile');
Route::post('/search', 'ProfileController@search')->name('search');

Route::resource('profile', 'ProfileController');

// Axios routes
Route::post('/isLiked/{id}', 'LikeController@isLiked');
Route::post('/likeUser/{id}', 'LikeController@like');
Route::post('/unlikeUser/{id}', 'LikeController@unlike');
