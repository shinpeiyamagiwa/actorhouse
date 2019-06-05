@extends('layouts.app')

@section('content')
<div class="MyProfile jumbotron mb-0">
    <div class="row">
      <div class="col-lg-3 col-sm-4 img-fluid mb-3">
        <div class="card myimage">
          <img  class="card-body rounded-circle" src="images/{{$user->image_path}}" alt="">
          <h3 class="text-center">{{$user->name}}</h3>
          <div class="row">
            <div class="col-4">
              <p class="float-left mr-3">FunActor:</p><h5>{{count($favorite_actors)}}</h5>
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
        <div class="card">
          <div id="FavoriteActor" class="carousel slide" data-pause="hover"
          data-ride="carousel">
            <div class="carousel-inner">
              <button type="button" class="myactorhouse btn btn-xs container mx-auto">
              <div class="display-4 mt-2 ">
                <p>MyActorList</p>
              </div>
              </button>
             <div class="card-body row responsive my-0 mx-auto">
               @if($favorite_actors)
                @foreach($favorite_actors as $favorite_actor)
                  <div class="favoriteActor col-lg-3 col-sm-3 col-4">
                    <a href="/actor/{{$favorite_actor->actor_id}}">
                      <img src="/images/{{$favorite_actor->image_path}}" alt="" class="img-fluid mb-2">
                    </a>
                    <p>{{$favorite_actor->name}}</p>
                  </div>
                @endforeach
             @endif
            </div>
            </div>
          </div>
         

            {{-- <div class="col-sm-3 col-6">
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
            </div> --}}

        </div>
        
        <a href="admin/users" class="btn btn-outline-success btn-xs float-right">編集</a>
        @if($user->id === 1)
        <a href="admin/actors" class="btn btn-outline-success btn-xs float-right">俳優追加</a>
        <a href="admin/movies" class="btn btn-outline-success btn-xs float-right">映画追加</a>
        @endif
      </div>
    </div>
  </div>

  <div class="usercontent sticky-top">
    <div class="row container mx-auto responsive">
      <div class="mycontent1 col-3 text-center"date-toggle="collapse"
      data-target="#twieetRoom">
        <div class="display-4">
          <i class="far fa-comments"></i>
        </div>
        <h6>Follow's Twieet</h6>
      </div>
      <div class="mycontent2 col-3 text-center"date-toggle="collapse"
      data-target="#movieRoom">
        <div class="display-4">
          <i class="fas fa-film"></i>
        </div>
        <h6>Documentary Films</h6>
      </div>
      <div class="mycontent3 col-3 text-center"date-toggle="collapse"
      data-target="#actroRoom">
        <div class="display-4">
          <i class="fas fa-users"></i>  
        </div>
        <h6>Fun Actors</h6>
      </div>
      <div class="mycontent4 col-3 text-center"date-toggle="collapse"
      data-target="#watchlistRoom">
        <div class="display-4">
          <i class="far fa-check-square"></i>  
        </div>
        <h6>WatchList</h6>
      </div>
    </div>
  </div> 

  <div class="usercontent"> 
    <div id="twieetRoom" class="card collapse">
      <a class="twitter-timeline" href="https://twitter.com/dailyemmastone?ref_src=twsrc%5Etfw" data-width=80% data-height="1000">Tweets by dailyemmastone</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
    </div>
    <div id="movieRoom" class="card collapse">
      <div class="row responsive mb-2 container mx-auto mt-5">
          @if($favorite_movies)
            @foreach($favorite_movies as $favorite_movie)
              <div class="movieList col-lg-2 col-sm-3 col-4 float-right"
              data-toggle="modal" data-target="#moviediary">
                <a href="/movie/{{$favorite_movie->movie_id}}">
                  <img src="/images/{{$favorite_movie->image_path}}" alt="" class="img-fluid mb-2">
                  <p>{{$favorite_movie->title}}</p>
                </a>
              </div>
            @endforeach
          @endif
      </div>
    </div>
    <div id="actorRoom" class="card collapse">
      <div class="row responsive mb-2 container mx-auto mt-5">
      @if($favorite_actors)
            @foreach($favorite_actors as $favorite_actor)
              <div class="favoriteActor col-lg-2 col-sm-3 col-4">
                <a href="/actor/{{$favorite_actor->actor_id}}">
                  <img src="/images/{{$favorite_actor->image_path}}" alt="" class="img-fluid mb-2">
                </a>
                <p>{{$favorite_actor->name}}</p>
              </div>
            @endforeach
          @endif
        </div>
      </div>      
    </div>
    <div id="watchlistRoom" class="card collapse">
      <div class="row responsive mb-2 container mx-auto mt-5">
          @if($watch_lists)
            @foreach($watch_lists as $watch_list)
              <div class="movieList col-lg-2 col-sm-3 col-4 float-right"
              data-toggle="modal" data-target="#moviediary">
                <a href="/movie/{{$watch_list->movie_id}}">
                  <img src="/images/{{$watch_list->image_path}}" alt="" class="img-fluid mb-2">
                  <p>{{$watch_list->title}}</p>
                </a>
              </div>
            @endforeach
          @endif
      </div>
    </div>
  </div>
  <script>
    $('.mycontent1').click(function () {
    $('#twieetRoom').addClass('show');
    $('#movieRoom').removeClass('show');
    $('#actorRoom').removeClass('show');
    $('#watchlistRoom').removeClass('show');
  });
  $('.mycontent2').click(function () {
    $('#movieRoom').addClass('show');
    $('#twieetRoom').removeClass('show');
    $('#actorRoom').removeClass('show');
    $('#watchlistRoom').removeClass('show');
  });
  $('.mycontent3').click(function () {
    $('#actorRoom').addClass('show');
    $('#movieRoom').removeClass('show');
    $('#twieetRoom').removeClass('show');
    $('#watchlistRoom').removeClass('show');
  });
  $('.mycontent4').click(function () {
    $('#watchlistRoom').addClass('show');
    $('#movieRoom').removeClass('show');
    $('#actorRoom').removeClass('show');
    $('#twieetRoom').removeClass('show');
  });</script>
  <!-- <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<script>
      $('.mycontent1').click(function () {
      $('#twieetRoom').addClass('show');
      $('#movieRoom').removeClass('show');
      $('#actorRoom').removeClass('show');
    });
    $('.mycontent2').click(function () {
      $('#movieRoom').addClass('show');
      $('#twieetRoom').removeClass('show');
      $('#actorRoom').removeClass('show');
    });
    $('.mycontent3').click(function () {
      $('#actorRoom').addClass('show');
      $('#movieRoom').removeClass('show');
      $('#twieetRoom').removeClass('show');
    });</script> -->
@endsection
<!-- <script>
    $('[data-toggle="modal"]').hover(function() {
    var modalId = $(this).data('target');
    $(modalId).modal('show');
    }):
    </script> -->