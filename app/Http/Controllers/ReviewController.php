<?php

namespace App\Http\Controllers;

use App\Actor;
use App\FavoriteMovie;
use App\Review;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReviewController extends Controller
{
    //
    public function store(ReviewRequest $request)
    {
        $validated = $request->validated();
        //
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
       
      
        FavoriteMovie::create([
            'user_id' => $id,
            'movie_id' => request('movie_id'),
            'genre' => request('genre')
        ]);
        
        Review::create([
            'evaluate' => request('evaluate'),
            'content' => request('content'),
            'user_id' => $id,
            'movie_id' => request('movie_id')
        ]);
        // Actor::create([
        //     'name' => 'kkkk',
        //     'youtube_link' => $request->aaaa
        //     'image_path' => 
        // ]);
        
        return redirect("/home");
        
    }
}
