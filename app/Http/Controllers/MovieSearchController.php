<?php

namespace App\Http\Controllers;
use App\Movie;
use App\Actor;
use App\Cast;
use Illuminate\Http\Request;

class MovieSearchController extends Controller
{
    //
    public function index(Request $request) {
        $moviekeyword = $request->input('title');
        $actorkeyword = $request->input('name');
        if($moviekeyword) {
            $movies = Movie::join('casts', 'casts.movie_id', '=', 'movies.id')
                    ->join('actors', 'casts.actor_id', '=', 'actors.id')
                    ->where('movies.title', 'like', '%'.$moviekeyword.'%')
                    // ->orWhere('actors.name', 'like', '%'.$moviekeyword.'%')
                    ->select('title', 'movies.image_path', 'movies.id', 'actors.name')
                    ->get();
            $actors = null;
        }
        if($actorkeyword) {
            $actors = Actor::where('name', 'like', '%'.$actorkeyword.'%')
                    ->select('name', 'image_path', 'id')
                    ->get();
            $movies = null;
      }
        return view('search.actorsearch', compact('movies', 'actors'));
    
}
}
