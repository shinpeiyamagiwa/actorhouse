<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Movie;
use App\FavoriteMovie;
use App\WatchList;
use App\Review;
use Illuminate\Support\Facades\Redirect;
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
        $movie_id = $request->movie_id;
        $actor_id = $request->actor_id;
        $genre = $request->genre;
        $review = Review::where('user_id', '=', $id)
                                ->where('movie_id', '=', $movie_id)
                                ->first();
        
        if(is_null($review)) { 
            Review::create([
                'evaluate' => request('evaluate'),
                'content' => request('content'),
                'genre' => request('genre'),
                'user_id' => $id,
                'movie_id' => request('movie_id'),
            ]);
        }

        WatchList::where('movie_id', '=', $movie_id)
              ->where('user_id', '=', $id)
              ->delete();
             
        if(isset($actor_id)) {
            return redirect("/actor/$actor_id");
        }
        // $released_at = Movie::where('tmdb_id', '=', $movie_id)
        //                     ->select('released_at')
        //                     ->first();
        
        return redirect("/home");
        
    }

    public function delete(Request $request)
    {
        $movie_id = $request->movie_id;
        $userId = Auth::id();

        Review::where('movie_id', '=', $movie_id)
              ->where('user_id', '=', $userId)
              ->delete();
             
              
        
        return redirect("/home");
    }
}
