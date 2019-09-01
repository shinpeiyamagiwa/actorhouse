<?php


namespace App\Http\Controllers;
use App\Evaluate;
use Illuminate\Http\Request;

class TopController extends Controller
{
    //
    public function index() {

        $evaluates = Evaluate::join('users', 'evaluates.user_id', '=', 'users.id')
                        ->join('movies', 'evaluates.movie_id', '=', 'movies.tmdb_id')
                        ->select('users.name', 'evaluates.evaluate', 'evaluates.user_id', 'evaluates.movie_id','evaluates.id', 'users.image_path as user_image','movies.image_path as movie_image', 'users.name', 'movies.title')
                        ->orderBy('evaluates.id', 'desc')
                        ->limit(20)
                        ->get();

        return view('top.index',compact('evaluates'));
    }
}
