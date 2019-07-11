@extends('layouts.app')

@section('content')
  
    <div class="jumbotron img-fluid w-100 center-block">
      <div class="card-body row responsive my-0 mx-auto">
        @if($movies)
          @foreach($movies as $movie)
            <div class="movieList col-lg-2 col-sm-3 col-4">
              <a href="/movie/{{$movie->tmdb_id}}">
              @if(isset($movie->image_path))
                <img src="http://image.tmdb.org/t/p/w500/{{$movie->image_path}}" alt="" class="img-fluid mb-2">
              @else
                <img  class="img-fluid"  src="/images/no-image.png" alt="">
              @endif
              </a>
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
        @endif
      </div>
      <div class="card-body row responsive my-0 mx-auto">
          @if($actors)
           @foreach($actors as $actor)
             <div class="favoriteActor col-lg-2 col-sm-3 col-4">
               <a href="/actor/{{$actor->tmdb_id}}">
                @if(isset($actor->image_path))
                  <img src="http://image.tmdb.org/t/p/w500/{{$actor->image_path}}" alt="" class="img-fluid mb-2">
                @else
                  <img  class="img-fluid"  src="/images/no-image.png" alt="">
                @endif
                </a>
               <p>{{$actor->name}}</p>
             </div>
           @endforeach
        @endif
       </div>
          </div>
@endsection