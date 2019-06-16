
@extends('layouts.app')

@section('content')
    <!-- 俳優プロフィール -->
  <div class="actorTop jumbotron mt-4 mb-0"
  @isset($bg_image)
  style="background-image:url('http://image.tmdb.org/t/p/w500/{{$bg_image->image_path}}');
  background-repeat:no-repeat;
  background-size:cover;
  object-fit: cover;
  color:white;
  "
  @endisset>
    <div class="bg"></div>
    <div class="container-fluid">
      <div class="row">
        <div class="actorimage col-sm-4 mt-4">
          <img  class="center img-fluid responsive float-md-right" src="http://image.tmdb.org/t/p/w500/{{$actor->image_path}}" alt="">
        </div>
        <div class="actorprofile col-sm-8 mx-auto mt-4">
          <div class="actorName">
            <h1>{{$actor->name}} </h1>
          </div>
          <div class="col row float-left">
            <div class="col-4">
              <h6 class="mb-0">登録者数</h6>
            </div>
            <div class="col-4">
              <h6 class="mb-0">出演作品数</h6>
            </div>
            <div class="col-4">
              <h6 class="mb-0">鑑賞数</h6>
            </div>
          </div>
          <div class="col row">
            <div class="col-4">
                <h1 class="float-right">{{count($fun_member)}}</h1>
            </div>
            <div class="col-4">
              <h1 class="float-right">{{count($works)}}</h1>
            </div>
            @if(isset($watch_movie))
              <div class="col-4">
                <h1 class="float-right">{{count($watch_movie)}}/{{count($works)}}</h1>
              </div>
            @endif
            </div>
            <div class="row">
            <div class="col-2">
              @if(!$favorite_actors)
                <button data-actor-id="{{$actor->tmdb_id}}" data-favorite="false" id="favorite_button" type="button" class="registButton btn btn-outline-success btn-xs">
                  <span id="regist_text">
                    <i class="fas fa-user-plus"></i>
                  </span>
                </button>
              @else
                <button data-actor-id="{{$actor->tmdb_id}}" data-favorite="true" id="favorite_button" type="button" class="registButton btn btn-outline-success btn-xs">
                  <span id="regist_text">
                      <i class="far fa-heart"></i>
                  </span>
                </button>
              @endif
            </div>
            <div class="col-2">
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
                          {{Form::hidden('actor_id', $actor->tmdb_id)}} 
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
            @if(!is_null($actor->homepage))
              <div class="col-2">
                <button class="btn btn-outline-success btn-xs">
                  <a href={{$actor->homepage}}>
                    <i class="far fa-id-card"></i>
                  </a>
                </button>
              </div>
            @endif
          </div>
          <div class="col introduction d-none d-md-inline">
            {{-- <p>
              ライアン・トーマス・ゴズリング（英: Ryan Thomas Gosling、1980年11月12日 - ）[2]は、カナダの俳優・ミュージシャンである。ディズニー・チャンネルで放送された『ミッキーマウス・クラブ』（1993年 - 1995年）で子役としてキャリアを開始させ、『アー・ユー・アフレイド・オブ・ザ・ダーク?』（1995年）や『ミステリー・グースバンプス』（1996年）など子ども向け娯楽番組にいくつか出演した。映画初主演作はユダヤ人のネオナチを演じた『ザ・ビリーヴァー（英語版）』（2001年）で、その後も『完全犯罪クラブ』（2002年）・『スローター・ルール（英語版）』（2002年）・『16歳の合衆国』（2003年）など、自主映画数本に出演した。
            </p> --}}
          </div>
          <div class="col row">
            <div class="col-md-5 col-6 d-none d-md-inline">
              <h6>
                生年月日	
              <br>{{$actor->birthday}}
              </h6>
            </div>
            <div class="col-md-5 col-6 d-none d-md-inline">
              <h6>
                出生地	
              <br>{{$actor->place}}
              </h6>
            </div>
          </div>
          @if($userId === 1)
          <div class="col">
            <a href={{route('actors.edit', $user->id)}}>
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

  
  
  
  <div class="actorcontentList sticky-top border-bottom align-items-center pt-2">
    <div class="row container mx-auto responsive">
      <div class="mycontent3 col-3 text-center"date-toggle="collapse"
      data-target="#workRoom">
        <h6>出演作品</h6>
      </div>
      <div class="mycontent1 col-3 text-center"date-toggle="collapse"
      data-target="#twieetRoom">
        <h6>写真</h6>
      </div>
      <div class="mycontent4 col-3 text-center"date-toggle="collapse"
      data-target="#videoRoom">
        <h6>動画</h6>
      </div>
      <div class="mycontent2 col-3 text-center"date-toggle="collapse"
      data-target="#talkRoom">
        <h6>トークルーム</h6>
      </div>
    </div>
  </div>   
  <div class="actorcontent"> 
    <div id="twieetRoom" class="card collapse">
      <h5>{{$actor->name}}のアルバムを作ろう</h5>
        {!! Form::model($actor,['method'=>'PATCH', 'action'=> ['ActorController@update', $actor->tmdb_id]]) !!}
          <div class="form-group">
              {!! Form::label('image_path', 'Image:') !!}
              {!! Form::file('image_path', null, ['class'=>'form-control']) !!}
          </div> 
          <div class="form-group">
              {{Form::hidden('user_id', $user->id)}} 
          </div>
          <div class="form-group">
              {{Form::hidden('actor_id', $actor->tmdb_id)}} 
          </div>
          <div class="form-group">
            {!! Form::submit('アップロード', null, ['class'=>'btn btn-primary']) !!}
          </div>
        {!! Form::close() !!}
        @include('includes.form_error')
        <div class="row responsive mb-2 mx-0 mt-5">
          @if($images)
            @foreach($images as $image)
              <div class="movieList col-lg-2 col-sm-3 col-4">
                  <img src="/images/{{$image->image_path}}" alt="" class="img-fluid mb-2">
              </div>
              @if($image->user_id==$userId OR $userId==1)
              {!! Form::open(['method'=>'POST', 'action'=> 'ActorController@delete']) !!}
              {{Form::hidden('actor_id', $actor->tmdb_id)}} 
              {{Form::hidden('id', $image->id)}} 
              {!! Form::submit('削除', null, ['class'=>'btn btn-primary']) !!}
              {!! Form::close() !!}
                {{-- <a href="/actor/images/delete">
                  <button>
                    <p>削除</p>
                  </button>
                </a> --}}
              @endif
            @endforeach
          @endif
        </div>
    </div>
    <div id="talkRoom" class="collapse">
      <div class="responsive mb-2 mt-5">
        @if($posts)
          <div class="post img-fluid center-block">
            <div class="container">
                @foreach($posts as $post)
              <div class="card border-success mb-3" >
                <div class="card-header d-inline py-0">
                  <div class="row no-gutters mt-1">
                    <div class="col-1 rounded-circle postImages mr-2 d-inline-block">
                      @if($user->image_path)
                        <img src="/images/{{$user->image_path}}" alt="" class="mt-2 float-right">
                      @else
                        <i class="fas fa-user mt-2 float-right"></i>
                      @endif
                    </div>
                    <div class="col-5 float-left d-inline-block">
                      <a href="/user/{{$post->user_id}}">
                        <p class="ml-1 mt-1 py-0">{{$post->name}}<p>
                      </a>
                    </div>
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
                                {!! Form::open(['method'=>'post', 'action'=> 'PostController@store']) !!}
                                <div class="form-group">
                                    {!! Form::label('content', '') !!}
                                    {!! Form::textarea('content', null, ['class'=>'form-control']) !!} 
                                </div>
                                <div class="form-group">
                                    {{Form::hidden('actor_id', $actor->id)}} 
                                </div>
                                <div class="form-group">
                                    {{Form::hidden('post_id', $post->id)}} 
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
                    {{$post->content}}
                </div>
              </div>
              <hr>
            @endforeach
          </div>
        @endif
      </div>
    </div>      
  </div> 
  <div id="workRoom" class="card collapse">
    <div class="row responsive mb-2 mx-0 mt-5">
      @if($works)
        @foreach($works as $work)
          <div class="movieList col-lg-2 col-sm-3 col-4">
            <a href="/movie/{{$work->movie_id}}">
              <img src="http://image.tmdb.org/t/p/w500/{{$work->image_path}}" alt="" class="img-fluid mb-2">
              <p>{{$work->title}}</p>
            </a>
          </div>
        @endforeach
      @endif
    </div>
  </div>      
  <div id="videoRoom" class="card collapse show">
    <div class="row responsive mb-2 container mx-auto mt-5">
      <iframe class="video" width=100% src="https://www.youtube.com/embed/{{$actor->video_link}}" frameborder="0" 
        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>    
    </div>
  </div>
