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
        data-target="#tweetRoom">
          <h6>ツイート</h6>
        </div>
        <div class="mycontent4 col-md-3 col-3 text-center"date-toggle="collapse"
        data-target="#actorRoom">
          <h6>お気に入り俳優</h6>
        </div>
      </div>
    </div>
  </div> 

{{-- ユーザーメニューアイテム --}}
  <div class="usercontent"> 
  {{-- 映画鑑賞リスト --}}
    <div id="movieRoom" class="card collapse">
      <div class="row responsive mb-2 container-fluid mx-auto mt-5">
          @if($favorite_movies)
            @foreach($favorite_movies as $favorite_movie)
              <div class="movieList col-lg-2 col-sm-3 col-4 float-right"
              data-toggle="modal" data-target="#moviediary">
                <a href="/movie/{{$favorite_movie->movie_id}}">
                  <img src="http://image.tmdb.org/t/p/w500/{{$favorite_movie->image_path}}" alt="" class="img-fluid mb-2">
                </a>
                <p>{{$favorite_movie->title}}</p>
              </div>
            @endforeach
          @endif
      </div>
    </div>
  {{-- 映画レビュー一覧 --}}
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
  {{-- ツイート一覧 --}}
    <div id="tweetRoom" class="collapse">
    {{-- ツイート種類メニューバー --}}
      <div class="followList border-bottom align-items-center ">
        <div class="followvar pt-2">
          <div class="row container mx-auto responsive">
            <div class="follow1 col-4 text-center"date-toggle="collapse"
            data-target="#reviews">
              <h6>映画レビュー</h6>
            </div>
            <div class="follow2 col-4 text-center"date-toggle="collapse"
            data-target="#posts">
              <h6>俳優登録</h6>
            </div>
            <div class="follow3 col-4 text-center"date-toggle="collapse"
            data-target="#tweets">
              <h6>ツイート</h6>
            </div>
          </div>
        </div>
      </div>
    {{-- フォローユーザーレビュー --}}
      <div id="reviews" class="collapse">
        <div class="responsive mb-2 mx-auto mt-5">
          @if($follow_reviews)
            <div class="review center-block">
              <div class="container">
                @foreach($follow_reviews as $follow_review)
                  <div class="card border-success mb-3" >
                    <div class="card-header d-inline py-0">
                      <div class="row no-gutters mt-1">
                        <div class="col-6 d-inline-block rounded-circle postImages mr-2">
                          <a href="/user/{{$follow_review->user_id}}">
                            <p class="mt-2 mb-2">
                              @if($follow_review->user_image)
                              <img src="{{Storage::disk('s3')->url($follow_review->user_image)}}" alt="" class="">
                              @else
                              <i class="fas fa-user"></i>
                              @endif
                              {{$follow_review->name}}
                            </p>
                          </a>
                        </div>
                    {{-- TODO返信機能 --}}
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
                                  {!! Form::open(['method'=>'review', 'action'=> 'ReviewCommentController@store']) !!}
                                    <div class="form-group">
                                        {!! Form::label('content', '') !!}
                                        {!! Form::textarea('content', null, ['class'=>'form-control']) !!} 
                                    </div>
                                    <div class="form-group">
                                        {{Form::hidden('review_id', $follow_review->id)}} 
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
                    {{-- //TODO返信機能 --}}
                      </div>
                    </div>
                    <div class="card-body pt-3 postImages">
                      <div class="mb-0">
                      @if(isset($follow_review->evaluate))
                        <p class="mb-0">評価：{{$follow_review->evaluate}}</p>
                      @endif
                      <a href="/movie/{{$follow_review->tmdb_id}}">
                        @if($follow_review->movie_image)
                          <img src="http://image.tmdb.org/t/p/w500/{{$follow_review->movie_image}}" alt="" class="">
                        @endif
                        {{$follow_review->title}}
                        </div>
                        <hr class="mt-1">
                        @if(isset($follow_review->content))
                          <p class="mb-0">{{$follow_review->content}}</p>
                        @endif
                      </a>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          @endif
        </div>  
      </div>
    {{-- フォローユーザー俳優コメント  --}}
      <div id="posts" class="collapse">
        <div class="responsive mb-2 mx-auto mt-5">
          @if($follow_posts)
            <div class="posts center-block">
              <div class="container">
                @foreach($follow_posts as $follow_post)
                  <div class="card border-success mb-3" >
                    <div class="card-header d-inline py-0">
                      <div class="row no-gutters mt-1">
                        <div class="col-6 d-inline-block rounded-circle postImages mr-2">
                          <a href="/user/{{$follow_post->user_id}}">
                            <p class="mt-2 mb-2">
                              @if($user->image_path)
                              <img src="{{Storage::disk('s3')->url($follow_review->user_image)}}" alt="" class="">
                              @else
                              <i class="fas fa-user"></i>
                              @endif
                              {{$follow_post->user_name}}
                            </p>
                          </a>
                        </div>
                      {{-- TODO返信機能 --}}
                        {{-- <div class="col-1 float-right">
                          <div data-toggle="modal" data-target="#postreply">
                            <i class="far fa-comment-dots float-left mt-2"></i>
                          </div>
                          <div class="modal fade" id="postreply"　tabindex="-1" role="dialog" 
                            aria-labelledby="postReplyLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header bg-success">
                                  <button class="close" data-dismiss="modal">
                                    &times;
                                  </button>
                                </div>
                                <div class="modal-body">
                                  {!! Form::open(['method'=>'post', 'action'=> 'PostCommentController@store']) !!}
                                    <div class="form-group">
                                        {!! Form::label('content', '') !!}
                                        {!! Form::textarea('content', null, ['class'=>'form-control']) !!} 
                                    </div>
                                    <div class="form-group">
                                        {{Form::hidden('post_id', $follow_post->id)}} 
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
                      {{-- //TODO返信機能 --}}
                      </div>
                    </div>
                    <div class="card-body pt-3 postImages">
                      <div class="mb-0">
                        <a href="/actor/{{$follow_post->tmdb_id}}">
                          <p class="mt-2 mb-2">
                            @if($follow_post->actor_image)
                            <img src="http://image.tmdb.org/t/p/w500/{{$follow_post->actor_image}}" alt="" class="">
                            @else
                            <i class="fas fa-user"></i>
                            @endif
                            {{$follow_post->actor_name}}
                          </p>
                        </a>
                      </div>
                      <hr class="mt-1">
                      @if(isset($follow_post->content))
                        <p class="mb-0">{{$follow_post->content}}</p>
                      @endif
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          @endif
        </div>  
      </div> 
    {{-- フォローユーザーツイート --}}
      <div id="tweets" class="collapse">
        <div class="responsive mb-2 mx-auto mt-5">
          @if($follow_tweets)
            <div class="tweets center-block">
              <div class="container">
                @foreach($follow_tweets as $follow_tweet)
                  <div class="card border-success mb-3" >
                    <div class="card-header d-inline py-0">
                      <div class="row no-gutters mt-1">
                        <div class="col-6 d-inline-block rounded-circle postImages mr-2">
                          <a href="/user/{{$follow_tweet->user_id}}">
                            <p class="mt-2 mb-2">
                              @if($user->image_path)
                              <img src="/images/{{$follow_tweet->image_path}}" alt="" class="">
                              @else
                              <i class="fas fa-user"></i>
                              @endif
                              {{$follow_tweet->user_name}}
                            </p>
                          </a>
                        </div>
                      {{-- TODO返信機能 --}}
                        {{-- <div class="col-1 float-right">
                          <div data-toggle="modal" data-target="#reviewreply">
                            <i class="far fa-comment-dots float-left mt-2"></i>
                            @if(isset($review->review_id))
                            <a href="/review/comment/{{$review->id}}">
                              <p>{{count($review->review_id)}}</p>
                            </a>
                            @endif
                          </div> --}}
                          {{-- <div class="modal fade" id="reviewreply"　tabindex="-1" role="dialog" 
                            aria-labelledby="reviewReplyLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header bg-success">
                                  <button class="close" data-dismiss="modal">
                                    &times;
                                  </button>
                                </div>
                                <div class="modal-body">
                                  {!! Form::open(['method'=>'tweet', 'action'=> 'TweetCommentController@store']) !!}
                                    <div class="form-group">
                                        {!! Form::label('content', '') !!}
                                        {!! Form::textarea('content', null, ['class'=>'form-control']) !!} 
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
                          </div> --}}
                        {{-- </div> --}}
                      {{-- //TODO返信機能 --}}
                      </div>
                    </div>
                    <div class="card-body pt-3">
                        <p class="mb-0">{{$follow_tweet->content}}</p>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          @endif
        </div>  
      </div> 
    </div>
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
  </div>
{{-- メニューバー --}}
  <script>
    $('.mycontent1').click(function () {
    $('#movieRoom').addClass('show');
    $('#reviewRoom').removeClass('show');
    $('#tweetRoom').removeClass('show');
    $('#actorRoom').removeClass('show');
  });
  $('.mycontent2').click(function () {
    $('#reviewRoom').addClass('show');
    $('#movieRoom').removeClass('show');
    $('#tweetRoom').removeClass('show');
    $('#actorRoom').removeClass('show');
  });
  $('.mycontent3').click(function () {
    $('#tweetRoom').addClass('show');
    $('#movieRoom').removeClass('show');
    $('#reviewRoom').removeClass('show');
    $('#actorRoom').removeClass('show');
  });
  $('.mycontent4').click(function () {
    $('#actorRoom').addClass('show');
    $('#movieRoom').removeClass('show');
    $('#reviewRoom').removeClass('show');
    $('#tweetRoom').removeClass('show');
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