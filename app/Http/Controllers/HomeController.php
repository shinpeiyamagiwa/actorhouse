<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\FavoriteActor;
use App\FavoriteMovie;
use App\WatchList;
use App\Review;
use App\Post;
use App\Follow;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        // 現在認証されているユーザーのID取得
        $id = Auth::id();
        $favorite_actors = FavoriteActor::join('actors', 'favorite_actors.actor_id', '=', 'actors.tmdb_id')
                                        ->where('favorite_actors.user_id', '=', $id)
                                        ->select('actor_id', 'actors.name', 'actors.image_path')
                                        ->get();
        $favorite_actors = FavoriteActor::join('actors', 'favorite_actors.actor_id', '=', 'actors.tmdb_id')
                                        ->where('favorite_actors.user_id', '=', $id)
                                        ->select('actor_id', 'actors.name', 'actors.image_path', 'new')
                                        ->get();
        $favorite_movies = FavoriteMovie::join('movies', 'favorite_movies.movie_id', '=', 'movies.tmdb_id')
                                        ->where('favorite_movies.user_id', '=', $id)
                                        ->select('movie_id', 'movies.title', 'movies.image_path')
                                        ->get();
        $action_movies = FavoriteMovie::join('movies', 'favorite_movies.movie_id', '=', 'movies.tmdb_id')
                                        ->where('favorite_movies.user_id', '=', $id)
                                        ->where('genre', '=', 1)
                                        ->select('movie_id', 'movies.title', 'movies.image_path')
                                        ->get();
        $suspense_movies = FavoriteMovie::join('movies', 'favorite_movies.movie_id', '=', 'movies.tmdb_id')
                                        ->where('favorite_movies.user_id', '=', $id)
                                        ->where('genre', '=', 2)
                                        ->select('movie_id', 'movies.title', 'movies.image_path')
                                        ->get();
        $drama_movies = FavoriteMovie::join('movies', 'favorite_movies.movie_id', '=', 'movies.tmdb_id')
                                        ->where('favorite_movies.user_id', '=', $id)
                                        ->where('genre', '=', 3)
                                        ->select('movie_id', 'movies.title', 'movies.image_path')
                                        ->get();
        $comedy_movies = FavoriteMovie::join('movies', 'favorite_movies.movie_id', '=', 'movies.tmdb_id')
                                        ->where('favorite_movies.user_id', '=', $id)
                                        ->where('genre', '=', 4)
                                        ->select('movie_id', 'movies.title', 'movies.image_path')
                                        ->get();
        $horror_movies = FavoriteMovie::join('movies', 'favorite_movies.movie_id', '=', 'movies.tmdb_id')
                                        ->where('favorite_movies.user_id', '=', $id)
                                        ->where('genre', '=', 5)
                                        ->select('movie_id', 'movies.title', 'movies.image_path')
                                        ->get();
        $watch_lists = WatchList::join('movies', 'watch_lists.movie_id', '=', 'movies.tmdb_id')
                                        ->where('watch_lists.user_id', '=', $id)
                                        ->select('movie_id', 'movies.title', 'movies.image_path')
                                        ->get();
        $reviews = Review::join('movies', 'reviews.movie_id', '=', 'movies.tmdb_id')
                                        ->where('user_id', '=', $id)
                                        ->select('movies.title', 'evaluate', 'content', 'movie_id', 'reviews.id', 'movies.image_path')
                                        ->orderBy('reviews.id', 'desc')
                                        ->get();
        $avg = Review:: where('user_id', '=', $id)
                                        ->avg('evaluate');
        $posts = Post::where('user_id', '=', $id)
                                        ->select('content', 'user_id', 'posts.id')
                                        ->orderBy('id', 'desc')
                                        ->get();
        $tweets = Follow::join('posts', 'follow_id', '=', 'posts.user_id')
                        ->join('reviews', 'follow_id', '=', 'reviews.user_id')
                        ->join('tweets', 'follow_id', '=', 'tweets.user_id')
                        ->join('users', 'follow_id', '=', 'users.id')
                        ->where('follower_id', '=', $id)
                        ->select('posts.content', 'reviews.content', 'tweets.content', 'users.name', 'users.image_path')
                        // ->orderBy('created_at', 'desc')
                        ->get();
                        
        $follow = Follow::where('follow_id', '=', $id)
                        ->where('follower_id', '=', Auth::id())
                        ->select('follower_id', 'follow_id')
                        ->first(); 
        return view('home', compact('user','favorite_actors', 'favorite_movies', 
        'watch_lists', 'reviews', 'avg', 'posts', 'tweets', 'follow','action_movies', 
        'suspense_movies', 'drama_movies', 'comedy_movies', 'horror_movies'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
