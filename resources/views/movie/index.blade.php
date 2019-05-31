@extends('layouts.app')

@section('content')
<!-- 映画紹介 -->
  <div class="MovieProfile jumbotron">
    <div class="row">
      <div class="movieimage col-sm-4 col-6 mb-3">
        <img  class="img-fluid"  src="/images/{{$movie->image_path}}" alt="">
      </div>
      <div class="d-block d-sm-none moviename col-6">
        <h3>{{$movie->title}}</h3>           
        <ul class="d-block d-sm-none moviename ">
          <li>公開日	{{$movie->released_at}}</li>
          <li>作品時間	{{$movie->screen_time}}分</li>
        </ul>
      </div>
      <div class="actorprofile col-sm-8 mb-3">
        <div class="card w-100 h-75">
          <div class="card-body  w-100 h-100">
            <iframe width=100% height=100% src="https://www.youtube.com/embed/{{$movie->video_link}}" 
            frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>        
          </div>
        </div>
        <div class="row">
          <div class="actorName col-6 d-none d-md-block">
            <h3>{{$movie->title}}</h3>           
            <ul class="d-none d-md-block">
              <li>公開日	{{$movie->released_at}}</li>
              <li>作品時間	{{$movie->screen_time}}分</li>
            </ul>
          </div>
          <div class="rowß">
          @if(!$review)
            <div class="mt-3">
              <button class="btn btn-outline-success"
              data-toggle="modal" data-target="#moviediary">
                <p class="my-auto">記録</p>
              </button>
              <br>
              <div class="modal fade" id="moviediary" tabindex="-1" role="dialog" 
              aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-success">
                      <h5 class="modal-title" id="exampleModalLabel">日記</h5>
                      <button class="close" data-dismiss="modal">
                        &times;
                      </button>
                    </div>
                    <div class="modal-body">
                    <!-- <form action="form-group"> -->
                    {!! Form::open(['method'=>'POST', 'action'=> 'ReviewController@store']) !!}
                        <!-- <label for="point">評価</label>
                        <input type="text" placeholder="評価0~5.0"
                        class="form-control"> -->
                        <div class="form-group">
                        {!! Form::label('evaluate', '評価：') !!}
                        <!-- {!! Form::text('comment', null, ['class'=>'form-control']) !!} -->
                        {{Form::selectRange('evaluate', 0, 5.0, '', ['placeholder' => ''])}}
                        </div>
                        <!-- <div class="form-group">
                          <label for="point">鑑賞日</label>
                          <input type="date" name="date"　class="form-control">
                          {!! Form::label('period', '日付:') !!}
                          {{Form::selectRange('from_year', 1960, 2019, '', ['placeholder' => ''])}}年
                          {{Form::selectRange('from_month', 1, 12, '', ['placeholder' => ''])}}月
                          {{Form::selectRange('from_day', 1, 31, '', ['placeholder' => ''])}}日
                        </div> -->
                        <!-- <div class="form-group">
                            {!! Form::label('title', 'タイトル：') !!}
                            {!! Form::textarea('title', null, ['class'=>'form-control']) !!} 
                        </div> -->
                        <div class="form-group">
                            {!! Form::label('content', '感想：') !!}
                            {!! Form::textarea('content', null, ['class'=>'form-control']) !!} 
                            <!-- <label for="point">感想</label>
                            <textarea name="editor1" class="form-control"></textarea> -->
                        </div>
                        <div class="form-group">
                            {{Form::hidden('movie_id', $movie->id)}} 
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
                        <!-- <div class="form-group">
                          <div class="btn btn-success float-right">
                            記録
                          </div>
                        </div> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @else
              <div class="mt-3">
                <div class="btn btn-success mr-auto">
                  <i class="fas fa-check-square"></i>
                  <p class="d-none d-md-block float-right">鑑賞済み</p>
                </div>
              </div>
            @endif
            
            @if(!$watchList)
              <div class="mt-3">
                  <button data-movie-id="{{$movie->id}}" data-watchlist="false" id="watchlist_button" type="button" class="watchList btn btn-outline-success btn-xs">
                      <span id="watchlist_text">
                        <p class="my-auto">気になる</p>
                  </span>
                </button>
              </div>
            @else
              <div class="mt-3 text-center">
                <button data-movie-id="{{$movie->id}}" data-watchlist="ture" id="watchlist_button" type="button" class="watchList btn btn-outline-success btn-xs">
                  <span id="watchlist_text">
                    <p class="my-auto">ウォッチリストから解除する</p>
                  </span>
                </button>
              </div>
            @endif
          </div>
        </div>
        <!-- 　　<p class="d-none d-lg-block">夢を叶えたい人々が集まる街、ロサンゼルス。
               映画スタジオのカフェで働くミアは女優を目指していたが、何度オーディションを受けても落ちてばかり。
               ある日、ミアは場末の店で、あるピアニストの演奏に魅せられる。彼の名はセブ（セバスチャン）、いつか自分の店を持ち、大好きなジャズを思う存分演奏したいと願っていた。やがて二人は恋におち、互いの夢を応援し合う。
               しかし、セブが店の資金作りのために入ったバンドが成功したことから、二人の心はすれ違いはじめる・・・。(C)2017 Summit Entertainment, LLC. All Rights Reserved.
            </p> -->
      </div> 
    </div>
    @if($review)
    <div class="card w-100 mx-auto　mt-3">
      <table class="card-body w-100 table table-responsive">
        <thead>
        <tr>

          <th>名前</th>
          <th>評価</th>
          <th>コメント</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>{{$user->name}}</td>
          <td>{{$review->evaluate}}</td>
          <td>{{$review->content}}</td>
          <td>
            <i class="far fa-grin-beam"></i>
            <br>
            <i class="far fa-comment-dots"></i>
          </td>  
        </tr>
        </tbody>
      </table>
    </div>
    @endif 
  </div>

  
    <div class="row responsive mb-2 mx-auto mt-5">
      @if($casts)
        @foreach($casts as $cast)
          <div class="castList col-lg-2 col-sm-3 col-4">
            <a href="/actor/{{$cast->actor_id}}">
              <img src="/images/{{$cast->image_path}}" alt="" class="img-fluid mb-2">
              <p>{{$cast->title}}</p>
            </a>
          </div>
        @endforeach
      @endif
    </div>
      <!-- <div class="movieList responsive mx-0 carousel-item active">
        <div class="row">
          <div class="col-lg-2 col-sm-4 col-6">
            <a href="movie">
              <img src="/images/emma_LALALAND.jpg" alt="" class="img-fluid mb-2">
            </a>
          </div>
          <div class="col-lg-2 col-sm-4 col-6">
            <img src="/images/Begin again.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-lg-2 col-sm-4 col-6">
            <img src="/images/ENDGAME.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-lg-2 col-sm-4 col-6">
            <img src="/images/ROOM.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-lg-2 col-sm-4 col-6">
            <img src="/images/Help1.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-lg-2 col-sm-4 col-6">
            <img src="/images/Amazing Spidetman.jpg" alt="" class="img-fluid">
          </div>
        </div>
      </div> -->
      <!-- <div class="movieList responsive mx-0 carousel-item">
        <div class="row">
          <div class="col-lg-2 col-sm-4 col-6">
            <a href="movie">
              <img src="/images/emma_LALALAND.jpg" alt="" class="img-fluid mb-2">
            </a>
          </div>
          <div class="col-lg-2 col-sm-4 col-6">
            <img src="/images/Begin again.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-lg-2 col-sm-4 col-6">
            <img src="/images/ENDGAME.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-lg-2 col-sm-4 col-6">
            <img src="/images/ROOM.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-lg-2 col-sm-4 col-6">
            <img src="/images/Help1.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-lg-2 col-sm-4 col-6">
            <img src="/images/Amazing Spidetman.jpg" alt="" class="img-fluid">
          </div>
        </div> -->
        <!-- </div> -->
        
    @if($reviews)
  
    <div class="jumbotron review img-fluid w-100 center-block">
      
        <h1 class="text-white text-center">{{$movie->name}}</h1>
        @foreach($reviews as $review)
        <div class="text-center center-block container">
          <div class="text-left align-items-end">
            <div class="float-left rounded-circle reviewImages mr-2">
              @if($review->image_path)
                <img src="/images/{{$user->image_path}}" alt="">
              @else
                <i class="fas fa-user"></i>
              @endif
            </div>
            
            <div class="align-items-end">
              <a href="/user/{{$review->user_id}}">
                <p>{{$review->name}}<p>
              </a>
              <div class="text-left mt-3">
            {{$review->content}}
          </div>
            </div>
          </div>
          
          <div class="text-left">
            <i class="far fa-grin-beam float-left"></i>
            <div data-toggle="modal" data-target="#reviewcomment">
                <i class="fas fa-pen-fancy float-left"></i>
            </div>
            <div class="modal fade" id="reviewcomment"　tabindex="-1" role="dialog" 
            aria-labelledby="reviewCommentLabel" aria-hidden="true">
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
                        {{Form::hidden('movie_id', $movie->id)}} 
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
            <div data-toggle="modal" data-target="#reviewreply">
              <i class="far fa-comment-dots float-left"></i>
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
                          {{Form::hidden('movie_id', $movie->id)}} 
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
          </div>
        </div>
        <hr>
        @endforeach
      
    </div>
    
  @endif
<script type="text/javascript">
  $(function(){
    $('#watchlist_button').on('click', function() {
      var movie_id = $(this).data('movieId')
      // var actor_id = $('#actor_id').val();
      const watchList = $(this).data('watchlist')
      if (watchList == 'false') {
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
          $('.watchList').data('watchlist', 'true');
          $('#watchlist_text').text('ウォッチリスト解除');
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
          $('.watchList').data('watchlist', 'false');
          $('#watchlist_text').text('気になる');
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
