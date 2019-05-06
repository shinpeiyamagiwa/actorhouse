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

Route::get('/movie', 'MovieController@index');
// Route::get('/movie/like', 'MovieController@like');

Route::get('/actor', 'ActorController@index');
Route::get('/actor/{id}', 'ActorController@index');

Route::get('/user', 'UserController@index');
Route::get('/user/{id}', 'UserController@index');

Route::get('/top', 'TopController@index');

Route::get('/register','RegisterController@index');

Route::get('/create','RegisterController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/createactor','AdminController@createactor');
Route::get('/createmovie','AdminController@createmovie');