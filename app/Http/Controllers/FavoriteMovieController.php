<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FavoriteMovie;
use App\Review;
use Illuminate\Support\Facades\Auth;
class FavoriteMovieController extends Controller
{
    //
    public function store(Request $request) {
        // 現在認証されているユーザーの取得
        $user = Auth::user();
        // 現在認証されているユーザーのID取得
        $userId = Auth::id();
        
        FavoriteMovie::create([
            'user_id' => $userId,
            'movie_id' => $request->movie_id,
            'genre' => 0
        ]);
        
        // Review::create([
        //     'user_id' => $userId,
        //     'movie_id' => $request->movie_id,
        //     'content' => 'お気に入り登録しました。'
        // ]);

        // return redirect('/user');
        return response()->json([
            'result' => true
        ]);

    }

    public function delete(Request $request) {
        // 現在認証されているユーザーのID取得
        $userId = Auth::id();
        FavoriteMovie::where('user_id', $userId)->where('movie_id', $request->movie_id)->delete();
        // Review::where('user_id', $userId)->where('movie_id', $request->movie_id)->delete();
        
        // return redirect('/user');
        return response()->json([
            'result' => true
        ]);
    }
}
