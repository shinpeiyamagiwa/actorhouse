<?php

namespace App\Http\Controllers;
use App\Tweet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    //
    public function store(Request $request)
    {
        $id = Auth::id();

        Tweet::create([
            'user_id' => $id,
            'content' => request('content')
        ]);

        return redirect('/home');
    }

}
