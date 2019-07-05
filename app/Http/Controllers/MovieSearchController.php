<?php

namespace App\Http\Controllers;
use App\Movie;
use App\Actor;
use App\Cast;
use App\Review;
use Illuminate\Http\Request;

class MovieSearchController extends Controller
{
    //
    public function index(Request $request) {
        $moviekeyword = $request->input('title');
        $actorkeyword = $request->input('name');
        // TODO検索結果の評価平均表示と鑑賞数表示
        // $reviews = Review::join('users', 'reviews.user_id', '=', 'users.id')
        //                 ->where('movie_id', '=', 'movies.tmdb_id')
        //                 ->select('users.name', 'evaluate', 'reviews.content', 'reviews.user_id', 'reviews.id')
        //                 ->orderBy('reviews.id', 'desc')
        //                 ->get();
        // $avg = Review::join('users', 'reviews.user_id', '=', 'users.id')
        //                 ->where('movie_id', '=', 'movies.tmdb_id')
        //                 ->avg('evaluate');
        if($moviekeyword) {
            $movies = Movie::where('movies.title', 'like', '%'.$moviekeyword.'%')
                    // ->orWhere('actors.name', 'like', '%'.$moviekeyword.'%')
                    ->select('title', 'movies.image_path', 'movies.tmdb_id')
                    ->get();
            $actors = null;
        }
        if($actorkeyword) {
            $actors = Actor::where('name', 'like', '%'.$actorkeyword.'%')
                    ->select('name', 'image_path', 'tmdb_id')
                    ->get();
            $movies = null;
      }
        return view('search.actorsearch', compact('movies', 'actors'));
    
}
}
