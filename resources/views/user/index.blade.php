@extends('layouts.app')

@section('content')
<div class="userTop jumbotron mt-4 mb-0">
    <div class="b"></div>
      <div class="container-fluid">
        <div class="row">
          <div class="userimage col-sm-3 mb-3">
            @if($user->image_path)
              <img  class="img-fluid"  src="/images/{{$user->image_path}}" alt="">
            @else
              <img  class="img-fluid"  src="/images/no-image.png" alt="">
            @endif
          </div>
          <div class="userprofile col-sm-9 mx-auto">
            <div class="userName">
              <h1>{{$user->title}}</h1>
            </div>
            <div class="col row float-left">
              <div class="col-3">
                <h6 class="mb-0">お気に入り俳優</h6>
              </div>
              <div class="col-3">
                <h6 class="mb-0">映画鑑賞数</h6>
              </div>
              <div class="col-3">
                <h6 class="mb-0">映画評価平均</h6>
              </div>
              <div class="col-3">
                <h6 class="mb-0">レビュー<br>コメント数</h6>
              </div>
            </div>
            <div class="col row">
              <div class="col-3">
                  <h1 class="float-right">{{count($favorite_actors)}}人</h1>
              </div>
              <div class="col-3">
                <h1 class="float-right">{{count($reviews)}}本</h1>
              </div>
              <div class="col-3">
                  <h1 class="float-right">{{round($avg,2)}}</h1>
              </div>
              <div class="col-3">
                <h1 class="float-right">{{count($reviews) + count($posts)}}</h1>
              </div>
            </div>
            <div class="col">
              <a href={{route('users.edit', $user->id)}}>
                <button>
                  <p class="my-auto">編集</p>
                </button>
              </a>
            </div>
            @if(isset($follow))
              <div class="col">
                <div class="mt-0 text-center">
                  <button data-user-id="{{$user->id}}" data-follow="ture" id="follow_button" type="button" class="follow btn btn-outline-success btn-xs">
                    <span id="follow_text">
                      <p class="my-auto">フォローを外す</p>
                    </span>
                  </button>
                </div>
              </div>
            @else
              <div class="col">
                <div class="mt-0">
                  <button data-user-id="{{$user->id}}" data-follow="false" id="follow_button" type="button" class="follow btn btn-outline-success btn-xs">
                    <span id="follow_text">
                      <p class="my-auto">フォローする</i></p>
                    </span>
                  </button>
                </div>
              </div>
            @endif
            @if(Auth::id() === 1)
              <div class="col">
                <a href='/test'>
                  <button>
                    <p class="my-auto">更新</p>
                  </button>
                </a>
              </div>
            @endif
          </div>
        </div>
      </div>  
  </div>


  <div class="actorcontentList sticky-top border-bottom align-items-center ">
    <div class="uservar pt-2">
      <div class="row container mx-auto responsive">
        <div class="mycontent1 col-2 text-center"date-toggle="collapse"
        data-target="#movieRoom">
          <h6>鑑賞映画</h6>
        </div>
        <div class="mycontent2 col-2 text-center"date-toggle="collapse"
        data-target="#reviewRoom">
          <h6>レビュー</h6>
        </div>
        <div class="mycontent3 col-2 text-center"date-toggle="collapse"
        data-target="#twieetRoom">
          <h6>ツイート</h6>
        </div>
        <div class="mycontent4 col-2 text-center"date-toggle="collapse"
        data-target="#actorRoom">
          <h6>お気に入り俳優</h6>
        </div>
        <div class="mycontent5 col-2 text-center"date-toggle="collapse"
        data-target="#watchlistRoom">
          <h6>ウォッチリスト</h6>
        </div>
      </div>
    </div>
    </div> 

  <div class="usercontent"> 
    <div id="movieRoom" class="card collapse">
      <div class="row responsive mb-2 container-fluid mx-auto mt-5">
          @if($favorite_movies)
            @foreach($favorite_movies as $favorite_movie)
              <div class="movieList col-lg-2 col-sm-3 col-4 float-right"
              data-toggle="modal" data-target="#moviediary">
                <a href="/movie/{{$favorite_movie->movie_id}}">
                  <img src="http://image.tmdb.org/t/p/w500/{{$favorite_movie->image_path}}" alt="" class="img-fluid mb-2">
                  <p>{{$favorite_movie->title}}</p>
                </a>
              </div>
            @endforeach
          @endif
      </div>
    </div>
    <div id="reviewRoom" class="collapse">
      <div class="responsive mb-2 mx-auto mt-5">
        @if($reviews)
          <div class="review img-fluid  center-block">
            <div class="container">
              @foreach($reviews as $review)
                <div class="card border-success mb-3" >
                  <div class="card-header d-inline py-0">
                    <div class="row no-gutters mt-1">
                      <div class="col-1 rounded-circle postImages mr-2 d-inline-block">
                        @if($review->image_path)
                          <img src="http://image.tmdb.org/t/p/w500/{{$review->image_path}}" alt="" class="mt-2 float-right">
                        @else
                          <i class="fas fa-user mt-2 float-right"></i>
                        @endif
                      </div>
                      <div class="col-5 float-left d-inline-block">
                        <a href="/movie/{{$review->movie_id}}">
                          <p class="ml-1 mt-1 py-0">{{$review->title}}<p>
                        </a>
                      </div>
                        {{-- <div class="col-1 float-right">
                          <div data-toggle="modal" data-target="#reviewreply">
                            <i class="far fa-comment-dots float-left mt-2"></i>
                          </div>
                          <div class="modal fade" id="reviewreply"　tabindex="-1" role="dialog" 
                          aria-labelledby="reviewReplyLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header bg-success">
                                  <button class="close" data-dismiss="modal">
                                    &times;
                                  </button>
                                </div>
                                <div class="modal-body">
                                    {!! Form::open(['method'=>'review', 'action'=> 'reviewController@store']) !!}
                                    <div class="form-group">
                                        {!! Form::label('content', '') !!}
                                        {!! Form::textarea('content', null, ['class'=>'form-control']) !!} 
                                    </div>
                                    <div class="form-group">
                                        {{Form::hidden('actor_id', $actor->id)}} 
                                    </div>
                                    <div class="form-group">
                                        {{Form::hidden('review_id', $review->id)}} 
                                    </div>
                                    <div class="form-group">
                                        {!! Form::submit('返信', null, ['class'=>'btn btn-success']) !!}
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    {!! Form::close() !!}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div> --}}
                    </div>
                  </div>
                  <div class="card-body">
                      {{$review->content}}
                  </div>
                </div>
              @endforeach
            </div>
          @endif
        </div>
      </div>
    </div>
    <div id="twieetRoom" class="collapse">
      <div class="responsive mb-2 mx-auto mt-5">
        @if($reviews)
          <div class="review img-fluid  center-block">
            <div class="container">
              @foreach($reviews as $review)
                <div class="card border-success mb-3" >
                  <div class="card-header d-inline py-0">
                    <div class="row no-gutters mt-1">
                      <div class="col-1 rounded-circle postImages mr-2 d-inline-block">
                        @if($review->image_path)
                          <img src="http://image.tmdb.org/t/p/w500/{{$review->image_path}}" alt="" class="mt-2 float-right">
                        @else
                          <i class="fas fa-user mt-2 float-right"></i>
                        @endif
                      </div>
                      <div class="col-5 float-left d-inline-block">
                        <a href="/movie/{{$review->movie_id}}">
                          <p class="ml-1 mt-1 py-0">{{$review->title}}<p>
                        </a>
                      </div>
                        {{-- <div class="col-1 float-right">
                          <div data-toggle="modal" data-target="#reviewreply">
                            <i class="far fa-comment-dots float-left mt-2"></i>
                          </div>
                          <div class="modal fade" id="reviewreply"　tabindex="-1" role="dialog" 
                          aria-labelledby="reviewReplyLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header bg-success">
                                  <button class="close" data-dismiss="modal">
                                    &times;
                                  </button>
                                </div>
                                <div class="modal-body">
                                    {!! Form::open(['method'=>'review', 'action'=> 'reviewController@store']) !!}
                                    <div class="form-group">
                                        {!! Form::label('content', '') !!}
                                        {!! Form::textarea('content', null, ['class'=>'form-control']) !!} 
                                    </div>
                                    <div class="form-group">
                                        {{Form::hidden('actor_id', $actor->id)}} 
                                    </div>
                                    <div class="form-group">
                                        {{Form::hidden('review_id', $review->id)}} 
                                    </div>
                                    <div class="form-group">
                                        {!! Form::submit('返信', null, ['class'=>'btn btn-success']) !!}
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    {!! Form::close() !!}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div> --}}
                    </div>
                  </div>
                  <div class="card-body">
                      {{$review->content}}
                  </div>
                </div>
              @endforeach
            </div>
          @endif
        </div>
      </div>
    </div>
    </div>
    <div id="actorRoom" class="collapse">
      <div class="myactorList row responsive mb-2 container mx-auto mt-5">
          @if($favorite_actors)
            @foreach($favorite_actors as $favorite_actor)
              <div class="favoriteActor col-lg-2 col-sm-3 col-4">
                <a href="/actor/{{$favorite_actor->actor_id}}">
                  <img src="http://image.tmdb.org/t/p/w500/{{$favorite_actor->image_path}}" alt="" class="img-fluid mb-2">
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
                  <img src="http://image.tmdb.org/t/p/w500/{{$watch_list->image_path}}" alt="" class="img-fluid mb-2">
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
    $('#movieRoom').addClass('show');
    $('#reviewRoom').removeClass('show');
    $('#twieetRoom').removeClass('show');
    $('#actorRoom').removeClass('show');
    $('#watchlistRoom').removeClass('show');
  });
  $('.mycontent2').click(function () {
    $('#reviewRoom').addClass('show');
    $('#movieRoom').removeClass('show');
    $('#twieetRoom').removeClass('show');
    $('#actorRoom').removeClass('show');
    $('#watchlistRoom').removeClass('show');
  });
  $('.mycontent3').click(function () {
    $('#twieetRoom').addClass('show');
    $('#movieRoom').removeClass('show');
    $('#reviewRoom').removeClass('show');
    $('#actorRoom').removeClass('show');
    $('#watchlistRoom').removeClass('show');
  });
  $('.mycontent4').click(function () {
    $('#actorRoom').addClass('show');
    $('#movieRoom').removeClass('show');
    $('#reviewRoom').removeClass('show');
    $('#twieetRoom').removeClass('show');
    $('#watchlistRoom').removeClass('show');
  });
  $('.mycontent5').click(function () {
    $('#watchlistRoom').addClass('show');
    $('#movieRoom').removeClass('show');
    $('#reviewtRoom').removeClass('show');
    $('#twieetRoom').removeClass('show');
    $('#actorRoom').removeClass('show');
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
    <script type="text/javascript">
      $(function(){
        $('#follow_button').on('click', function() {
          var follow_id = $(this).data('userId')
          // var actor_id = $('#actor_id').val();
          const follow = $(this).data('follow')
          if (follow == false) {
          $.ajax({
            type: "POST",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'https://actorhouse.test/follow/user/store',
            dataType: "json",
            data: {follow_id : follow_id}
          }).done(function (response) {
            // 通信成功時の処理
            console.log(response['result'])
            if (response['result']) {
              alert('フォローしました！');
              $('.follow').data('follow', true);
              // $('#watchlist_text').text('');
            }
          }).fail(function (err) {
            // 通信失敗時の処理
            alert('ファイルの取得に失敗しました。');
          });
          }else{
            $.ajax({
            type: "POST",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'https://actorhouse.test/follow/user/delete',
            dataType: "json",
            data: {follow_id : follow_id}
          }).done(function (response) {
            // 通信成功時の処理
            if (response['result']) {
              alert('フォロー解除しました！');
              $('.follow').data('follow', false);
              // $('#watchlist_text').text('気になる');
            }
          }).fail(function (err) {
            // 通信失敗時の処理
            alert('ファイルの取得に失敗しました。');
          });
          }
        });
      });
    </script>
@endsection
<!-- <script>
    $('[data-toggle="modal"]').hover(function() {
    var modalId = $(this).data('target');
    $(modalId).modal('show');
    }):
    </script> -->