</div>      
         

<!-- 俳優出演作品 -->

<script>
    $('.mycontent1').click(function () {
    $('#twieetRoom').addClass('show');
    $('#talkRoom').removeClass('show');
    $('#workRoom').removeClass('show');
    $('#videoRoom').removeClass('show');
  });
  $('.mycontent2').click(function () {
    $('#talkRoom').addClass('show');
    $('#twieetRoom').removeClass('show');
    $('#workRoom').removeClass('show');
    $('#videoRoom').removeClass('show');
  });
  $('.mycontent3').click(function () {
    $('#workRoom').addClass('show');
    $('#talkRoom').removeClass('show');
    $('#twieetRoom').removeClass('show');
    $('#videoRoom').removeClass('show');
  });
  $('.mycontent4').click(function () {
    $('#videoRoom').addClass('show');
    $('#talkRoom').removeClass('show');
    $('#workRoom').removeClass('show');
    $('#twieetRoom').removeClass('show');
  });</script>



<script type="text/javascript">
  $(function(){
    $('#favorite_button').on('click', function() {
      var actor_id = $(this).data('actorId')

      const is_favorite = $(this).data('favorite');
      console.log('is_favorite: ', is_favorite);
      if (is_favorite == false) {
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
            $('.registButton').data('favorite', true);
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
            $('.registButton').data('favorite', false);
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