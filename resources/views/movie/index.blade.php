@extends('layouts.app')

@section('content')

{{-- 映画トップ --}}
  <div class="movieTop jumbotron mb-0"
  @isset($movie->backdrop_path)
    style="background-image:url('http://image.tmdb.org/t/p/w500/{{$movie->backdrop_path}}');
    background-repeat:no-repeat;
    background-size:cover;
    object-fit: cover;
    color:white;
    "
    @endisset>
    <div class="bg mx-auto"></div>
    <div class="container-fluid">
      <div class="row">
      {{-- 映画データ --}}
        <div class="movieimage col-sm-4 mb-3">
          <img  class="img-fluid"  src="http://image.tmdb.org/t/p/w500/{{$movie->image_path}}" alt="">
        </div>         
        <div class="movieprofile col-sm-8 mx-auto">
          <div class="movieName">
            <h1>{{$movie->title}}</h1>
            
            <div class="col row float-left">
            <div class="col-4">
              <h6 class="mb-0">評価</h6>
            </div>
            <div class="col-4">
              <h6 class="mb-0">見た人</h6>
            </div>
            <div class="col-4">
              <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-text=" "  data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>          </div>
              <div id="fb-root"></div>
            </div>
          </div>
          <div class="col row">
            <div class="col-4 pr-4">
              <h1 class="float-right">{{round($avg,2)}}</h1>
            </div>
            <div class="col-4 pr-4">
              <h1 class="float-right">{{count($reviews)}}</h1>
            </div>
            <div class="col-4">
              <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v3.3"></script>
              <div class="fb-share-button" data-href="https://www.theactorhouse.com/movie/{{$movie->tmdb_id}}"  data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.theactorhouse.com%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">シェア</a></div>
            </div>
          </div>
          <div class="row">
            <div class="col-2">
      {{-- レビュー投稿 --}}
              @if(!$evaluate)
                <div class="mt-0">
                  <button class="btn btn-outline-light" id="diary"
                  data-toggle="modal" data-target="#moviediary" data-toggle="popover" data-content="記録をつける">
                    <p class="my-auto"><i class="fas fa-star icon"></i>
                    </p>
                  </button>
                  <br>
                  <div class="modal fade" id="moviediary" tabindex="-1" role="dialog" 
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                      <div class="modal-content">
                        <div class="modal-body text-dark pb-0 pt-1">
                          {!! Form::open(['method'=>'POST', 'action'=> 'ReviewController@evaluate']) !!}
                          <div class="form-group mb-0 mt-2">
                              <i class="fas fa-star"></i>
                            {!! Form::label('evaluate', '評価') !!}
                            {{Form::range('evaluate', '3',['id'=>'range', 'min'=>0,'max'=>5.0, 'step'=>0.1])}}<span id="value" class="mx-3">3</span>
                            {!! Form::button('記録', array(
                              'type' => 'submit',
                              'class'=> 'submit btn-sm',
                      )) !!}
                            {{-- {!! Form::submit('記録', null, ['class'=>'btn btn-success']) !!} --}}

                          </div>
                            <div class="form-group">
                                {{Form::hidden('movie_id', $movie->tmdb_id)}} 
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
                  <div class="btn btn-light mr-auto">
                    <i class="fas fa-check"></i>               </div>
                </div>
              @endif
            </div>
      {{-- ウォッチリスト登録 --}}
            <div class="col-2">
              @if(isset($watchList))
                <div class="mt-0 text-center">
                  <button data-movie-id="{{$movie->tmdb_id}}" data-watchlist="ture" id="watchlist_button" type="button" class="watchList btn btn-light btn-xs"
                      data-toggle="popover" data-content="ウォッチリストから削除">
                    <span id="watchlist_text">
                      <p class="my-auto"><i class="fas fa-tag tagIcon"></i></p>
                    </span>
                  </button>
                </div>
              @else
                <div class="mt-0 text-cente">
                  <button data-movie-id="{{$movie->tmdb_id}}" data-watchlist="false" id="watchlist_button" type="button" class="watchList btn btn-outline-light btn-xs"
                      data-toggle="popover" data-content="ウォッチリストに追加">
                    <span id="watchlist_text">
                      <p class="my-auto"><i class="fas fa-tag tagIcon"></i></p>
                    </span>
                  </button>
                </div>
              @endif
            </div>
      {{-- お気に入り --}}
            {{-- @if(isset($movie->homepage))
              <div class="col-2">
                <a href={{$movie->homepage}}　target="_blank">
                  <button id="homepage" class="btn btn-success btn-xs" data-toggle="popover" data-content="お気に入り映画">
                    <i class="far fa-heart"></i>
                  </button>
                </a>
              </div>
            @endif  --}}
            <div class="col-2">
              @if(!$favorite_movies)
                <button data-movie-id="{{$movie->tmdb_id}}" data-favorite="false" id="favorite_button" type="button" class="registButton btn btn-outline-light btn-xs"
                    data-toggle="popover" data-content="お気に入り登録する">
                  <span id="regist_text">
                    <i class="fas fa-heart icon"></i>
                  </span>
                </button>
              @else
                <button data-movie-id="{{$movie->tmdb_id}}" data-favorite="true" id="favorite_button" type="button" class="registButton btn btn-light btn-xs"
                    data-toggle="popover" data-content="お気に入り解除する">
                  <span id="regist_text">
                    <i class="fas fa-heart icon"></i>
                  </span>
                </button>
              @endif
            </div>
      {{-- amazonprime --}}         
            <div class="col-2">
                <a target="_blank" href="https://www.amazon.co.jp/gp/search?ie=UTF8&tag=actorhouse-22&linkCode=ur2&linkId=973a0f1c46e57d4ec347c0c9c2534b06&camp=247&creative=1211&index=instant-video&keywords={{$movie->title}}">
                  <button id="amazon" class="btn btn-outline-light btn-xs" data-toggle="popover" data-content="Prime Video">
                    <i class="fab fa-amazon"></i>
                  </button>
                </a><img src="//ir-jp.amazon-adsystem.com/e/ir?t=actorhouse-22&l=ur2&o=9" width="1" height="1" alt="" style="border:none !important; margin:0px !important;" />
              {{-- <a href="https://www.amazon.co.jp/{{$movie->title}}/dp/B00JM4051Y/ref=dp_olp_1" target="_blank">
              </a> --}}
            </div> 
      {{-- Netflix --}}         
            <div class="col-2">
              <a href="https://www.netflix.com/search?q={{$movie->title}}" target="_blank">
                <button id="netflix" class="btn btn-outline-light btn-xs" data-toggle="popover" data-content="Netflix">
                  <p class="mb-0 text-danger">N</p>
                </button>
              </a>
            </div> 
      {{-- google music --}}         
            <div class="col-2">
              <a href="https://play.google.com/store/search?q={{$movie->title}}&c=music&hl=ja/" target="_blank">
                <button id="music" class="btn btn-outline-light btn-xs" data-toggle="popover" data-content="music">
                    <i class="fas fa-headphones-alt"></i>
                </button>
              </a>
            </div>          
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
    <div id="actorRoom" class="collapse bg-light show">
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
  </div>
{{-- 映画予告動画 --}}
    <div id="videoRoom" class="container collapse bg-light">
      <div class="row responsive mb-2 container mx-auto mt-5">
      <iframe width=100% height=500px src="https://www.youtube.com/embed/{{$movie->video_link}}" 
        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>    
      @if(is_null($movie->video_link))
          <a href="https://www.youtube.com/results?search_query={{$movie->title}}予告編">
          動画はありません。予告編(youtebe)はこちら
        </a>
      @endif
    </div>
      <div class="responsive mb-2 mx-auto mt-5">
          @if($reviews)
            <div class="center-block">
              <div class="container">
                @foreach($reviews as $review)
                  <div class="card border-success mb-3" >
                    <div class="card-header d-inline py-0">
                      <div class="row no-gutters mt-1">
                        <div class="col-6 d-inline-block rounded-circle postImages mr-2">
                          <a href="/user/{{$review->user_id}}">
                            <p class="mt-2 mb-2">
                              @if($review->image_path)
                              <img src="{{Storage::disk('s3')->url($review->image_path)}}" alt="" class="">
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
{{-- レビュー一覧 --}}
              <button tyoe="button" class="btn btn-outline-dark" id="post_button"
              data-toggle="modal" data-target="#review" data-toggle="popover" data-content="俳優について投稿">
                <i class="far fa-edit">コメントする</i>
              </button>
              <div class="modal fade" id="review"　tabindex="-1" role="dialog" 
              aria-labelledby="reviewModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header bg-light">
                      <h5 class="modal-title"　id="reviewModalLabel">{{$movie->title}}についてコメント</h5>
                      <button class="close" data-dismiss="modal">
                        &times;
                      </button>
                    </div>
                    <div class="modal-body">
                          {!! Form::open(['method'=>'POST', 'action'=> 'ReviewController@store']) !!}
                      <div class="form-group">
                          {!! Form::textarea('content', null, ['class'=>'form-control','placeholder'=>'好きにレビューを書こう']) !!} 
                      </div>
                      <div class="form-group">
                          {{Form::hidden('movie_id', $movie->tmdb_id)}} 
                      </div>
                      <div class="form-group">
                        {!! Form::button('記録', array(
                                      'type' => 'submit',
                                      'class'=> 'submit btn-sm',
                              )) !!}
                      </div>
                      @if (count($errors) > 0 )
                      <div class="alert alert-danger">
                        <p>投稿できませんでした</p>
                        <ul>
                            @foreach($errors->all() as $error)
                              <li>
                                  {{ $error }}
                              </li>
                            @endforeach
                          </ul>
                      </div>
                      @endif
                      {!! Form::close() !!}
                    </div>
                  </div>
                </div>
              </div>
    <div id="reviewsRoom" class="collapse bg-light">
      <div class="responsive mb-2 mx-auto mt-5">
        @if($reviews)
          <div class="center-block">
            <div class="container">
              @foreach($reviews as $review)
                <div class="card border-success mb-3" >
                  <div class="card-header d-inline py-0">
                    <div class="row no-gutters mt-1">
                      <div class="col-10 d-inline-block rounded-circle postImages mr-2">
                        <a href="/user/{{$review->user_id}}">
                          <p class="mt-2 mb-2">
                            @if($review->image_path)
                            <img src="{{Storage::disk('s3')->url($review->image_path)}}" alt="" class="">
                            @else
                            <i class="fas fa-user"></i>
                            @endif
                            {{$review->name}}
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
                      </div> --}}
                    </div>
                  </div>
                  <div class="card-body pt-3 pb-1">
                    @if(isset($review->evaluate))
                      <div class="mb-0">
                        <p class="mb-0">評価：{{$review->evaluate}}</p>
                      </div>
                      <hr class="mt-1 mb-1">
                    @endif
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
<script>
  var elem = document.getElementById('range');
  var target = document.getElementById('value');
  var rangeValue = function (elem, target) {
    return function(evt){
      target.innerHTML = elem.value;
    }
  }
  elem.addEventListener('input', rangeValue(elem, target));
