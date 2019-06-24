@extends('layouts.app')

@section('content')

<div class="container">
    <div class="py-5">
        <h1>Edit Movioe</h1>
        
    
        {!! Form::model($movie,['method'=>'PATCH', 'action'=> ['AdminMovieController@update', $movie->tmdb_id]]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('image_path', 'Image:') !!}
            {!! Form::text('image_path', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('概要', '概要:') !!}
            {!! Form::textarea('overview', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('video_link', 'Video_link:') !!}
            {!! Form::text('video_link', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('screen_time', 'Screen_time:') !!}
            {!! Form::text('screen_time', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('released_at', 'Released:') !!}
            {!! Form::date('released_at', null, ['class'=>'form-control col-sm-4 col-md-3']) !!}
        </div>
        <div class="form-group">
        {!! Form::submit('Update Actor', null, ['class'=>'btn btn-primary']) !!}
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
@endsection
