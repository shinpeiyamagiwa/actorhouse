<?php

namespace App\Http\Controllers;

use App\ReviewComment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReviewRequest;
use Illuminate\Http\Request;

class ReviewCommentController extends Controller
{
    //
    public function store(ReviewRequest $request)
    {
        //
        $validated = $request->validated();
        $id = Auth::id();
        // Validator::make($request, [
        //     'movie_id' => Rule::unique('reviews')->where(function ($query) {
        //         return $query->where('user_id', $id);
        //     })
        // ]);
        //  dd($request->all());
        // 現在認証されているユーザーの取得
        $user = Auth::user();
        // 現在認証されているユーザーのID取得
       
        
        ReviewComment::create([
            'content' => request('content'),
            'user_id' => $id,
            'review_id' => request('review_id')
        ]);
        // Actor::create([
        //     'name' => 'kkkk',
        //     'youtube_link' => $request->aaaa
        //     'image_path' => 
        // ]);
        

        return redirect('/home');
        
    }
}
