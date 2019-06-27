<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Cast;
use App\Review;
use App\WatchList;
use App\ReviewComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    //
    public function index($id) {

        $user = Auth::user();
        $userId = Auth::id();
        $movie = Movie::where('movies.tmdb_id', '=', $id)
                    ->first();
        $casts = Cast::join('actors', 'casts.actor_id', '=', 'actors.tmdb_id')
                    ->where('casts.movie_id', '=', $id)
                    ->select('actor_id', 'actors.image_path')
                    ->get();
        $review = Review::where('user_id', '=', Auth::id())->where('movie_id', '=', $id)
                        ->first();
        $reviews = Review::join('users', 'reviews.user_id', '=', 'users.id')
                        ->where('movie_id', '=', $id)
                        ->select('users.name', 'evaluate', 'reviews.content', 'reviews.user_id', 'reviews.id', 'users.image_path')
                        ->orderBy('reviews.id', 'desc')
                        ->get();
        $avg = Review::join('users', 'reviews.user_id', '=', 'users.id')
                        ->where('movie_id', '=', $id)
                        ->avg('evaluate');          
        $watchList = WatchList::where('user_id', '=', Auth::id())
                            ->where('movie_id', '=', $id)
                            ->first();
        return view('movie.index', compact('movie', 'userId', 'casts', 'review','user', 'reviews', 'watchList', 'avg'));

        
    }
    public function favorite($id) {
        // 現在認証されているユーザーの取得
        $user = Auth::user();
        // 現在認証されているユーザーのID取得
        $userId = Auth::id();
        
        FavoriteMovie::create([
            'user_id' => $userId,
            'movier_id' => $id
        ]);
        


        return redirect('/home');
    }

    
}
