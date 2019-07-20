@extends('layouts.app')

@section('content')

<div class="jumbotron mt-4 pb-1">
    {!! Form::open(['method'=>'POST', 'action'=> 'ListMovieAgeController@index']) !!}
    <div class="form-group">
      {!! Form::label('age', '公開年：') !!}
      {{Form::selectRange('age', 1970, 2020, '', ['placeholder' => ''])}}
      {!! Form::button('検索',['class'=>'btn btn-sm btn-light']) !!}
    </div>
      {!! Form::close() !!}
</div>
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
      </div>
    @endforeach
  @endif
</div>

@endsection