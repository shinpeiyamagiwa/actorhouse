@extends('layouts.app')

@section('content')
     
<!-- 会員登録ボタン -->
  <div class="Topheader jumbotron text-center">
    <h1>好きな俳優を見つけよう</h1>
    <a href="register">
      <button class="btn btn-primary"
        data-toggle="modal" data-target="#menber">会員登録
      </button>
    </a>  
    <br>
    <h1>映画で繋がろう</h1>
  </div>

<!-- トレンド俳優（週間でのファン登録数TOP６） -->
  <div class="trendactor text-center">
    <h3　class="mx-3 ">トレンド</h3>
    <div class="row actorList responsive mx-1">
      <div class="col-sm-2 col-6">
        <img src="images/emmastone.jpg" alt="" class="img-fluid">
      </div>
      <div class="col-sm-2 col-6">
        <img src="images/Hailee Steinfeld.png" alt="" class="img-fluid">
      </div>
      <div class="col-sm-2 col-6">
        <img src="images/Tom Cruise.jpg" alt="" class="img-fluid">
      </div>
      <div class="col-sm-2 col-6">
        <img src="images/Gal_Gadot.jpg" alt="" class="img-fluid">
      </div>
      <div class="col-sm-2 col-6">
        <img src="images/Tony_Stark.jpg" alt="" class="img-fluid">
      </div>
      <div class="col-sm-2 col-6">
        <img src="images/Mark_Ruffalo.jpg" alt="" class="img-fluid">
      </div>
    </div>
    <h5　class="text-right">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, fugiat adipisci? <br>Harum tempora expedita reprehenderit dolore soluta minus obcaecati corrupti!</h5>
  </div>

<!-- 特集 -->
  <div class="jumbotron img-fluid w-100">
    <div class="display-3">HERO特集</div>
    <div class="row mx-auto">
      <div  class="topic1 col-sm-6 m-auto ">
        <img src="images/Captain_american.jpg" alt="" class="img-fluid mb-3 img-responsive">
      </div>
      <div class="col-sm-6 topic2 ">
        <div class="row  mb-3">
          <div  class="col-6  m-auto mb-3">
          <img  src="images/Captain-Marvel.jpg"  alt="" class="img-fluid img-responsive">
          </div>
          <div  class="col-6 m-auto  mb-3">
          <img src="images/thor.jpg"   alt="" class="img-fluid img-responsive">
          </div>
        </div>
        <div  class="row  mb-3">
          <div class="col-6 m-auto  mb-3">
            <img src="images/Haruku.jpg"  alt="" class="img-fluid img-responsive">
          </div>
          <div  class="col-6 m-auto  mb-3">
            <img src="images/Wander_Woman.jpg"   alt="" class="img-fluid img-responsive">
          </div>
        </div>
      </div>
    </div>    
 </div>

 <!-- 人気映画（週間で見た人数TOP６） -->
  <div class="jumbotron">
　  <h2>人気映画</h2>
    <div class="row trendMovie responsive mb-2 ">
      <div class="col-4">
        <a href="movie">
          <img src="images/emma_LALALAND.jpg" alt="" class="img-fluid ">
        </a>
      </div>
      <div class="col-4">
        <img src="images/Begin again.jpg" alt="" class="img-fluid">
      </div>
      <div class="col-4">
        <img src="images/wonder-woman.jpg" alt="" class="img-fluid">
      </div>
      <div class="col-4">
        <img src="images/starwars.jpg" alt="" class="img-fluid">
      </div>
      <div class="col-4">
        <img src="images/ENDGAME.jpg" alt="" class="img-fluid">
      </div>
      <div class="col-4">
        <img src="images/impossible_fallout.jpg" alt="" class="img-fluid">
      </div>
    </div>
  </div>
@endsection