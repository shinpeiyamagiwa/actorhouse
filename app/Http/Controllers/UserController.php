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
use App\Evaluate;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index($id) {

        // 現在認証されているユーザーの取得
        $user = User::find($id);
        $follower =  Auth::id();
        $favorite_actors = FavoriteActor::join('actors', 'favorite_actors.actor_id', '=', 'actors.tmdb_id')
                                        ->where('favorite_actors.user_id', '=', $id)
                                        ->select('actor_id', 'actors.name', 'actors.image_path')
                                        ->get();
        
        $favorite_movies = FavoriteMovie::join('movies', 'favorite_movies.movie_id', '=', 'movies.tmdb_id')
                                        ->where('favorite_movies.user_id', '=', $id)
                                        ->select('tmdb_id', 'movies.title', 'movies.image_path')
                                        ->get();

        $evaluate_avg = Evaluate::where('user_id', '=', $id)
                        // ->select('evaluate')
                        ->avg('evaluate');
                    
        $evaluates = Evaluate::join('movies', 'evaluates.movie_id', '=', 'movies.tmdb_id')
                        ->where('user_id', '=', $id)
                        ->select('movies.title', 'evaluate', 'evaluates.movie_id', 'evaluates.id as evaluate_id', 'movies.image_path')
                        ->orderBy('evaluates.id', 'desc')
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
        $comment = User::join('reviews', 'reviews.user_id', '=', 'users.id')
                       ->join('posts', 'posts.user_id', '=', 'users.id')
                       ->join('movies', 'reviews.movie_id', '=', 'movies.tmdb_id')
                       ->join('actors', 'posts.actor_id', '=', 'actors.tmdb_id')
                       ->where('users.id', '=', $id)
                       ->select('movies.title', 'actors.name', 'actors.image_path', 'movies.image_path')
                       ->get();
                       
        $follow = Follow::where('follow_id', '=', $id)
                        ->where('follower_id', '=', Auth::id())
                        ->select('follower_id', 'follow_id')
                        ->first();       
        
        $follow_reviews = Follow::join('reviews', 'follow_id', '=', 'reviews.user_id')
                        ->join('users', 'follow_id', '=', 'users.id')
                        ->leftjoin('movies', 'reviews.movie_id', '=', 'movies.tmdb_id')
                        ->where('follower_id', '=', $id)
                        ->orderBy('reviews.created_at', 'desc')
                        ->select('tmdb_id','reviews.content', 'reviews.id', 'users.name', 'users.image_path as user_image', 'user_id', 'movies.title', 'evaluate', 'movies.image_path as movie_image')
                        ->get();
        $follow_posts = Follow::join('posts', 'follow_id', '=', 'posts.user_id')
                        ->join('users', 'follow_id', '=', 'users.id')
                        ->leftjoin('actors', 'posts.actor_id', '=', 'actors.tmdb_id')
                        ->where('follower_id', '=', $id)
                        ->orderBy('posts.created_at', 'desc')
                        ->select('posts.content', 'users.name as user_name', 'users.image_path', 'user_id', 'actors.name as actor_name', 'actors.tmdb_id', 'actors.image_path as actor_image', 'posts.id')
                        ->get();
        $follow_tweets = Follow::join('tweets', 'follow_id', '=', 'tweets.user_id')
                        ->join('users', 'follow_id', '=', 'users.id')
                        // ->join('tweets', 'tweets.user_id', '=', $id)
                        // ->leftjoin('users', 'users.id', '=', $id)
                        ->where('follower_id', '=', $id)
                        ->orderBy('tweets.created_at', 'desc')
                        ->select('tweets.content', 'users.name as user_name', 'users.image_path', 'user_id')
                        ->get();
        return view('user.index', compact('follow_reviews', 'follow_posts', 'follow_tweets', 'user','favorite_actors', 'favorite_movies', 'watch_lists', 'reviews', 'avg', 'posts', 'follow', 'evaluate_avg', 'evaluates'));
    }
    
}
