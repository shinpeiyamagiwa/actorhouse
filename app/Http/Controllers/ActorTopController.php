<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActorTopController extends Controller
{
    //
    public function index($id) {
        
        $watch_actors = Review::join('casts', 'reviews.movie_id', '=', 'casts.movie_id')
                            ->leftJoin('actors', 'casts.actor_id', '=', 'actors.tmdb_id')
                            ->where('reviews.user_id', '=', $id)
                            ->select(\DB::raw('count(*) as actor_count, casts.actor_id'),'actors.name','actors.tmdb_id','actors.image_path')
                            ->groupBy('casts.actor_id','actors.name','actors.tmdb_id','actors.image_path')
                            ->orderBy('actor_count', 'desc')
                            ->orderBy('casts.actor_id', 'asc')
                            ->limit(10)
                            ->get();
        
        return response()->json([
            'result' => true
        ]); 
   }
}
