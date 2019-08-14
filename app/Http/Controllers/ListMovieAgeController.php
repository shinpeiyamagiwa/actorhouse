<?php

namespace App\Http\Controllers;
use App\Movie;
use App\WatchList;
use App\Review;
use App\Evaluate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ListMovieAgeController extends Controller
{
    //
    public function index(Request $request) {
    
    $userId = Auth::id();

    $movieAge = $request->input('age');
        if($movieAge) {
            
            $movies = Movie::where('movies.released_at', 'like', '%'.$movieAge.'%')
                    // ->orWhere('actors.name', 'like', '%'.$moviekeyword.'%')
                    ->select('title', 'movies.image_path', 'movies.tmdb_id')
                    ->get();
        }
        $watch_movies = Evaluate::where('user_id', '=', $userId)
                                ->select('evaluates.movie_id as id')
                                ->get();
        
        $watch_movie_ids = [];
        foreach($watch_movies as $watch_movie) {
            array_push($watch_movie_ids, $watch_movie->id);
        }
        
        $watch_lists = WatchList::join('movies', 'watch_lists.movie_id', '=', 'movies.tmdb_id')
                                ->where('watch_lists.user_id', '=', $userId)
                                ->select('movie_id')
                                ->get();
                                
        $watch_list_ids = [];
        foreach($watch_lists as $watch_list) {
            array_push($watch_list_ids, $watch_list->movie_id);
        }
        
        return view('list.movie_age', compact('movies', 'watch_list_ids', 'watch_movie_ids'));
    }
}
