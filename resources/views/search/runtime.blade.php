@extends('layouts.app')

@section('content')
  
    <div class="jumbotron img-fluid w-100 center-block mt-3">
      <button type="button" class="btn btn-primary btn-sm mt-md-4" data-toggle="modal" data-target="#searchModal">
          <h6 class="mb-0">いま観る検索</h6>
      </button>
      <!-- Modal -->
      <div class="modal fade" id="searchModal" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-light">
                <h5 class="modal-title" id="searchModalLabel">Modal title</h5>
                <button type="button" class="close btn-light" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              {!! Form::open(['method'=>'POST', 'action'=> 'SearchController@index']) !!}
              <div class="form-group">
                {!! Form::label('genre', 'ジャンル：') !!}
                {{Form::select('genre', [18 => 'ドラマ', 28 => 'アクション', 12 => 'アドベンチャー', 878 => 'SF', 35 => 'コメディ', 16 => 'アニメ'], null, ['class' => 'field'])}}
              </div>
              <div class="form-group">
                  {!! Form::label('age', '公開年:') !!}
                  {{Form::selectRange('start_age', 2019, 1970, 2017)}}~
                  {{Form::selectRange('end_age', 2019, 1970, 2019)}}
                </div>
              <div class="form-group">
                {!! Form::label('content', '<気分は?>') !!}
                <h6>{!! Form::radio('runtime', '1', true) !!} サクッと観たい(~90分)</h6>
                <h6>{!! Form::radio('runtime', '2') !!} じっくり映画を味わいたい(91分~120分)</h6>
                <h6>{!! Form::radio('runtime', '3') !!} 今日は映画の日！(121分~150分)</h6>
                <h6>{!! Form::radio('runtime', '4') !!} 気合十分(151分~)</h6>
              </div>
              <div class="form-group">
                  {!! Form::submit('検索', null, ['class'=>'btn btn-success']) !!}
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
      <div class="card-body row responsive my-0 mx-auto no-gutters">
        @if(isset($movies[0]->title))
    
          @foreach($movies as $movie)
            <div class="movieList col-lg-2 col-3 pl-md-5 pl-2">
              <a href="/movie/{{$movie->tmdb_id}}">
              @if(isset($movie->image_path))
                <img src="http://image.tmdb.org/t/p/w500/{{$movie->image_path}}" alt="" class="img-fluid mb-0">
              @else
                <img  class="img-fluid"  src="/images/no-image.png" alt="">
              @endif
              </a>
            <p class="mb-0">{{$movie->screen_time}}分</p>
            <p>{{$movie->title}}</p>
              {{-- TODO検索結果に鑑賞数と平均結果表示 --}}
            {{-- <div class="col-6">
                <h3>{{$movie->title}}</h3>
                <div class="row">
                  <div class="col-6">
                    @if(round($avg,2) == 0)
                      <h5>評価：なし</h5>
                    @else
                      <h5>評価：{{round($avg,2)}}</h5>
                    @endif
                  </div>
                  <div class="col-6">
                    <h5>見た人：{{count($views)}}</h5>
                  </div>
                </div>
            </div> --}}
            </div>
          @endforeach
        @else
        <div>
          <h5>該当する映画が見つかりませんでした。</h5>
        </div>
        @endif
      </div>
    </div>
@endsection