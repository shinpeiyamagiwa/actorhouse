<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actor;
use App\Cast;
use App\Post;
use App\WatchList;
use App\Review;
use App\FavoriteActor;
use App\FavoriteMovie;
use App\ActorImages;
use App\Evaluate;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ActorController extends Controller
{
    //
    public function index($id) {
         // 現在認証されているユーザーの取得
        
         // 現在認証されているユーザーのID取得
        $userId = Auth::id();
        
        $actor = Actor::where('tmdb_id', '=', $id)->first();

        $works = Cast::join('movies', 'casts.movie_id', '=', 'movies.tmdb_id')
                        ->where('casts.actor_id', '=', $id)
                        ->select('movie_id', 'movies.image_path', 'title')
                        ->get();

        $posts = Post::join('users', 'posts.user_id', '=', 'users.id')
                        ->where('actor_id', '=', $id)
                        ->select('users.name', 'content', 'user_id', 'posts.id', 'users.image_path')
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
                                
        $watch_movies = Evaluate::join('casts', 'evaluates.movie_id','=', 'casts.movie_id')
                                ->where('user_id', '=', $userId)
                                ->where('casts.actor_id', '=', $id)
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
        



        $files = ActorImages::where('actor_id', '=', $id)
                            ->select('actor_images.id', 'actor_image', 'user_id')
                            ->get();
        foreach($files as $file) {
            $file->image_url = Storage::disk('s3')->url($file->actor_image);
        }

        return view('actor.index',compact('userId', 'actor', 'works', 'posts', 
        'favorite_actors', 'fun_member', 'watch_movie_ids', 'files', 'watch_list_ids'));
    }

    public function upload(Request $request, $id)
    {
        $file = $request->file('actor_image');
        // s3のuploadsファイルに追加
        $path = Storage::disk('s3')->putFile('/', $file, 'public');

        $input = $request->all();

        ActorImages::create([
            'user_id' => $input['user_id'],
            'actor_id' => $input['actor_id'],
            'actor_image' => $path
        ]);

        return redirect("/actor/$id");
    }

    public function delete(Request $request)
    {
        $id = $request['actor_id'];
        $userId = Auth::id();
        $file = ActorImages::where('id', $request['id'])
                           ->select('actor_image')
                           ->first();
        ActorImages::where('id', $request['id'])->delete();
        Storage::disk('s3')->delete($file->actor_image, 'public');

        return redirect("/actor/$id");
    }
    

}
