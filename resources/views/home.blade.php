@extends('layouts.app')

@section('content')
<div class="userTop jumbotron mt-4 mb-0">
      <div class="container-fluid">
        <div class="row">
          <div class="userimage col-3 mb-3">
            @if(isset($user->image_path))
              <img  class="img-fluid rounded-circle border border-success"  src="/images/{{$user->image_path}}" alt="">
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
            <div class="col-lg-1 col-3">
              <button tyoe="button" class="btn btn-outline-success"
              data-toggle="modal" data-target="#tweet">
                <i class="far fa-comment-dots"></i>
              </button>
              <div class="modal fade" id="tweet"　tabindex="-1" role="dialog" 
              aria-labelledby="tweetModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    {{-- <div class="modal-header bg-success">
                      <h5 class="modal-title"　id="tweetModalLabel">{{$actor->name}}についてコメント</h5>
                      <button class="close" data-dismiss="modal">
                        &times;
                      </button>
                    </div> --}}
                    <div class="modal-body">
                      <!-- <form action="form-group"> -->
                      {!! Form::open(['method'=>'POST', 'action'=> 'TweetController@store']) !!}

                      <div class="form-group">
                          {!! Form::textarea('content', null, ['class'=>'form-control']) !!} 
                          <!-- <label for="point">感想</label>
                          <textarea name="editor1" class="form-control"></textarea> -->
                      </div>
                      <div class="form-group">
                          {!! Form::submit('つぶやく', null, ['class'=>'btn btn-success']) !!}
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
            <div class="col">
              <a href={{route('users.edit', $user->id)}}>
                <button>
                  <p class="my-auto">編集</p>
                </button>
              </a>
            </div>
            @if(Auth::id() === 1)
              <div class="col">
                <div class="row-2">
                  <div class="btn-btn-success" data-toggle="modal" data-target='#movieupdate'>
                    <button>
                      <p class="my-auto">映画更新</p>
                    </button>
                  </div>
                  <div class="modal fade" id="movieupdate"  role="dialog" 
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-body">
                          {!! Form::open(['method'=>'POST', 'action'=> 'MovieUpdateController@update']) !!}
                          {{Form::number('start', null ,['min' => "1"])}}〜{{Form::number('end', null )}}
                          {!! Form::submit('映画更新', null, ['class'=>'success']) !!}
                          {!! Form::close() !!}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row-2">
                  <div class="btn-btn-success" data-toggle="modal" data-target='#actorupdate'>
                    <button>
                      <p class="my-auto">俳優更新</p>
                    </button>
                  </div>
                  <div class="modal fade" id="actorupdate"  role="dialog" 
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-body">
                          {!! Form::open(['method'=>'POST', 'action'=> 'ActorUpdateController@update']) !!}
                          {{Form::number('start', null ,['min' => "1"])}}〜{{Form::number('end', null )}}
                          {!! Form::submit('俳優更新', null, ['class'=>'success']) !!}
                          {!! Form::close() !!}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row-2">
                  <div class="btn-btn-success" data-toggle="modal" data-target='#castupdate'>
                    <button>
                      <p class="my-auto">キャスト更新</p>
                    </button>
                  </div>
                  <div class="modal fade" id="castupdate"  role="dialog" 
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-body">
                          {!! Form::open(['method'=>'POST', 'action'=> 'CastUpdateController@update']) !!}
                          {{Form::number('start', null ,['min' => "1"])}}〜{{Form::number('end', null )}}
                          {!! Form::submit('キャスト更新', null, ['class'=>'success']) !!}
                          {!! Form::close() !!}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endif
          
        </div>
      </div>  
  </div>


  <div class="usercontentList sticky-top border-bottom align-items-center">
    <div class="uservar pt-2">
      <div class="row container mx-auto responsive">
        <div class="mycontent1 col-md-2 col-4 text-center"date-toggle="collapse"
        data-target="#movieRoom">
          <h6>鑑賞映画</h6>
        </div>
        <div class="mycontent2 col-md-2 col-4 text-center"date-toggle="collapse"
        data-target="#reviewRoom">
          <h6>レビュー</h6>
        </div>
        <div class="mycontent3 col-md-2 col-4 text-center"date-toggle="collapse"
        data-target="#tweetRoom">
          <h6>ツイート</h6>
        </div>
        <div class="mycontent4 col-md-2 col-4 text-center"date-toggle="collapse"
        data-target="#actorRoom">
          <h6>お気に入り俳優</h6>
        </div>
        <div class="mycontent5 col-md-2 col-4 text-center"date-toggle="collapse"
        data-target="#watchlistRoom">
          <h6>ウォッチリスト</h6>
        </div>
        <div class="mycontent6 col-md-2 col-4 text-center"date-toggle="collapse"
        data-target="#top20Room">
          <h6>視聴TOP俳優</h6>
        </div>
      </div>
    </div>
  </div> 

  <div class="movieGenre"> 
    <div id="movieRoom" class="card collapse">
      <div class="genretList border-bottom align-items-center ">
        <div class="genrevar pt-2">
          <div class="row container mx-auto responsive">
            <div class="genre1 col-2 text-center"date-toggle="collapse"
            data-target="#all">
              <h6>全ジャンル</h6>
            </div>
            <div class="genre2 col-2 text-center"date-toggle="collapse"
            data-target="#action">
              <h6>アクション</h6>
            </div>
            <div class="genre3 col-2 text-center"date-toggle="collapse"
            data-target="#suspense">
              <h6>サスペンス</h6>
            </div>
            <div class="genre4 col-2 text-center"date-toggle="collapse"
            data-target="#drama">
              <h6>ドラマ</h6>
            </div>
            <div class="genre5 col-2 text-center"date-toggle="collapse"
            data-target="#comedy">
              <h6>コメディ</h6>
            </div>
            <div class="genre6 col-2 text-center"date-toggle="collapse"
            data-target="#horror">
              <h6>ホラー</h6>
            </div>
          </div>
        </div>
      </div>
      <div id="all" class="collapse">
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
      <div id="action" class="collapse">
        <div class="row responsive mb-2 container-fluid mx-auto mt-5">
            @if($action_movies)
              @foreach($action_movies as $action_movie)
                <div class="movieList col-lg-2 col-sm-3 col-4 float-right"
                data-toggle="modal" data-target="#moviediary">
                  <a href="/movie/{{$action_movie->movie_id}}">
                    <img src="http://image.tmdb.org/t/p/w500/{{$action_movie->image_path}}" alt="" class="img-fluid mb-2">
                    <p>{{$action_movie->title}}</p>
                  </a>
                </div>
              @endforeach
            @endif
        </div>
      </div> 
      <div id="suspense" class="collapse">
        <div class="row responsive mb-2 container-fluid mx-auto mt-5">
            @if($suspense_movies)
              @foreach($suspense_movies as $suspense_movie)
                <div class="movieList col-lg-2 col-sm-3 col-4 float-right"
                data-toggle="modal" data-target="#moviediary">
                  <a href="/movie/{{$suspense_movie->movie_id}}">
                    <img src="http://image.tmdb.org/t/p/w500/{{$suspense_movie->image_path}}" alt="" class="img-fluid mb-2">
                    <p>{{$suspense_movie->title}}</p>
                  </a>
                </div>
              @endforeach
            @endif
        </div>
      </div> 
      <div id="drama" class="collapse">
        <div class="row responsive mb-2 container-fluid mx-auto mt-5">
            @if($drama_movies)
              @foreach($drama_movies as $drama_movie)
                <div class="movieList col-lg-2 col-sm-3 col-4 float-right"
                data-toggle="modal" data-target="#moviediary">
                  <a href="/movie/{{$drama_movie->movie_id}}">
                    <img src="http://image.tmdb.org/t/p/w500/{{$drama_movie->image_path}}" alt="" class="img-fluid mb-2">
                    <p>{{$drama_movie->title}}</p>
                  </a>
                </div>
              @endforeach
            @endif
        </div>
      </div> 
      <div id="comedy" class="collapse show">
        <div class="row responsive mb-2 container-fluid mx-auto mt-5">
            @if($comedy_movies)
              @foreach($comedy_movies as $comedy_movie)
                <div class="movieList col-lg-2 col-sm-3 col-4 float-right"
                data-toggle="modal" data-target="#moviediary">
                  <a href="/movie/{{$comedy_movie->movie_id}}">
                    <img src="http://image.tmdb.org/t/p/w500/{{$comedy_movie->image_path}}" alt="" class="img-fluid mb-2">
                    <p>{{$comedy_movie->title}}</p>
                  </a>
                </div>
              @endforeach
            @endif
        </div>
      </div> 
      <div id="horror" class="collapse">
        <div class="row responsive mb-2 container-fluid mx-auto mt-5">
            @if($horror_movies)
              @foreach($horror_movies as $horror_movie)
                <div class="movieList col-lg-2 col-sm-3 col-4 float-right"
                data-toggle="modal" data-target="#moviediary">
                  <a href="/movie/{{$horror_movie->movie_id}}">
                    <img src="http://image.tmdb.org/t/p/w500/{{$horror_movie->image_path}}" alt="" class="img-fluid mb-2">
                    <p>{{$horror_movie->title}}</p>
                  </a>
                </div>
              @endforeach
            @endif
        </div>
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
    <div id="tweetRoom" class="card collapse">
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
      <div id="reviews" class="collapse">
        <div class="responsive mb-2 mx-auto mt-5">
          @if($follow_reviews)
            <div class="review center-block">
              <div class="container">
                @foreach($follow_reviews as $follow_review)
                  <div class="card border-success mb-3" >
                    <div class="card-header d-inline py-0">
                      <div class="row no-gutters mt-1">
                        {{-- <div class="col-1 rounded-circle postImages mr-2　d-inline-block">
                        </div> --}}
                        <div class="col-6 d-inline-block rounded-circle postImages mr-2">
                          <a href="/user/{{$follow_review->user_id}}">
                            <p class="mt-2 mb-2">
                              @if($user->image_path)
                              <img src="/images/{{$follow_review->image_path}}" alt="" class="">
                              @else
                              <i class="fas fa-user"></i>
                              @endif
                              {{$follow_review->name}}
                            </p>
                          </a>
                        </div>
                        <div class="col-1 float-right">
                          <div data-toggle="modal" data-target="#reviewreply">
                            <i class="far fa-comment-dots float-left mt-2"></i>
                            {{-- @if(isset($review->review_id))
                            <a href="/review/comment/{{$review->id}}">
                              <p>{{count($review->review_id)}}</p>
                            </a>
                            @endif --}}
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
                    </div>
                    <div class="card-body pt-3">
                      <div class="mb-0">
                      @if(isset($follow_review->evaluate))
                        <p class="mb-0">評価：{{$follow_review->evaluate}}</p>
                      @endif
                      {{$follow_review->title}}
                      </div>
                      <hr class="mt-1">
                      @if(isset($follow_review->content))
                        <p class="mb-0">{{$follow_review->content}}</p>
                      @endif
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          @endif
        </div>  
      </div> 
      <div id="posts" class="collapse">
        <div class="responsive mb-2 mx-auto mt-5">
          @if($follow_posts)
            <div class="posts center-block">
              <div class="container">
                @foreach($follow_posts as $follow_post)
                  <div class="card border-success mb-3" >
                    <div class="card-header d-inline py-0">
                      <div class="row no-gutters mt-1">
                        {{-- <div class="col-1 rounded-circle postImages mr-2　d-inline-block">
                        </div> --}}
                        <div class="col-6 d-inline-block rounded-circle postImages mr-2">
                          <a href="/user/{{$follow_post->user_id}}">
                            <p class="mt-2 mb-2">
                              @if($user->image_path)
                              <img src="/images/{{$follow_post->image_path}}" alt="" class="">
                              @else
                              <i class="fas fa-user"></i>
                              @endif
                              {{$follow_post->name}}
                            </p>
                          </a>
                        </div>
                        <div class="col-1 float-right">
                            <div data-toggle="modal" data-target="#postreply">
                              <i class="far fa-comment-dots float-left mt-2"></i>
                              {{-- @if(isset($review->review_id))
                              <a href="/review/comment/{{$review->id}}">
                                <p>{{count($review->review_id)}}</p>
                              </a>
                              @endif --}}
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
                          </div>
                      </div>
                    </div>
                    <div class="card-body pt-3">
                      <div class="mb-0">
                        <a href="/actor/{{$follow_post->tmdb_id}}">
                          <p class="mt-2 mb-2">
                            {{-- @if($follow_post->actors->image_path)
                            <img src="/images/{{$follow_post->actors->image_path}}" alt="" class="">
                            @else
                            <i class="fas fa-user"></i>
                            @endif --}}
                            {{$follow_post->name}}
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
      <div id="tweets" class="collapse">
        <div class="responsive mb-2 mx-auto mt-5">
          @if($follow_tweets)
            <div class="tweets center-block">
              <div class="container">
                @foreach($follow_tweets as $follow_tweet)
                  <div class="card border-success mb-3" >
                    <div class="card-header d-inline py-0">
                      <div class="row no-gutters mt-1">
                        {{-- <div class="col-1 rounded-circle postImages mr-2　d-inline-block">
                        </div> --}}
                        <div class="col-6 d-inline-block rounded-circle postImages mr-2">
                          <a href="/user/{{$follow_tweet->user_id}}">
                            <p class="mt-2 mb-2">
                              @if($user->image_path)
                              <img src="/images/{{$follow_tweet->image_path}}" alt="" class="">
                              @else
                              <i class="fas fa-user"></i>
                              @endif
                              {{$follow_tweet->name}}
                            </p>
                          </a>
                        </div>
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
      <div id="tweets" class="collapse">
        <div class="row responsive mb-2 container-fluid mx-auto mt-5">
            @if($follow_tweets)
              @foreach($follow_tweets as $follow_tweet)
                <div class="movieList col-lg-2 col-sm-3 col-4 float-right"
                data-toggle="modal" data-target="#moviediary">
                  <a href="/movie/{{$follow_tweet->movie_id}}">
                    <img src="http://image.tmdb.org/t/p/w500/{{$follow_tweet->image_path}}" alt="" class="img-fluid mb-2">
                    <p>{{$follow_tweet->title}}</p>
                  </a>
                </div>
              @endforeach
            @endif
        </div>
      </div> 
    </div>
    {{-- <div id="twieetRoom" class="collapse">
      <div class="responsive mb-2 mx-auto mt-5">
        @if($tweets)
          <div class="tweet img-fluid  center-block">
            <div class="container">
              @foreach($tweets as $tweet)
                <div class="card border-success mb-3" >
                  <div class="card-header d-inline py-0">
                    <div class="row no-gutters mt-1">
                      <div class="col-1 rounded-circle postImages mr-2 d-inline-block">
                        @if($tweet->image_path)
                          <img src="http://image.tmdb.org/t/p/w500/{{$tweet->image_path}}" alt="" class="mt-2 float-right">
                        @else
                          <i class="fas fa-user mt-2 float-right"></i>
                        @endif
                      </div>
                      <div class="col-5 float-left d-inline-block">
                        <a href="/movie/{{$tweet->follow_id}}">
                          <p class="ml-1 mt-1 py-0">{{$tweet->name}}<p>
                        </a>
                      </div>
                        {{-- <div class="col-1 float-right">
                          <div data-toggle="modal" data-target="#tweetreply">
                            <i class="far fa-comment-dots float-left mt-2"></i>
                          </div>
                          <div class="modal fade" id="tweetreply"　tabindex="-1" role="dialog" 
                          aria-labelledby="tweetReplyLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header bg-success">
                                  <button class="close" data-dismiss="modal">
                                    &times;
                                  </button>
                                </div>
                                <div class="modal-body">
                                    {!! Form::open(['method'=>'tweet', 'action'=> 'tweetController@store']) !!}
                                    <div class="form-group">
                                        {!! Form::label('content', '') !!}
                                        {!! Form::textarea('content', null, ['class'=>'form-control']) !!} 
                                    </div>
                                    <div class="form-group">
                                        {{Form::hidden('actor_id', $actor->id)}} 
                                    </div>
                                    <div class="form-group">
                                        {{Form::hidden('tweet_id', $tweet->id)}} 
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
                    {{-- </div>
                  </div>
                  <div class="card-body">
                      {{$tweet->content}}
                      
                  </div>
                </div>
              @endforeach
            </div>
          @endif
        </div>
      </div>
    </div> --}} 
    </div>
    <div id="actorRoom" class="collapse">
      <div class="myactorList row responsive mb-2 container mx-auto mt-5">
          @if($favorite_actors)
            @foreach($favorite_actors as $favorite_actor)
              <div id="favoriteActor" class="favoriteActor col-lg-2 col-sm-3 col-4">
                <a href="/actor/{{$favorite_actor->actor_id}}">
                  <img src="http://image.tmdb.org/t/p/w500/{{$favorite_actor->image_path}}" alt="" class="img-fluid mb-2">
                  @if($favorite_actor->new == 1)
                    <div class="badge p-0">
                      <p>New</p>
                    </div>
                  @endif
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
    $('#tweetRoom').removeClass('show');
    $('#actorRoom').removeClass('show');
    $('#watchlistRoom').removeClass('show');
  });
  $('.mycontent2').click(function () {
    $('#reviewRoom').addClass('show');
    $('#movieRoom').removeClass('show');
    $('#tweetRoom').removeClass('show');
    $('#actorRoom').removeClass('show');
    $('#watchlistRoom').removeClass('show');
  });
  $('.mycontent3').click(function () {
    $('#tweetRoom').addClass('show');
    $('#movieRoom').removeClass('show');
    $('#reviewRoom').removeClass('show');
    $('#actorRoom').removeClass('show');
    $('#watchlistRoom').removeClass('show');
  });
  $('.mycontent4').click(function () {
    $('#actorRoom').addClass('show');
    $('#movieRoom').removeClass('show');
    $('#reviewRoom').removeClass('show');
    $('#tweetRoom').removeClass('show');
    $('#watchlistRoom').removeClass('show');
  });
  $('.mycontent5').click(function () {
    $('#watchlistRoom').addClass('show');
    $('#movieRoom').removeClass('show');
    $('#reviewRoom').removeClass('show');
    $('#tweetRoom').removeClass('show');
    $('#actorRoom').removeClass('show');
  });</script>
  <script>
    $('.genre1').click(function () {
    $('#all').addClass('show');
    $('#action').removeClass('show');
    $('#suspense').removeClass('show');
    $('#drama').removeClass('show');
    $('#comdey').removeClass('show');
    $('#horror').removeClass('show');
  });
  $('.genre2').click(function () {
    $('#action').addClass('show');
    $('#all').removeClass('show');
    $('#suspense').removeClass('show');
    $('#drama').removeClass('show');
    $('#comdey').removeClass('show');
    $('#horror').removeClass('show');
  });
  $('.genre3').click(function () {
    $('#suspense').addClass('show');
    $('#all').removeClass('show');
    $('#action').removeClass('show');
    $('#drama').removeClass('show');
    $('#comdey').removeClass('show');
    $('#horror').removeClass('show');
  });
  $('.genre4').click(function () {
    $('#drama').addClass('show');
    $('#all').removeClass('show');
    $('#action').removeClass('show');
    $('#suspense').removeClass('show');
    $('#comdey').removeClass('show');
    $('#horror').removeClass('show');
  });
  $('.genre5').click(function () {
    $('#comdey').addClass('show');
    $('#all').removeClass('show');
    $('#action').removeClass('show');
    $('#suspense').removeClass('show');
    $('#drama').removeClass('show');
    $('#horror').removeClass('show');
  });
  $('.genre6').click(function () {
    $('#horror').addClass('show');
    $('#all').removeClass('show');
    $('#action').removeClass('show');
    $('#suspense').removeClass('show');
    $('#drama').removeClass('show');
    $('#comedy').removeClass('show');
  });</script>
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
          if (follow == 'false') {
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
            if (response['result']) {
              alert('フォローしました！');
              $('.follow').data('follow', 'true');
              // $('#follow_text').text('');
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
              $('.follow').data('follow', 'false');
              // $('#follow_text').text('気になる');
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