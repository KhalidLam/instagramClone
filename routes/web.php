<?php

use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;

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


// Auth Route
Auth::routes();

// Post Route
Route::get('/', 'PostsController@index')->name('post.index');

Route::get('/p/create', 'PostsController@create')->name('post.create');

Route::post('/p', 'PostsController@store')->name('post.store');

Route::get('/p/{post}', 'PostsController@show')->name('post.show');

Route::post('/p/{post}', 'PostsController@updatelikes')->name('post.update'); //  This need more time

// Profile Route
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.index');

Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::any('/search', 'ProfilesController@search')->name('profile.search');

// Follow Route
Route::post('/follow/{user}', 'FollowsController@store');

// Comment Route
Route::resource('comments', 'CommentController');


Route::get('/explore', function () {
    return view('explore');
})->name('explore');


// Route::get('/home', function () {
//     return view('home');
// });
