<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actors;

class ActorController extends Controller
{
    //
    public function index() {

        $actors = Actors::all();

        return view('actor.index',compact('actors'));
        


        
    }
}
