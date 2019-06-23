<?php

namespace App\Http\Controllers;
use App\Tweet;
use App\Http\Requests\TweetRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    //
    public function store(TweetRequest $request)
    {
        $validated = $request->validated();
        
        $id = Auth::id();

        Tweet::create([
            'user_id' => $id,
            'content' => request('content')
        ]);

        return redirect('/home');
    }

}
