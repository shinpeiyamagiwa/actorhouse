<?php

namespace App\Http\Controllers;
use App\Movie;
use Illuminate\Http\Request;

class ListMovieAgeController extends Controller
{
    //
    public function index(Request $request) {
    
    $movieAge = $request->input('age');
        if($movieAge) {
            
            $movies = Movie::where('movies.released_at', 'like', '%'.$movieAge.'%')
                    // ->orWhere('actors.name', 'like', '%'.$moviekeyword.'%')
                    ->select('title', 'movies.image_path', 'movies.tmdb_id')
                    ->get();
        }
        return view('list.movie_age', compact('movies'));
    }
}
