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

Route::get('/', function () {
    return view('welcome');
});


Route::post('/follow/{user}', 'FollowsController@store');

Auth::routes();

Route::get('/p/create', 'PostsController@create')->name('post.create');

Route::post('/p', 'PostsController@store')->name('post.store');

Route::get('/p/{post}', 'PostsController@show')->name('post.show');

Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.index');

Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');


Route::get('/home', function(){
    return view('home');
});


