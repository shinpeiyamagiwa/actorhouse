<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FavoriteActor;
use App\Post;
use Illuminate\Support\Facades\Auth;

class FavoriteActorController extends Controller
{
    //
    public function store(Request $request) {
        // 現在認証されているユーザーの取得
        $user = Auth::user();
        // 現在認証されているユーザーのID取得
        $userId = Auth::id();
        
        FavoriteActor::create([
            'user_id' => $userId,
            'actor_id' => $request->actor_id,
            'new' => 0
        ]);
         
        Post::create([
            'user_id' => $userId,
            'actor_id' => $request->actor_id,
            'content' => 'お気に入り登録しました。'
        ]);

        // return redirect('/user');
        return response()->json([
            'result' => true
        ]);

    }

    public function delete(Request $request) {
        // 現在認証されているユーザーのID取得
        $userId = Auth::id();
        FavoriteActor::where('user_id', $userId)->where('actor_id', $request->actor_id)->delete();
        Post::where('user_id', $userId)->where('actor_id', $request->actor_id)->delete();
        
        // return redirect('/user');
        return response()->json([
            'result' => true
        ]);
    }
}
