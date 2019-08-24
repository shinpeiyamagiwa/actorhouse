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
Route::get('/movie/{tmdb_id}', 'MovieController@index')->name('movie');
Route::get('/actor/{tmdb_id}', 'ActorController@index')->name('actor');
Route::patch('/actor/{tmdb_id}/images', 'ActorController@upload');
Route::post('/search/movie', 'MovieSearchController@index');
Route::post('/search/runtime', 'SearchController@index');
Route::get('/search/movie/search', 'ListMovieAgeController@index');
Route::post('/actor/images/delete','ActorController@delete');

// ログインしていないとできない
Route::group(['middleware' => ['auth']], function () {
    Route::post('/review/store', 'ReviewController@store');
    Route::post('/review/evaluate', 'ReviewController@evaluate');
    Route::post('/review/delete', 'ReviewController@delete');
    Route::post('/post/store', 'PostController@store');
    Route::post('/tweet/store', 'TweetController@store');
});

// Route::post('/actor/{id}', 'AdminPostController@store');

Route::get('/home', 'HomeController@index');
Route::get('/home/edit', 'HomeController@edit');
Route::post('/home/edit', 'HomeController@update');
Route::post('/review/comment/store', 'ReviewCommentController@store');
Route::post('/post/comment/store', 'PostCommentController@store');
Route::get('/user/{id}', 'UserController@index');
// Route::get('/user', 'UserController@index');
// Ajaxにしたい
Route::post('/favorite/movie/store','FavoriteMovieController@store');
Route::post('/favorite/movie/delete','FavoriteMovieController@delete');
Route::post('/favorite/actor/store','FavoriteActorController@store');
Route::post('/favorite/actor/delete','FavoriteActorController@delete');
Route::post('/watchlist/movie/store','WatchListController@store');
Route::post('/watchlist/movie/delete','WatchListController@delete');
Route::post('/follow/user/store','FollowController@store');
Route::post('/follow/user/delete','FollowController@delete');
// Laravelの認証機能
Auth::routes();

// Route::get('login', function() {
//     view('auth.login');
// })->name('login')


// 管理画面
Route::group(['middleware' => ['admin']], function() {
});
Route::resource('admin/actors','AdminActorController');
Route::resource('admin/movies','AdminMovieController');
Route::resource('admin/users','AdminUserController');
// Route::patch('/home', 'AdminUserController@updata');

// Route::resource('admin/post','AdminPostController');
Route::post('movie/update', 'MovieUpdateController@update');
Route::post('movie/update/id', 'MovieIdUpdateController@update');
Route::post('actor/update', 'ActorUpdateController@update');
Route::post('cast/update', 'CastUpdateController@update');
Route::post('youtube/update', 'YouTubeUpdateController@update');
// Route::post('home/actortop', 'ActorTopController@index');