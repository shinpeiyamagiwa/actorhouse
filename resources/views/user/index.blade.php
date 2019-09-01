@extends('layouts.app')

@section('content')
<div class="userTop jumbotron mb-0">   
      <div class="container">
        <div class="row">
{{-- ユーザーデータ --}}
          <div class="userimage col-3 mb-3">
            @if($user->image_path)
              <img  class="img-fluid rounded-circle border border-success"  src="{{Storage::disk('s3')->url($user->image_path)}}" alt="">
            @else
              <img  class="img-fluid rounded-circle border border-success"  src="/images/no-image.png" alt="">
            @endif
          </div>
          <div class="userprofile col-9 mx-auto">
              <div class="userName">
                <h1>
                  {{$user->name}}
                </h1>
              </div>
              <hr>
              <div class="col row float-left">
                <div class="col-3">
                  <h6 class="mb-0  d-none d-sm-block">お気に入り俳優</h6>
                </div>
                <div class="col-3">
                  <h6 class="mb-0  d-none d-sm-block">映画鑑賞数</h6>
                </div>
                <div class="col-3">
                  <h6 class="mb-0 d-none d-sm-block">映画評価平均</h6>
                </div>
                <div class="col-3">
                  <h6 class="mb-0 d-none d-sm-block">コメント数</h6>
                </div>
              </div>
              <div class="col row">
                <div class="col-3">
                    <h1 class="float-right d-none d-sm-block">{{count($favorite_actors)}}人</h1>
                </div>
                <div class="col-3">
                  <h1 class="float-right d-none d-sm-block">{{count($reviews)}}本</h1>
                </div>
                <div class="col-3">
                    <h1 class="float-right d-none d-sm-block">{{round($avg,2)}}</h1>
                </div>
                <div class="col-3">
                  <h1 class="float-right d-none d-sm-block">{{count($reviews) + count($posts)}}</h1>
                </div>
              </div>
            </div>
          <div class="row d-sm-none d-block">
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
                <h6 class="mb-0">コメント数</h6>
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
          </div>
{{-- フォロー機能 --}}
          <div class="col">
            <div class="mt-0 text-center">
              @if(isset($follow))
                <button data-user-id="{{$user->id}}" data-follow="ture" id="follow_button" type="button" class="follow btn btn-outline-success btn-xs">
                  <span id="follow_text">
                    <h6 class="my-auto">フォロー解除</h6>
                  </span>
                </button>
              @else
                <button data-user-id="{{$user->id}}" data-follow="false" id="follow_button" type="button" class="follow btn btn-outline-success btn-xs">
                  <span id="follow_text">
                    <h6 class="my-auto">フォローする</i></h6>
                  </span>
                </button>
              @endif
              </div>
          </div>
        </div>
      </div>  
  </div>

{{-- ユーザーメニューバー --}}
  <div class="usercontentList sticky-top border-bottom align-items-center ">
    <div class="follow_uservar pt-2">
      <div class="row container mx-auto responsive">
        <div class="mycontent1 col-md-3 col-3 text-center"date-toggle="collapse"
        data-target="#movieRoom">
          <h6>鑑賞映画</h6>
        </div>
        <div class="mycontent2 col-md-3 col-3 text-center"date-toggle="collapse"
        data-target="#reviewRoom">
          <h6>レビュー</h6>
        </div>
        <div class="mycontent3 col-md-3 col-3 text-center"date-toggle="collapse"
        data-target="#actorRoom">
          <h6>お気に入り俳優</h6>
        </div>
        <div class="mycontent4 col-md-3 col-3 text-center"date-toggle="collapse"
        data-target="#top20Room">
          <h6>視聴俳優TOP</h6>
        </div>
      </div>
    </div>
  </div> 

