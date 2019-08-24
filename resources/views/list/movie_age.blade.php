@extends('layouts.app')

@section('content')

{{-- <div class="jumbotron mt-4 pb-1">
    {!! Form::open(['method'=>'POST', 'action'=> 'ListMovieAgeController@index']) !!}
    <div class="form-group">
      {!! Form::label('age', '公開年：') !!}
      {{Form::selectRange('age', 1970, 2020, '', ['placeholder' => ''])}}
      {!! Form::button('検索',['class'=>'btn btn-sm btn-light']) !!}
    </div>
      {!! Form::close() !!}
</div> --}}


<div id="SearchList" class="card collapse show mt-4 pt-4">
  <div class="card-body row responsive mt-4 mx-auto">
    @if($movies)
      @foreach($movies as $movie)
        <div class="movieList col-lg-2 col-sm-3 col-4">
          <a href="/movie/{{$movie->tmdb_id}}">
            <img src="http://image.tmdb.org/t/p/w500/{{$movie->image_path}}" alt="" class="img-fluid mb-2">
          </a>
          <div class="mt-0">
            @if(in_array($movie->tmdb_id, $watch_movie_ids))
              <button class="btn review">
                <p class="my-auto"><i class="far fa-check-circle check"></i></p>
              </button>
            @else
              <button class="btn review" 
              data-toggle="modal" data-target="#moviereview" data-toggle="popover" data-content="記録をつける" data-movie-id="{{$movie->tmdb_id}}">
                <p class="my-auto"><i class="fas fa-book reviwBook"></i></p>
              </button>
              
              @if(in_array($movie->tmdb_id, $watch_list_ids))
                <button data-movie-id="{{$movie->tmdb_id}}" data-watchlist="ture" id="watchlist_button" type="button" class="btn watchlist"
                  data-toggle="popover" data-content="ウォッチリストから削除">
                  <span id="watchlist_text">
                    <p class="my-auto"><i class="far fa-check-circle check watchlistIcon"></i></p>
                  </span>
                </button>
              @else
                <button data-movie-id="{{$movie->tmdb_id}}" data-watchlist="false" id="watchlist_button" type="button" class="watchlist btn"
                  data-toggle="popover" data-content="ウォッチリストに追加">
                  <span id="watchlist_text">
                    <p class="my-auto"><i class="fas fa-tag watchlistIcon"></i></p>
                  </span>
                </button>
              @endif
            @endif
            <br>
          </div> 
        </div>
      @endforeach
    @endif
  </div>
</div>
<div class="modal fade" id="moviereview" tabindex="-1" role="dialog" 
              aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-body text-dark">
          {!! Form::open(['method'=>'POST', 'action'=> 'ReviewController@evaluate']) !!}
          <div class="form-group mb-0 mt-2">
              <i class="fas fa-star"></i>
            {!! Form::label('evaluate', '評価') !!}
            {{Form::range('evaluate', '3',['id'=>'range', 'min'=>0,'max'=>5.0, 'step'=>0.1])}}<span id="value" class="mx-3">3</span>
            {!! Form::button('記録', array(
              'type' => 'submit',
              'class'=> 'submit btn-sm',
      )) !!}

          </div>
          <div class="form-group">
            {{Form::hidden('movie_id', '',['id'=>'modalMovieId'])}} 
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
  <script type="text/javascript">
    $(function(){
      $('.review').on('click', function(){
        $('#modalMovieId').val($(this).data('movieId'))
      });
    });
  </script>
{{-- ウォッチリスト追加 --}}
<script type="text/javascript">
  $(function(){
    $('.watchlist').on('click', function() {
      var movie_id = $(this).data('movieId')
      // var actor_id = $('#actor_id').val();
      const watchList = $(this).data('watchlist')
      console.log(watchList == false)
      console.log(movie_id)
      if (watchList == false) {
      $.ajax({
        type: "POST",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{url('/watchlist/movie/store')}}",
        dataType: "json",
        data: {movie_id : movie_id}
      }).done(response => {
        // 通信成功時の処理
        if (response['result']) {
          alert('ウォッチリスト登録しました！');
          $('.watchlist').data('watchlist', true);
          $(this).html('<i class="far fa-check-circle check watchlistIcon">');
          $('#watchlist_button').attr('data-content', 'ウォッチリストから削除');
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
      }).done(response => {
        // 通信成功時の処理
        if (response['result']) {
          alert('ウォッチリスト解除しました！');
          $('.watchlist').data('watchlist', false);
          $(this).html('<i class="fas fa-tag watchlistIcon">');
          $('#watchlist_button').attr('data-content', 'ウォッチリストに追加');
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