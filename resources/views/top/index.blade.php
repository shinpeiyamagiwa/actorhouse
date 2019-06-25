@extends('layouts.app')

@section('content')
     
<!-- 会員登録ボタン -->
  <div class="Topheader jumbotron text-center">
    <h1>好きな俳優を見つけよう</h1>
    @unless (Auth::check())
      <a href="register">
        <button class="btn btn-primary"
          data-toggle="modal" data-target="#menber">会員登録
        </button>
      </a>  
      <a href="login">
        <button class="btn btn-primary"
          data-toggle="modal" data-target="#menber">ログイン
        </button>
      </a>  
    @endunless
    <br>
    <h3>映画記録アプリ</h3>
  </div>

<!-- トレンド俳優（週間でのファン登録数TOP６） -->
  <div class="trendactor text-center">
    <h3>今週のオススメ俳優</h3>
    <div class="row castList responsive mx-1 no-gutters">
      <div class="col-sm-2 col-4 mb-3">
        <a href="/actor/1">
          <img src="images/emmastone.jpg" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-sm-2 col-4 mb-3">
        <a href="/actor/3">
          <img src="images/Hailee Steinfeld.png" alt="" class="img-fluid">
        </a>      
      </div>
      <div class="col-sm-2 col-4 mb-3">
        <a href="/actor/13">
          <img src="images/George Clooney.jpg" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-sm-2 col-4 mb-3">
        <a href="/actor/10">
          <img src="images/AnnaKendrick.jpg" alt="" class="img-fluid">
        </a> 
      </div>
      <div class="col-sm-2 col-4 mb-3">
        <a href="/actor/11">
          <img src="images/Ryan_Gosling.jpg" alt="" class="img-fluid">
        </a> 
      </div>
      <div class="col-sm-2 col-4 mb-3">
        <a href="/actor/5">
          <img src="images/Tony_Stark.jpg" alt="" class="img-fluid">
        </a>
      </div>
    </div>
  </div>

<!-- 特集 -->
  <div class="jumbotron img-fluid w-100 Topic mb-1">
    <h1>HERO特集</h1>
    <div class="row mx-auto Topic_bg">
      <div  class="topic1 col-sm-6 m-auto ">
        <a href="/actor/7">
          <img src="images/Captain_american.jpg" alt="" class="img-fluid mb-3 img-responsive">
        </a>
      </div>
      <div class="col-sm-6 topic2 ">
        <div class="row  mb-3">
          <div  class="col-6  m-auto mb-3">
            <a href="/actor/8">
              <img  src="images/Captain-Marvel.jpg"  alt="" class="img-fluid img-responsive">
            </a>
          </div>
          <div  class="col-6 m-auto  mb-3">
            <a href="/actor/9">
              <img src="images/thor.jpg"   alt="" class="img-fluid img-responsive">
            </a>
          </div>
        </div>
        <div  class="row  mb-3">
          <div class="col-6 m-auto  mb-3">
            <a href="/actor/6">
              <img src="images/Haruku.jpg"  alt="" class="img-fluid img-responsive">
            </a>
          </div>
          <div  class="col-6 m-auto  mb-3">
            <a href="/actor/2">
              <img src="images/Wander_Woman.jpg"   alt="" class="img-fluid img-responsive">
            </a>
          </div>
        </div>
      </div>
    </div>    
 </div>

 <!-- 人気映画（週間で見た人数TOP６） -->
  <div class="jumbotron">
　  <h2>おすすめ映画</h2>
    <div class="row RecommendedMovie responsive mb-2">
      <div class="col-4 mb-3">
        <a href="movie">
          <img src="images/emma_LALALAND.jpg" alt="" class="img-fluid ">
        </a>
      </div>
      <div class="col-4 mb-3">
        <img src="images/Begin again.jpg" alt="" class="img-fluid">
      </div>
      <div class="col-4 mb-3">
        <img src="images/wonder-woman.jpg" alt="" class="img-fluid">
      </div>
      <div class="col-4 mb-3">
        <img src="images/starwars.jpg" alt="" class="img-fluid">
      </div>
      <div class="col-4 mb-3">
        <img src="images/ENDGAME.jpg" alt="" class="img-fluid">
      </div>
      <div class="col-4 mb-3">
        <img src="images/impossible_fallout.jpg" alt="" class="img-fluid">
      </div>
    </div>
  </div>
@endsection