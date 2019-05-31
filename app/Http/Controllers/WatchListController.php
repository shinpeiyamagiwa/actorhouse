<?php

namespace App\Http\Controllers;
use App\WatchList;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class WatchListController extends Controller
{
    //
    public function store(Request $request) {
        // 現在認証されているユーザーの取得
        $user = Auth::user();
        // 現在認証されているユーザーのID取得
        $userId = Auth::id();
        
        WatchList::create([
            'user_id' => $userId,
            'movie_id' => $request->movie_id
        ]);
     

        // return redirect('/user');
        return response()->json([
            'result' => true
        ]);

    }

    public function delete(Request $request) {
        // 現在認証されているユーザーのID取得
        $userId = Auth::id();
        WatchList::where('user_id', $userId)->where('movie_id', $request->movie_id)->delete();
        
        // return redirect('/user');
        return response()->json([
            'result' => true
        ]);
    }
}
