<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostComment;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    
    public function store(PostRequest $request)
    {
        
        return $request->all();
       
        $user = Auth::user();
        $id = Auth::id();
        
                               
        PostComment::create([
            'content' => request('content'),
            'user_id' => $id,
            'posts_id' => request('post_id')
        ]);
       
        

        return redirect('/user');
    }
}
