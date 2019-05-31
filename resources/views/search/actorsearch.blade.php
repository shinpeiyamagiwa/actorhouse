@extends('layouts.app')

@section('content')
  
    <div class="jumbotron review img-fluid w-100 center-block">
      @if($movies) 
        @foreach($movies as $movie)
            <div class="movieSearch row responsive mb-2 container mx-auto mt-5">
              <div class="float-right col-sm-3 col-6">
                <a href="/movie/{{$movie->id}}">
                  <img src="/images/{{$movie->image_path}}" alt="" class="img-fluid mb-2">
                </a>
              </div>
            <div class="col-6">
                <h3>{{$movie->title}}</h3>
                {{-- <h5>評価4.7</h5> --}}
                {{-- <p>出演俳優</p>
                @foreach($movies as $movie)
                
                  <p class="float-right">{{$movie->name}}</p>
                
                @endforeach --}}
            </div>
            </div>
        @endforeach
      @endif
      <div class="card-body row responsive my-0 mx-auto">
          @if($actors)
           @foreach($actors as $actor)
             <div class="favoriteActor col-lg-2 col-sm-3 col-4">
               <a href="/actor/{{$actor->actor_id}}">
                 <img src="/images/{{$actor->image_path}}" alt="" class="img-fluid mb-2">
               </a>
               <p>{{$actor->name}}</p>
             </div>
           @endforeach
        @endif
       </div>
          </div>
@endsection