<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\FavoriteActor;
use App\FavoriteMovie;
use App\WatchList;
use App\Review;
use App\Post;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index($id) {

        // 現在認証されているユーザーの取得
        $user = User::find($id);
        $favorite_actors = FavoriteActor::join('actors', 'favorite_actors.actor_id', '=', 'actors.id')
                                        ->where('favorite_actors.user_id', '=', $id)
                                        ->select('actor_id', 'actors.name', 'actors.image_path')
                                        ->get();
        $favorite_actors = FavoriteActor::join('actors', 'favorite_actors.actor_id', '=', 'actors.id')
                                        ->where('favorite_actors.user_id', '=', $id)
                                        ->select('actor_id', 'actors.name', 'actors.image_path')
                                        ->get();
        $favorite_movies = FavoriteMovie::join('movies', 'favorite_movies.movie_id', '=', 'movies.id')
                                        ->where('favorite_movies.user_id', '=', $id)
                                        ->select('movie_id', 'movies.title', 'movies.image_path')
                                        ->get();
        $watch_lists = WatchList::join('movies', 'watch_lists.movie_id', '=', 'movies.id')
                                        ->where('watch_lists.user_id', '=', $id)
                                        ->select('movie_id', 'movies.title', 'movies.image_path')
                                        ->get();
        $reviews = Review::join('movies', 'reviews.movie_id', '=', 'movies.id')
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
        return view('user.index', compact('user','favorite_actors', 'favorite_movies', 'watch_lists', 'reviews', 'avg', 'posts'));
    }
    
}
