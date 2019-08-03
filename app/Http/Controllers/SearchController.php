<?php

namespace App\Http\Controllers;
use App\Movie;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function index(Request $request) {
        
        $genre = $request->genre;
        $start_age = $request->start_age;
        $end_age = $request->end_age;
            if($request->runtime == 1) {
                $movies = Movie::join('genres', 'movies.tmdb_id', '=', 'genres.tmdb_id')
                        ->whereYear('released_at', '>=', $start_age)
                        ->whereYear('released_at', '<=', $end_age)
                        ->where('screen_time', '<=', 90)
                        ->where('genres.genre_id', $genre)
                        ->select('title', 'movies.image_path', 'movies.tmdb_id', 'movies.screen_time')
                        ->get();
                        
            }
            elseif ($request->runtime == 2) {
                $movies = Movie::join('genres', 'movies.tmdb_id', '=', 'genres.tmdb_id')
                        ->whereYear('released_at', '>=', $start_age)
                        ->whereYear('released_at', '<=', $end_age)
                        ->where('screen_time', '>', 90)
                        ->where('screen_time', '<=', 120)
                        ->where('genres.genre_id', $genre)
                        ->select('title', 'movies.image_path', 'movies.tmdb_id', 'movies.screen_time')
                        ->get();
            }
            elseif ($request->runtime == 3) {
                $movies = Movie::join('genres', 'movies.tmdb_id', '=', 'genres.tmdb_id')
                        ->whereYear('released_at', '>=', $start_age)
                        ->whereYear('released_at', '<=', $end_age)
                        ->where('screen_time', '>', 120)
                        ->where('screen_time', '<=', 150)
                        ->where('genres.genre_id', $genre)
                        ->select('title', 'movies.image_path', 'movies.tmdb_id', 'movies.screen_time')
                        ->get();
            }
            elseif ($request->runtime == 4) {
                $movies = Movie::join('genres', 'movies.tmdb_id', '=', 'genres.tmdb_id')
                        ->whereYear('released_at', '>=', $start_age)
                        ->whereYear('released_at', '<=', $end_age)
                        ->where('screen_time', '>', 150)
                        ->where('genres.genre_id', $genre)
                        ->select('title', 'movies.image_path', 'movies.tmdb_id', 'movies.screen_time')
                        ->get();
            }
            else  {
                
            }

        return view('search.runtime', compact('movies'));
    }
}
