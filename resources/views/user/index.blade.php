@extends('layouts.app')

@section('content')
<div class="MyProfile jumbotron">
    <div class="row movieList">
      <div class="col-lg-3 col-sm-6 img-fluid mb-3">
        <div class="card myimage ">
          <img  class="card-body rounded-circle" src="images/emmastone.jpg" alt="">
          <h3 class="text-center">Shinpei</h3>
          <div class="row">
            <div class="col-4">
              <p>FunActor:</p>
            </div>
            <div class="col-4">
              <p>Follow:</p>
            </div>
            <div class="col-4">
              <p>Follower:</p>
            </div>  
          </div>
        </div>
      </div>
      <div class="funactor col-lg-9">
        <div class="card actorprofile">
          <div class="profeliText text-center text-white">
            <div class="fumName">
              <h3>My TOP4</h3>
            </div>
          </div>
          <div class="card-body row myactorList responsive my-0 mx-auto">
            <div class="col-sm-3 col-6">
              <a href="actor">
                <img src="images/emmastone.jpg" alt="" class="img-fluid card">
                <p>エマ・ストーン</p>
              </a>
            </div>
            <div class="col-sm-3 col-6">
              <img src="images/Gal_Gadot.jpg" alt="" class="img-fluid card">
              <p>ガル・ガドット</p>
            </div>
            <div class="col-sm-3 col-6">
              <img src="images/Tom Cruise.jpg" alt="" class="img-fluid card">
              <p>トム・クルーズ</p>
            </div>
            <div class="col-sm-3 col-6">
              <img src="images/Tony_Stark.jpg" alt="" class="img-fluid card">
              <p>ロバート・ダウニーjr</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="ActorMovie ">
    <div class="row movieList responsive">
      <div class="mycontent1 col-4 text-center"date-toggle="collapse"
      data-target="#twieetRoom">
        <div class="display-3">
          <i class="far fa-comments"></i>
        </div>
        <h6>Follow's Twieet</h6>
      </div>
      <div class="mycontent2 col-4 text-center"date-toggle="collapse"
      data-target="#movieRoom">
        <div class="display-3">
          <i class="fas fa-film"></i>
        </div>
        <h6>Documentary Films</h6>
      </div>
      <div class="mycontent3 col-4 text-center"date-toggle="collapse"
      data-target="#actorRoom">
        <div class="display-3">
          <i class="fas fa-users"></i>  
        </div>
        <h6>Fun Actors</h6>
      </div>
    </div>
  </div> 

  <div class="Actorcontent"> 
    <div id="twieetRoom" class="card collapse">
      <a class="twitter-timeline" href="https://twitter.com/dailyemmastone?ref_src=twsrc%5Etfw" data-width=80% data-height="1000">Tweets by dailyemmastone</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
    </div>
    <div id="movieRoom" class="card collapse ">
      <div class="row actorList responsive mb-2 container">
        <div class="col-md-3 col-6">
          <a href="movie">
            <img src="images/emma_LALALAND.jpg" alt="" class="img-fluid ">
          </a>
        </div>
        <div class="col-md-3 col-6">
          <img src="images/Begin again.jpg" alt="" class="img-fluid">
        </div>
        <div class="col-md-3 col-6">
          <img src="images/ENDGAME.jpg" alt="" class="img-fluid">
        </div>
        <div class="col-md-3 col-6">
          <img src="images/ROOM.jpg" alt="" class="img-fluid">
        </div>
      </div>
    </div>
    <div id="actorRoom" class="card collapse">
      <div class="row actorList responsive mb-2 container mx-auto">
        <div class="col-2">
            <img src="images/emmastone.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-2">
            <img src="images/Hailee Steinfeld.png" alt="" class="img-fluid">
          </div>
          <div class="col-2">
            <img src="images/Tom Cruise.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-2">
            <img src="images/Gal_Gadot.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-2">
            <img src="images/Tony_Stark.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-2">
            <img src="images/Mark_Ruffalo.jpg" alt="" class="img-fluid">
          </div>
        </div>
        <br>
        <div class="row actorList responsive container mx-auto">
          <div class="col-2">
            <a href="movie">
              <img src="images/anna kendrick.jpg" alt="" class="img-fluid ">
            </a>
          </div>
          <div class="col-2 ">
            <img src="images/Brie_Larson.jpg" alt="" class="img-fluid mx-0">
          </div>
          <div class="col-2 ">
            <img src="images/George Clooney.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-2 ">
            <img src="images/Ryan_Gosling.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-2 ">
            <img src="images/Cris Pine.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-2 ">
            <img src="images/Lily Collins.jpg" alt="" class="img-fluid">
          </div>
        </div>
      </div>      
    </div>
  </div>

@endsection