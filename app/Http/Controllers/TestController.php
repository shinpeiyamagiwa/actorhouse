<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Actor;
use App\Cast;
class TestController extends Controller
{
    //
    public function index() {
        
        $this->createCastData();
        $this->crateMovieData();
        $this->crateActorData();
        // エラーがなかった場合の処理
        return redirect('/home');
    }

    /**
     * 映画情報を追加するメソッド
     */
    
    

    
}
