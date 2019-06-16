<?php

namespace App\Http\Controllers;
use App\Follow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    //
    public function store(Request $request) {
        // 現在認証されているユーザーの取得
        $user = Auth::user();
        // 現在認証されているユーザーのID取得
        $id = Auth::id();
        
        Follow::create([
            'follower_id' => $id,
            'follow_id' => $request->follow_id
        ]);

        dd($request);
        // return redirect('/user');
        return response()->json([
            'result' => true
        ]);

    }

    public function delete(Request $request) {
        // 現在認証されているユーザーのID取得
        $id = Auth::id();
        Follow::where('follower_id', $id)->where('follow_id', $request->follow_id)->delete();
        
        // return redirect('/user');
        return response()->json([
            'result' => true
        ]);
    }
}
