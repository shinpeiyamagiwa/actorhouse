<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Actor;
class ActorSearchController extends Controller
{
    //
    public function index(Request $request) {
        $actorkeyword = $request->input('name');
        
        if($actorkeyword) {
            $actors = Actor::where('name', 'like', '%'.$actorkeyword.'%')
                    ->select('name', 'image_path')
                    ->get();
        }
        return view('search.actorsearch', compact('actors'));
    }
}
