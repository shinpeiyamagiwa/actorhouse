<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

class UserController extends Controller
{
    //
    public function index() {
        $users = Users::all();
        return view('user.index',compact('users'));
    }
}