</script>
<script>
  $(function() {
    $('#watchlist_button').popover({
      trigger: 'hover', 
    });
  });

  $(function() {
    $('#diary').popover({
      trigger: 'hover', 
    });
  });

  $(function() {
    $('#homepage').popover({
      trigger: 'hover', 
    });
  });
  $(function() {
    $('#amazon').popover({
      trigger: 'hover', 
    });
  });
  $(function() {
    $('#netflix').popover({
      trigger: 'hover', 
    });
  });
  $(function() {
    $('#music').popover({
      trigger: 'hover', 
    });
  });
</script>
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
          url: "{{url('/watchlist/movie/store')}}",
          dataType: "json",
          data: {movie_id : movie_id}
        }).done(function (response) {
          // 通信成功時の処理
          if (response['result']) {
            alert('ウォッチリスト登録しました！');
            $('.watchList').data('watchlist', true);
            $('#watchlist_text').html('<p class="my-auto"><i class="fas fa-tag tagIcon"></i></p>');
            $('#watchlist_button').attr('data-content', 'ウォッチリストから削除');
            let target = document.getElementById("watchlist_button");
              target.className = "registButton btn btn-light btn-xs";
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
          url: "{{url('/watchlist/movie/delete')}}",
          dataType: "json",
          data: {movie_id : movie_id}
        }).done(function (response) {
          // 通信成功時の処理
          if (response['result']) {
            alert('ウォッチリスト解除しました！');
            $('.watchList').data('watchlist', false);
            $('#watchlist_text').html('<p class="my-auto"><i class="fas fa-tag tagIcon"></i></p>');
            $('#watchlist_button').attr('data-content', 'ウォッチリストに追加');
            let target = document.getElementById("watchlist_button");
              target.className = "registButton btn btn-outline-light btn-xs";
          }
        }).fail(function (err) {
          // 通信失敗時の処理
          alert('ファイルの取得に失敗しました。');
        });
        }
      });
    });
  </script>
{{-- お気に入り映画登録 --}}
  <script type="text/javascript">
    $(function(){
      $('#favorite_button').on('click', function() {
        var movie_id = $(this).data('movieId')

        const is_favorite = $(this).data('favorite');
        console.log('is_favorite: ', is_favorite);
        if (is_favorite == false) {
          // 登録処理
          $.ajax({
            type: "POST",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{url('/favorite/movie/store')}}",
            dataType: "json",
            data: {movie_id : movie_id}
          }).done(function (response) {
            // 通信成功時の処理
            if (response['result']) {
              alert('登録する');
              // data属性を書き換える
              // $('.registButton')[0].dataset.favorite = 'true';
              $('.registButton').data('favorite', true);
              // ボタンの表記を書き換える
              $('#regist_text').html('<i class="fas fa-heart icon"></i>');
              $('#favorite_button').attr('data-content', 'お気に入り解除する');
              let target = document.getElementById("favorite_button");
              target.className = "registButton btn btn-light btn-xs";//class名変更
            }
          }).fail(function (err) {
            // 通信失敗時の処理
            alert('ファイルの取得に失敗しました。');
          });
        } else {
          // 登録解除処理
          $.ajax({
            type: "POST",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{url('/favorite/movie/delete')}}",
            dataType: "json",
            data: {movie_id : movie_id}
          }).done(function (response) {
            // 通信成功時の処理
            if (response['result']) {
              alert('登録解除');
              // $('.registButton')[0].dataset.favorite = 'false';
              $('.registButton').data('favorite', false);
              $('#regist_text').html('<i class="fas fa-heart icon"></i>');
              $('#favorite_button').attr('data-content', 'お気に入り登録する');
              let target = document.getElementById("favorite_button");
              target.className = "registButton btn btn-outline-light btn-xs";//class名変更
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
