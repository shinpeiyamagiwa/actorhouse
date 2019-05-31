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

// みんなが見れるページ
Route::get('/', 'TopController@index');
Route::get('/movie/{id}', 'MovieController@index');
Route::get('/actor/{id}', 'ActorController@index');
Route::post('/search/movie', 'MovieSearchController@index');

// ログインしていないとできない
Route::group(['middleware' => ['auth']], function () {
    Route::post('/review/store', 'ReviewController@store');
    Route::post('/post/store', 'PostController@store');
});

// Route::post('/actor/{id}', 'AdminPostController@store');

Route::get('/home', 'HomeController@index');
Route::get('/home/edit', 'HomeController@edit');
Route::post('/home/edit', 'HomeController@update');
Route::post('/review/comment/store', 'ReviewCommentController@store');
Route::get('/user/{id}', 'UserController@index');
// Route::get('/user', 'UserController@index');
// Ajaxにしたい
Route::post('/favorite/actor/store','FavoriteActorController@store');
Route::post('/favorite/actor/delete','FavoriteActorController@delete');
Route::post('/watchlist/movie/store','WatchListController@store');
Route::post('/watchlist/movie/delete','WatchListController@delete');
// Laravelの認証機能
Auth::routes();

// Route::get('login', function() {
//     view('auth.login');
// })->name('login')


// 管理画面
Route::group(['middleware' => ['admin']], function() {
    Route::resource('admin/actors','AdminActorController');
    Route::resource('admin/movies','AdminMovieController');
    Route::resource('admin/users','AdminUserController');
});


// Route::resource('admin/post','AdminPostController');
