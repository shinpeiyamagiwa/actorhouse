<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actor;
use App\Cast;
use App\Post;
use App\FavoriteActor;
use Illuminate\Support\Facades\Auth;

class ActorController extends Controller
{
    //
    public function index($id) {
        
         // 現在認証されているユーザーの取得
         $user = Auth::user();
         // 現在認証されているユーザーのID取得
         $userId = Auth::id();

        $actor = Actor::find($id);
        $works = Cast::join('movies', 'casts.movie_id', '=', 'movies.id')
                        ->where('casts.actor_id', '=', $id)
                        ->select('movie_id', 'movies.image_path')
                        ->get();
        $posts = Post::join('users', 'posts.user_id', '=', 'users.id')
                        ->where('actor_id', '=', $id)
                        ->select('users.name', 'content', 'user_id')
                        ->get();
        $favorite_actors = FavoriteActor::where('user_id', '=', $userId)
                        ->where('actor_id', '=', $id)
                        ->first();
                        
        $fun_member = FavoriteActor::where('actor_id', '=', $id)
                                ->select('user_id')
                                ->get();
       
        return view('actor.index',compact('user', 'actor', 'works', 'posts', 'favorite_actors', 'fun_member'));
        
    }
    

}