{{-- ユーザーメニューアイテム --}}
  <div class="usercontent"> 
  {{-- 映画鑑賞リスト --}}
  <div id="movieRoom" class="card collapse">
      {{-- 映画ジャンルメニューバー --}}
        <div class="genretList border-bottom align-items-center ">
          <div class="genrevar pt-2">
            <div class="row container mx-auto responsive">
              <div class="genre1 col-md-2 col-6 text-center"date-toggle="collapse"
              data-target="#all">
                <h6>鑑賞映画</h6>
              </div>
              <div class="genre2 col-md-2 col-6 text-center"date-toggle="collapse"
              data-target="#favorite">
                <h6>お気に入り映画</h6>
              </div>
            </div>
          </div>
        </div>
      {{-- 全ジャンル --}}
        <div id="all" class="collapse show">
          <div class="row responsive mb-2 container-fluid mx-auto mt-5">
              @if($evaluates)
                @foreach($evaluates as $evaluate)
                  <div id="movieList" class="movieList col-lg-2 col-sm-3 col-4 float-right"
                  data-toggle="modal" data-target="#moviediary">
                    <a href="/movie/{{$evaluate->movie_id}}">
                      <img src="http://image.tmdb.org/t/p/w500/{{$evaluate->image_path}}" alt="" class="img-fluid mb-2">
                      @if(isset($evaluate->evaluate))
                        <div class="badge scoreBadge p-0">
                          <p class="mt-1">{{$evaluate->evaluate}}</p>
                        </div>
                      @endif
                    </a>
                      <p>{{$evaluate->title}}</p>
                  </div>
                @endforeach
              @endif
          </div>
        </div>
      {{-- アクション --}}
        <div id="favorite" class="collapse">
          <div class="row responsive mb-2 container-fluid mx-auto mt-5">
              @if($favorite_movies)
                @foreach($favorite_movies as $favorite_movie)
                  <div class="movieList col-lg-2 col-sm-3 col-4 float-right"
                  data-toggle="modal" data-target="#moviediary">
                    <a href="/movie/{{$favorite_movie->tmdb_id}}">
                      <img src="http://image.tmdb.org/t/p/w500/{{$favorite_movie->image_path}}" alt="" class="img-fluid mb-2">
                    </a>
                      <p>{{$favorite_movie->title}}</p>
                  </div>
                @endforeach
              @endif
          </div>
        </div> 
      </div>
    
  {{-- 映画レビュー一覧 --}}
    <div id="reviewRoom" class="collapse">
      <div class="responsive mb-2 mx-auto mt-5">
        @if($reviews)
          <div class="img-fluid  center-block">
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
  
    {{-- ツイート種類メニューバー --}}
    {{-- お気に入り俳優 --}}
    <div id="actorRoom" class="collapse show">
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
    <div id="top20Room" class="collapse">
        <div class="row responsive mb-2 container mx-auto mt-5">
          @if($watch_actors)
            @for($i = 0; $i < count($watch_actors); ++$i) 
              @if(isset($watch_actors[$i]['image_path']))
                <div class="col-md-3 col-6 col-offset-3 d-flex align-items-center pl-5">
                  第<h1 class="py-auto">{{$i+1}}</h1>位
                </div>
                <div class="movieList col-md-3 col-5 float-right">
                  <a href="/actor/{{$watch_actors[$i]['tmdb_id']}}">
                    <img src="http://image.tmdb.org/t/p/w500/{{$watch_actors[$i]['image_path']}}" alt="" class="img-fluid mb-2">
                  </a>
                  <p>{{$watch_actors[$i]['name']}}</p>
                </div>
              @endif
            @endfor
          @endif
        </div>
      </div>
  </div>
{{-- メニューバー --}}
  <script>
    $('.mycontent1').click(function () {
    $('#movieRoom').addClass('show');
    $('#reviewRoom').removeClass('show');
    $('#top20Room').removeClass('show');
    $('#actorRoom').removeClass('show');
  });
  $('.mycontent2').click(function () {
    $('#reviewRoom').addClass('show');
    $('#movieRoom').removeClass('show');
    $('#top20Room').removeClass('show');
    $('#actorRoom').removeClass('show');
  });
  $('.mycontent3').click(function () {
    $('#actorRoom').addClass('show');
    $('#movieRoom').removeClass('show');
    $('#reviewRoom').removeClass('show');
    $('#top20Room').removeClass('show');
  });
  $('.mycontent4').click(function () {
    $('#top20Room').addClass('show');
    $('#movieRoom').removeClass('show');
    $('#reviewRoom').removeClass('show');
    $('#actorRoom').removeClass('show');
  });
  </script>
{{-- ジャンルcollapse --}}
  <script>
    $('.genre1').click(function () {
    $('#all').addClass('show');
    $('#favorite').removeClass('show');
  });
  $('.genre2').click(function () {
    $('#favorite').addClass('show');
    $('#all').removeClass('show');
  });
  </script>
{{-- フォローメニューバー --}}
    <script>
      $('.follow1').click(function () {
        $('#reviews').addClass('show');
        $('#posts').removeClass('show');
        $('#tweets').removeClass('show');
      });
      $('.follow2').click(function () {
        $('#posts').addClass('show');
        $('#reviews').removeClass('show');
        $('#tweets').removeClass('show');
      });
      $('.follow3').click(function () {
        $('#tweets').addClass('show');
        $('#reviews').removeClass('show');
        $('#posts').removeClass('show');
      });
    </script>
{{-- フォローajax --}}
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
            url: "{{url('/follow/user/store')}}",
            dataType: "json",
            data: {follow_id : follow_id}
          })
          .done(function (response) {
            // 通信成功時の処理
            if (response['result']) {
              alert('フォローしました！');
              $('.follow').data('follow', true);
              $('#follow_text').text('フォロー解除');
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
            url: "{{url('/follow/user/delete')}}",
            dataType: "json",
            data: {follow_id : follow_id}
          }).done(function (response) {
            // 通信成功時の処理
            if (response['result']) {
              alert('フォロー解除しました！');
              $('.follow').data('follow', false);
              $('#follow_text').text('フォローする');
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