@extends('layouts.app')

@section('content')
    <!-- 俳優プロフィール -->
  <div class="ActorProfile jumbotron">
    <div class="row">
      <div class="card actorimage  col-sm-4 ">
        <img  class="card-body center img-fluid responsive" src="images/emmastone.jpg" alt="">
        <div class="row">
          <div class="col-6">
          <p>emastone</p> 
          <h5>Fun:   人</h5>
          </div>
          <div class="float-right col-6">
            <a href="#" class="btn btn-outline-success btn-xs float-right">MyHOUSEに登録</a>
          </div>
        </div>
      </div>
      <div class="actorprofile col-sm-8">
        <div class="card w-100 h-75">
          <div class="card-body ">
            <iframe width=100% height=100% src="https://www.youtube.com/embed/tpIQe30Wj1w" frameborder="0" 
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>         
         </div>
        </div>
        <div class="profeliText ">
          <div class="actorName">
            <h5>Emma Stone</h5>
          </div>
          <ul>
            <li>生年月日	1988年11月6日（30歳）</li>
            <li>身長	168cm</li>
            <li class="d-none d-md-block">出生地	アメリカ合衆国の旗 アメリカ合衆国 アリゾナ州スコッツデール</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

<!-- 俳優出演作品 -->
<div id="ActorMovie" class="carousel slide" data-ride="carousel">
    <h5>出演作品</h5>
    <div class="carousel-inner">
      <div class="movieList responsive mx-0 carousel-item active">
        <div class="row">
          <div class="col-lg-2 col-sm-4 col-6">
            <a href="movie">
              <img src="images/emma_LALALAND.jpg" alt="" class="img-fluid mb-2">
            </a>
          </div>
          <div class="col-lg-2 col-sm-4 col-6">
            <img src="images/Begin again.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-lg-2 col-sm-4 col-6">
            <img src="images/ENDGAME.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-lg-2 col-sm-4 col-6">
            <img src="images/ROOM.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-lg-2 col-sm-4 col-6">
            <img src="images/Help1.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-lg-2 col-sm-4 col-6">
            <img src="images/Amazing Spidetman.jpg" alt="" class="img-fluid">
          </div>
        </div>
      </div>
      <div class="movieList responsive mx-0 carousel-item">
        <div class="row">
          <div class="col-lg-2 col-sm-4 col-6">
            <a href="movie">
              <img src="images/emma_LALALAND.jpg" alt="" class="img-fluid mb-2">
            </a>
          </div>
          <div class="col-lg-2 col-sm-4 col-6">
            <img src="images/Begin again.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-lg-2 col-sm-4 col-6">
            <img src="images/ENDGAME.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-lg-2 col-sm-4 col-6">
            <img src="images/ROOM.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-lg-2 col-sm-4 col-6">
            <img src="images/Help1.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-lg-2 col-sm-4 col-6">
            <img src="images/Amazing Spidetman.jpg" alt="" class="img-fluid">
          </div>
        </div>
        </div>
        <a href="#ActorMovie" class="carousel-control-prev" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a href="#ActorMovie" class="carousel-control-next" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
    </div> 
    
</div>
<!-- 俳優ツイッター＆インスタ -->
  <div class="Actorcontent"> 
    <div class="row">
      <div class="Twitter card col-sm-6">
        <a class="twitter-timeline" href="https://twitter.com/dailyemmastone?ref_src=twsrc%5Etfw" data-width=80% data-height="1000">Tweets by dailyemmastone</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
      </div>
      <div class="Instagram card col-sm-6">
        <!-- InstaWidget -->
        <a href="https://instawidget.net/v/user/emmastones.official" id="link-2da3616d407bc681087b41a4854d4ae99e5d94c9dc24aa87d09a9bcb1781baf7"  data-height="1000">@emmastones.official</a>
        <script src="https://instawidget.net/js/instawidget.js?u=2da3616d407bc681087b41a4854d4ae99e5d94c9dc24aa87d09a9bcb1781baf7&width=80%"></script>
        <!-- <iframe width="200" height="500" src="https://www.instagram.com/emmastones.official/" scrolling="auto" frameborder="0"></iframe> -->
      </div>
    </div>
  </div>

<!-- 俳優フォロワーコメント一覧 -->
  <div class="jumbotron userTwieet img-fluid w-100">
    <h1 class="text-white text-center">エマ・ストーン</h1>
    <div class="card w-75 mx-auto">
      <table class="card-body w-80 table table-responsive">
        <tbody>
          <tr>
            <td>Shinpei</td>
            <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste dicta quaerat assumenda debitis sequi officiis est voluptas eaque ipsam inventore, reprehenderit, 
              optio eius id quibusdam laudantium, suscipit deleniti asperiores velit?</td>
            <td>
              <i class="far fa-grin-beam"></i>
              <br>
              <i class="far fa-comment-dots"></i>
            </td>  
          </tr>
          <tr>
            <td>edwin</td>
            <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste dicta quaerat assumenda debitis sequi officiis est voluptas eaque ipsam inventore, reprehenderit, 
              optio eius id quibusdam laudantium, suscipit deleniti asperiores velit?</td>
          </tr>
        </tbody>
      </table> 
    </div>
  </div>
@endsection