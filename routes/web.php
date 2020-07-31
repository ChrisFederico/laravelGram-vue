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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// USER ACTION ROUTES
Route::post('follow/{user}', 'FollowsController@store');

// POST ROUTES
Route::get('/p/create', 'PostController@create');
Route::get('/p/{post}', 'PostController@show');
Route::post('/p', 'PostController@store');

// PROFILE ROUTES
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
