<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function store(PostRequest $request)
    {
        
        $validated = $request->validated();
        
       
        // 現在認証されているユーザーの取得
        $user = Auth::user();
        // 現在認証されているユーザーのID取得
        $id = Auth::id();
        
                               
        Post::create([
            'image_path' => request('image_path'),
            'content' => request('content'),
            'user_id' => $id,
            'actor_id' => request('actor_id')
        ]);
        // Actor::create([
        //     'name' => 'kkkk',
        //     'youtube_link' => $request->aaaa
        //     'image_path' => 
        // ]);
        

        return redirect("/home");
    }

}
