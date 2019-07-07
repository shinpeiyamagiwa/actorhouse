@extends('layouts.app')

@section('content')
     
<!-- 会員登録ボタン -->
  <div class="Topheader jumbotron text-center">
    <h1>好きな俳優を見つけよう</h1>
    @unless (Auth::check())
      <a href="register">
        <button class="btn btn-primary"
          data-toggle="modal" data-target="#menber">Register
        </button>
      </a>  
      <a href="login">
        <button class="btn btn-primary"
          data-toggle="modal" data-target="#menber">Login
        </button>
      </a>  
    @endunless
    <br>
    <h3>映画記録アプリ</h3>
  </div>

<!-- トレンド俳優（週間でのファン登録数TOP６） -->
  <div class="trendactor text-center">
    <h4>気になる俳優をクリック!!</h4>
    <div class="row castList responsive mx-1 no-gutters">
      <div class="col-sm-2 col-4 mb-3">
        <a href="/actor/524">
          <img src="images/ナタリーポートマン.jpg" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-sm-2 col-4 mb-3">
        <a href="/actor/1813">
          <img src="images/ハサウェイ.jpg" alt="" class="img-fluid">
        </a>      
      </div>
      <div class="col-sm-2 col-4 mb-3">
        <a href="/actor/1461">
          <img src="images/George Clooney.jpg" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-sm-2 col-4 mb-3">
        <a href="/actor/116">
          <img src="images/キーラナイトレイ.jpg" alt="" class="img-fluid">
        </a> 
      </div>
      <div class="col-sm-2 col-4 mb-3">
        <a href="/actor/976">
          <img src="images/201707-N0092682-main.jpg" alt="" class="img-fluid">
        </a> 
      </div>
      <div class="col-sm-2 col-4 mb-3">
        <a href="/actor/500">
          <img src="images/トムクルーズ.jpeg" alt="" class="img-fluid">
        </a>
      </div>
    </div>
  </div>
  
<!-- 特集 -->
  <div class="jumbotron img-fluid w-100 Topic mb-1">
    <h1>MARVEL特集</h1>
    <div class="row mx-auto Topic_bg">
      <div  class="topic1 col-sm-6 m-auto ">
        <a href="/actor/3223">
          <img src="images/Robert-Downey-Jr.-as-Iron-Man.jpg" alt="" class="img-fluid mb-3 img-responsive">
        </a>
      </div>
      <div class="col-sm-6 topic2 ">
        <div class="row  mb-3">
          <div  class="col-6  m-auto mb-3">
            <a href="/actor/1245">
              <img  src="images/ナターシャ.jpg"  alt="" class="img-fluid img-responsive">
            </a>
          </div>
          <div  class="col-6 m-auto  mb-3">
            <a href="/actor/7624">
              <img src="images/スタンリー.jpg"   alt="" class="img-fluid img-responsive">
            </a>
          </div>
        </div>
        <div  class="row  mb-3">
          <div class="col-6 m-auto  mb-3">
            <a href="/actor/103">
              <img src="images/Haruku.jpg"  alt="" class="img-fluid img-responsive">
            </a>
          </div>
          <div  class="col-6 m-auto  mb-3">
            <a href="/actor/12052">
              <img src="images/Gwyneth Paltrow.jpg"   alt="" class="img-fluid img-responsive">
            </a>
          </div>
        </div>
      </div>
    </div>    
 </div>

 <!-- 人気映画（週間で見た人数TOP６） -->
  <div class="jumbotron">
　  <>気になる映画をクリック</>
    <div class="row RecommendedMovie responsive mb-2">
      <div class="col-4 mb-3">
        <a href="/movie/313369">
          <img src="images/emma_LALALAND.jpg" alt="" class="img-fluid ">
        </a>
      </div>
      <div class="col-4 mb-3">
        <a href="/movie/332562">
          <img src="images/resize_image.jpg" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-4 mb-3">
        <a href="/movie/297762">
          <img src="images/wonder-woman.jpg" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-4 mb-3">
        <a href="/movie/140607">
          <img src="images/starwars.jpg" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-4 mb-3">
        <a href="/movie/299536">
          <img src="images/ENDGAME.jpg" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-4 mb-3">
        <a href="/movie/353081">
          <img src="images/impossible_fallout.jpg" alt="" class="img-fluid">
        </a>
      </div>
    </div>
  </div>
@endsection