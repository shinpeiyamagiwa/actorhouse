@extends('layouts.app')

@section('content')
<!-- 映画紹介 -->
<div class="movieTop jumbotron mt-4 mb-0"
@isset($movie->backdrop_path)
  style="background-image:url('http://image.tmdb.org/t/p/w500/{{$movie->backdrop_path}}');
  background-repeat:no-repeat;
  background-size:cover;
  object-fit: cover;
  color:white;
  "
  @endisset>
  <div class="bg"></div>
  <div class="container-fluid">
    <div class="row">
    {{-- 映画データ --}}
      <div class="movieimage col-sm-4 mb-3">
        <img  class="img-fluid"  src="http://image.tmdb.org/t/p/w500/{{$movie->image_path}}" alt="">
      </div>         
      <div class="movieprofile col-sm-8 mx-auto">
        <div class="movieName">
          <h1>{{$movie->title}}</h1>
        </div>
        <div class="col row float-left">
          <div class="col-4">
            <h6 class="mb-0">評価</h6>
          </div>
          <div class="col-4">
            <h6 class="mb-0">見た人</h6>
          </div>
        </div>
        <div class="col row">
          <div class="col-3">
            <h1 class="float-right">{{round($avg,2)}}</h1>
          </div>
          <div class="col-3">
            <h1 class="float-right">{{count($reviews)}}</h1>
          </div>
          <div class="col-2">
    {{-- レビュー投稿 --}}
            @if(!$review)
              <div class="mt-0">
                <button class="btn btn-outline-success"
                data-toggle="modal" data-target="#moviediary" >
                  <p class="my-auto"><i class="fas fa-book"></i></p>
                </button>
                <br>
                <div class="modal fade" id="moviediary" tabindex="-1" role="dialog" 
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-success">
                        <h5 class="modal-title" id="exampleModalLabel">記録</i></h5>
                        <button class="close" data-dismiss="modal">
                          &times;
                        </button>
                      </div>
                      <div class="modal-body text-dark">
                        {!! Form::open(['method'=>'POST', 'action'=> 'ReviewController@store']) !!}
                        <div class="form-group">
                          {!! Form::label('evaluate', '評価：') !!}
                          {{Form::selectRange('evaluate', 0, 5.0, '', ['placeholder' => ''])}}
                        </div>
                        <div class="form-group">
                          {!! Form::label('genre', 'ジャンル：') !!}
                          {{Form::select('genre', ['','アクション', 'サスペンス', 'ドラマ', 'コメディ', 'ホラー'], null, ['class' => 'field'])}}
                        </div>
                        <div class="form-group">
                          {!! Form::label('content', '感想：') !!}
                          {!! Form::textarea('content', '鑑賞しました', ['class'=>'form-control']) !!} 
                        </div>
                          <div class="form-group">
                              {{Form::hidden('movie_id', $movie->tmdb_id)}} 
                          </div>
                          <div class="form-group">
                              {!! Form::submit('記録', null, ['class'=>'btn btn-success']) !!}
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
              </div>
            @else
              <div class="mt-0">
                <div class="btn btn-success mr-auto">
                  <i class="fas fa-check-square"></i>
                </div>
              </div>
            @endif
          </div>
    {{-- ウォッチリスト登録 --}}
          <div class="col-2">
            @if(isset($watchList))
              <div class="mt-0 text-center">
                <button data-movie-id="{{$movie->tmdb_id}}" data-watchlist="ture" id="watchlist_button" type="button" class="watchList btn btn-success btn-xs">
                  <span id="watchlist_text">
                    <p class="my-auto"><i class="fas fa-tag"></i></i></p>
                  </span>
                </button>
              </div>
            @else
              <div class="mt-0">
                <button data-movie-id="{{$movie->tmdb_id}}" data-watchlist="false" id="watchlist_button" type="button" class="watchList btn btn-outline-success btn-xs">
                  <span id="watchlist_text">
                    <p class="my-auto"><i class="fas fa-list-ol"></i></p>
                  </span>
                </button>
              </div>
            @endif
          </div>
    {{-- 映画ホームページ --}}
          @if(isset($movie->homepage))
            <div class="col-2">
              <button class="btn btn-outline-success btn-xs">
                <a href={{$movie->homepage}}>
                  <i class="far fa-id-card"></i>
                </a>
              </button>
            </div>
          @endif          
        </div>
    {{-- 映画公開日・作品時間 --}}
        <div class="col introduction">
          <p>
            {{$movie->overview}}
          </p>
        </div>
        <div class="col row">
          <div class="col-6">
            公開日
            <br>
            {{$movie->released_at}}
          </div>
          <div class="col-6">
            作品時間
            <br>
            {{$movie->screen_time}}分
          </div>
        </div>
        @if($userId === 1)
          <div class="col">
            <a href={{route('movies.edit', $movie->tmdb_id)}}>
              <button>
                <p class="my-auto">編集</p>
              </button>
            </a>
          </div>
        @endif
      </div>
    </div>
  </div>  
</div>

