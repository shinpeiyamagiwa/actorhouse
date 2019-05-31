
@extends('layouts.app')

@section('content')
    <!-- 俳優プロフィール -->
  <div class="actorTop jumbotron mt-5">
    <div class="container">
      <div class="row">
        <div class="actorimage col-sm-4 ">
          <img  class="center img-fluid responsive" src="/images/{{$actor->image_path}}" alt="">
        </div>
        
        <div class="actorprofile col-sm-8 mx-auto">
          <div class="actorName">
            <h1>{{$actor->name}} </h1>
          </div>
          <div class="col row float-left">
            <div class="col-sm-4">
              <h6 class="mb-0">お気に入り登録者数</h6>
            </div>
            <div class="col-sm-4">
              <h6 class="mb-0">出演作品数</h6>
            </div>
          </div>
          <div class="col row">
            <div class="col-sm-4">
                <h1 class="float-right">{{count($fun_member)}}</h1>
            </div>
            <div class="col-sm-3">
              <h1 class="float-right">{{count($fun_member)}}</h1>
            </div>
            <div class="col-sm-1 mr-1">
              @if(!$favorite_actors)
                <button data-actor-id="{{$actor->id}}" data-favorite="false" id="favorite_button" type="button" class="registButton btn btn-outline-success btn-xs">
                  <span id="regist_text">
                      <i class="far fa-heart"></i>
                  </span>
                </button>
              @else
                <button data-actor-id="{{$actor->id}}" data-favorite="true" id="favorite_button" type="button" class="registButton btn btn-outline-success btn-xs">
                  <span id="regist_text">
                      <i class="far fa-heart"></i>
                  </span>
                </button>
              @endif
            </div>
            <div class="col-sm-1 mr-1">
                <button tyoe="button" class="btn btn-outline-success"
                data-toggle="modal" data-target="#moviediary">
                  <i class="far fa-edit"></i>
                </button>
                <div class="modal fade" id="moviediary"　tabindex="-1" role="dialog" 
                aria-labelledby="actorModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header bg-success">
                        <h5 class="modal-title"　id="actorModalLabel">{{$actor->name}}についてコメント</h5>
                        <button class="close" data-dismiss="modal">
                          &times;
                        </button>
                      </div>
                      <div class="modal-body">
                        <!-- <form action="form-group"> -->
                        {!! Form::open(['method'=>'POST', 'action'=> 'PostController@store']) !!}
                        <!-- <label for="point">評価</label>
                        <input type="text" placeholder="評価0~5.0"
                        class="form-control"> -->
                        <!-- <div class="form-group">
                          <label for="point">鑑賞日</label>
                          <input type="date" name="date"　class="form-control">
                          {!! Form::label('period', '日付:') !!}
                          {{Form::selectRange('from_year', 1960, 2019, '', ['placeholder' => ''])}}年
                          {{Form::selectRange('from_month', 1, 12, '', ['placeholder' => ''])}}月
                          {{Form::selectRange('from_day', 1, 31, '', ['placeholder' => ''])}}日
                        </div> -->
                        <div class="form-group">
                            {!! Form::label('image_path', 'タイトル：') !!}
                            {!! Form::text('image_path', null, ['class'=>'form-control']) !!} 
                        </div>
                        <div class="form-group">
                            {!! Form::label('content', '感想：') !!}
                            {!! Form::textarea('content', null, ['class'=>'form-control']) !!} 
                            <!-- <label for="point">感想</label>
                            <textarea name="editor1" class="form-control"></textarea> -->
                        </div>
                        <div class="form-group">
                            {{Form::hidden('actor_id', $actor->id)}} 
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
            <div class="col-1 mr-1">
              <button class="btn btn-outline-success btn-xs">
                <i class="fab fa-wikipedia-w"></i>
              </button>
            </div>
            <div class="col-1">
              <button class="btn btn-outline-success btn-xs">
                  <i class="far fa-id-card"></i>
              </button>
            </div>
          </div>
          <div class="col">
            <p>
              ライアン・トーマス・ゴズリング（英: Ryan Thomas Gosling、1980年11月12日 - ）[2]は、カナダの俳優・ミュージシャンである。ディズニー・チャンネルで放送された『ミッキーマウス・クラブ』（1993年 - 1995年）で子役としてキャリアを開始させ、『アー・ユー・アフレイド・オブ・ザ・ダーク?』（1995年）や『ミステリー・グースバンプス』（1996年）など子ども向け娯楽番組にいくつか出演した。映画初主演作はユダヤ人のネオナチを演じた『ザ・ビリーヴァー（英語版）』（2001年）で、その後も『完全犯罪クラブ』（2002年）・『スローター・ルール（英語版）』（2002年）・『16歳の合衆国』（2003年）など、自主映画数本に出演した。
            </p>
          </div>
          <div class="col row">
            <div class="col-5">
              生年月日	{{$actor->birthday}}
            </div>
            <div class="col-5">
              出生地	{{$actor->place}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  
  <div class="row responsive mb-2 mx-auto mt-5">
    @if($works)
      @foreach($works as $work)
        <div class="movieList col-lg-2 col-sm-3 col-4">
          <a href="/movie/{{$work->movie_id}}">
            <img src="/images/{{$work->image_path}}" alt="" class="img-fluid mb-2">
            <p>{{$work->title}}</p>
          </a>
        </div>
      @endforeach
    @endif
  </div>
  <div class="actorcontentList sticky-top border-bottom align-items-center">
    <div class="row container mx-auto responsive">
      <div class="mycontent1 col-3 text-center"date-toggle="collapse"
      data-target="#twieetRoom">
        <h6>Twitter</h6>
      </div>
      <div class="mycontent2 col-3 text-center"date-toggle="collapse"
      data-target="#movieRoom">
        <h6>トーク</h6>
      </div>
      <div class="mycontent3 col-3 text-center"date-toggle="collapse"
      data-target="#actroRoom">
        <h6>写真</h6>
      </div>
      <div class="mycontent4 col-3 text-center"date-toggle="collapse"
      data-target="#watchlistRoom">
        <h6>動画</h6>
      </div>
    </div>
  </div>   
  <div class="actorcontent"> 
      <div id="twieetRoom" class="card collapse">
        <a class="twitter-timeline" href="https://twitter.com/dailyemmastone?ref_src=twsrc%5Etfw" data-width=80% data-height="1000">Tweets by dailyemmastone</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
      </div>
      <div id="movieRoom" class="card collapse">
          @if($posts)
  
          <div class="jumbotron post img-fluid w-100 center-block">
            
              <h1 class="text-white text-center">{{$actor->name}}</h1>
              @foreach($posts as $post)
              <div class="text-center center-block container">
                <div class="text-left align-items-end">
                  <div class="float-left rounded-circle postImages mr-2">
                    @if($user->image_path)
                      <img src="/images/{{$user->image_path}}" alt="">
                    @else
                      <i class="fas fa-user"></i>
                    @endif
                  </div>
                  <div class="align-items-end">
                    <a href="/user/{{$post->user_id}}">
                      <p>{{$post->name}}<p>
                    </a>
                    </div>
                </div>
                <div class="text-left">
                  {{$post->content}}
                </div>
                <div class="text-left">
                  <i class="far fa-grin-beam"></i>
                  <div data-toggle="modal" data-target="#postcomment">
                    <i class="far fa-comment-dots"></i>
                  </div>
                  <div class="modal fade" id="postcomment"　tabindex="-1" role="dialog" 
                  aria-labelledby="postCommentLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header bg-success">
                          <button class="close" data-dismiss="modal">
                            &times;
                          </button>
                        </div>
                        <div class="modal-body">
                          {!! Form::open(['method'=>'POST', 'action'=> 'PostController@store']) !!}
                          <div class="form-group">
                              {!! Form::label('content', '') !!}
                              {!! Form::textarea('content', null, ['class'=>'form-control']) !!} 
                          </div>
                          <div class="form-group">
                              {{Form::hidden('actor_id', $actor->id)}} 
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
      </div>
      <div id="actorRoom" class="card collapse">
        <div class="row responsive mb-2 container mx-auto mt-5">
        
        </div>
      </div>      
      <div id="watchlistRoom" class="card collapse show">
        <div class="row responsive mb-2 container mx-auto mt-5">
            <iframe width=100% height=500px src="https://www.youtube.com/embed/{{$actor->video_link}}" frameborder="0" 
              allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>    
        </div>
      </div>
    </div>      
         

<!-- 俳優出演作品 -->

 



<script type="text/javascript">
  $(function(){
    $('#favorite_button').on('click', function() {
      var actor_id = $(this).data('actorId')

      const is_favorite = $(this).data('favorite');
      console.log('is_favorite: ', is_favorite);
      if (is_favorite == 'false') {
        // 登録処理
        $.ajax({
          type: "POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: 'https://actorhouse.test/favorite/actor/store',
          dataType: "json",
          data: {actor_id : actor_id}
        }).done(function (response) {
          // 通信成功時の処理
          if (response['result']) {
            alert('登録する');
            // data属性を書き換える
            // $('.registButton')[0].dataset.favorite = 'true';
            $('.registButton').data('favorite', 'true');
            // ボタンの表記を書き換える
            $('#regist_text').text('登録解除');
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
          url: 'https://actorhouse.test/favorite/actor/delete',
          dataType: "json",
          data: {actor_id : actor_id}
        }).done(function (response) {
          // 通信成功時の処理
          if (response['result']) {
            alert('登録解除');
            // $('.registButton')[0].dataset.favorite = 'false';
            $('.registButton').data('favorite', 'false');
            $('#regist_text').text('登録する');
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