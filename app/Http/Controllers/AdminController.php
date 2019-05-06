<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function createactor() {
        return view('admin.createactor');
    }
    public function createmovie() {
        return view('admin.createmovie');
    }
    
}