<div class="bg-light">
{{-- 映画メニューバー --}}
  <div class="actorcontentList sticky-top border-bottom align-items-center pt-2">
    <div class="row container mx-auto responsive">
      <div class="mycontent1 col-4 text-center"date-toggle="collapse"
      data-target="#actorRoom">
        <h6>出演俳優</h6>
      </div>
      <div class="mycontent2 col-4 text-center"date-toggle="collapse"
      data-target="#videoRoom">
        <h6>予告編</h6>
      </div>
      <div class="mycontent3 col-4 text-center"date-toggle="collapse"
      data-target="#reviewsRoom">
        <h6>レビュー</h6>
      </div>
    </div>
  </div>  

{{-- キャスト一覧 --}}
  <div class="moviecontent bg-light"> 
    <div id="actorRoom" class="collapse bg-light">
      <div class="container">
        <div class="row responsive mb-2 mx-0 mt-5">
          @if($casts)
            @foreach($casts as $cast)
              <div class="castList col-lg-2 col-sm-3 col-4">
                <a href="/actor/{{$cast->actor_id}}">
                  <img src="http://image.tmdb.org/t/p/w500/{{$cast->image_path}}" alt="" class="img-fluid mb-2">
                  <p>{{$cast->name}}</p>
                </a>
              </div>
            @endforeach
          @endif
        </div>
      </div>
    </div>
{{-- 映画予告動画 --}}
    <div id="videoRoom" class="container collapse show bg-light">
      <div class="row responsive mb-2 container mx-auto mt-5">
      <iframe width=100% height=500px src="https://www.youtube.com/embed/{{$movie->video_link}}" 
        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>    
      </div>
    </div>
{{-- レビュー一覧 --}}
    <div id="reviewsRoom" class="collapse bg-light">
      <div class="responsive mb-2 mx-auto mt-5">
        @if($reviews)
          <div class="review center-block">
            <div class="container">
              @foreach($reviews as $review)
                <div class="card border-success mb-3" >
                  <div class="card-header d-inline py-0">
                    <div class="row no-gutters mt-1">
                      <div class="col-6 d-inline-block rounded-circle postImages mr-2">
                        <a href="/user/{{$review->user_id}}">
                          <p class="mt-2 mb-2">
                            @if($user->image_path)
                            <img src="/images/{{$user->image_path}}" alt="" class="">
                            @else
                            <i class="fas fa-user"></i>
                            @endif
                            {{$review->name}}
                          </p>
                        </a>
                      </div>
                      <div class="col-1 float-right">
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
                                      {!! Form::textarea('content', null, ['class'=>'form-control']) !!} 
                                  </div>
                                  <div class="form-group">
                                      {{Form::hidden('movie_id', $movie->tmdb_id)}} 
                                  </div>
                                  <div class="form-group">
                                      {{Form::hidden('review_id', $review->id)}} 
                                  </div>
                                  <div class="form-group">
                                      {!! Form::submit('返信', null, ['class'=>'btn btn-success']) !!}
                                  </div>
                                  {!! Form::close() !!}
                                  @if (count($errors) > 0 )
                                    <div class="alert alert-danger">
                                      <ul>
                                          @foreach($errors->all() as $error)
                                            <li>
                                                {{ $error }}
                                            </li>
                                          @endforeach
                                        </ul>
                                    </div>
                                    @endif
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body pt-3">
                    <div class="mb-0">
                    @if(isset($review->evaluate))
                      <p class="mb-0">評価：{{$review->evaluate}}</p>
                    @endif
                    </div>
                    <hr class="mt-1">
                    <p class="text-success">
                      {{$review->content}}
                    </p>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        @endif
      </div>      
    </div>     
  </div>  
</div>     
<hr>
{{-- 映画メニューバー --}}
  <script>
    $('.mycontent1').click(function () {
    $('#actorRoom').addClass('show');
    $('#videoRoom').removeClass('show');
    $('#reviewsRoom').removeClass('show');
  });
  $('.mycontent2').click(function () {
    $('#videoRoom').addClass('show');
    $('#actorRoom').removeClass('show');
    $('#reviewsRoom').removeClass('show');
  });
  $('.mycontent3').click(function () {
    $('#reviewsRoom').addClass('show');
    $('#videoRoom').removeClass('show');
    $('#actorRoom').removeClass('show');
  });
  </script>
{{-- ウォッチリスト追加ajax --}}
  <script type="text/javascript">
    $(function(){
      $('#watchlist_button').on('click', function() {
        var movie_id = $(this).data('movieId')
        // var actor_id = $('#actor_id').val();
        const watchList = $(this).data('watchlist')
        // console.log(watchList == false)デバック処理
        if (watchList == false) {
        $.ajax({
          type: "POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: 'https://actorhouse.test/watchlist/movie/store',
          dataType: "json",
          data: {movie_id : movie_id}
        }).done(function (response) {
          // 通信成功時の処理
          if (response['result']) {
            alert('ウォッチリスト登録しました！');
            $('.watchList').data('watchlist', true);
            $('#watchlist_text').html('<i class="fas fa-tag"></i>');
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
          url: 'https://actorhouse.test/watchlist/movie/delete',
          dataType: "json",
          data: {movie_id : movie_id}
        }).done(function (response) {
          // 通信成功時の処理
          if (response['result']) {
            alert('ウォッチリスト解除しました！');
            $('.watchList').data('watchlist', false);
            $('#watchlist_text').html('<i class="fas fa-list-ol">');
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
