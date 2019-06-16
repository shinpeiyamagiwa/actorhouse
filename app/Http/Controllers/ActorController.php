<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actor;
use App\Cast;
use App\Post;
use App\FavoriteActor;
use App\FavoriteMovie;
use App\ActorImages;
use Illuminate\Support\Facades\Auth;

class ActorController extends Controller
{
    //
    public function index($id) {
        
         // 現在認証されているユーザーの取得
         $user = Auth::user();
         // 現在認証されているユーザーのID取得
         $userId = Auth::id();

        $actor = Actor::where('tmdb_id', '=', $id)->first();
        $works = Cast::join('movies', 'casts.movie_id', '=', 'movies.tmdb_id')
                        ->where('casts.actor_id', '=', $id)
                        ->select('movie_id', 'movies.image_path')
                        ->get();
        $posts = Post::join('users', 'posts.user_id', '=', 'users.id')
                        ->where('actor_id', '=', $id)
                        ->select('users.name', 'content', 'user_id', 'posts.id')
                        ->orderBy('id', 'desc')
                        ->get();
        $favorite_actors = FavoriteActor::where('user_id', '=', $userId)
                        ->where('actor_id', '=', $id)
                        ->first();
        FavoriteActor::where('actor_id', '=', $id)
                    ->where('user_id', '=', $userId)
                    ->update(['new' => 0]);
        $fun_member = FavoriteActor::where('actor_id', '=', $id)
                                ->select('user_id')
                                ->get();
        $bg_image = Cast::join('movies', 'casts.movie_id', '=', 'movies.tmdb_id')
                                ->where('casts.actor_id', '=', $id)
                                ->select('movies.image_path')
                                ->first();
                                
        $images = ActorImages::where('actor_id', '=', $id)
                                ->select('actor_images.id', 'image_path', 'user_id')
                                ->get();

        
        $watch_movie = FavoriteMovie::join('casts', 'favorite_movies.movie_id','=', 'casts.movie_id')
                                ->where('user_id', '=', $userId)
                                ->where('casts.actor_id', '=', $id)
                                ->get();
        


        return view('actor.index',compact('user', 'userId', 'actor', 'works', 'posts', 
        'favorite_actors', 'fun_member', 'bg_image', 'images', 'watch_movie'));
        



    }
    public function update(Request $request, $id)
    {
        //
       
        $input = $request->all();
        // dd($input);
        ActorImages::create([
            'user_id' => $input['user_id'],
            'actor_id' => $input['actor_id'],
            'image_path' => $input['image_path']
        ]);
    //    dd($request->all());
        
        return redirect("/actor/$id");
    }

    public function delete(Request $request)
    {
        //
        $id = $request['actor_id'];
        $userId = Auth::id();
        ActorImages::where('id', $request['id'])->delete();
        
        
    //    dd($request->all());
        
        return redirect("/actor/$id");
    }
    

}
