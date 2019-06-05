@extends('layouts.app')

@section('content')

<div class="container">
    
    <h1>Create Movioe</h1>

    {!! Form::open(['method'=>'POST', 'action'=> 'AdminMovieController@store']) !!}
    <!--  -->
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('image_path', 'Image:') !!}
        {!! Form::text('image_path', null, ['class'=>'form-control']) !!}
    </div>
    <!-- <div class="form-group">
        {!! Form::label('file', 'Image:') !!}
        {!! Form::file('file', null, ['class'=>'form-control']) !!}
    </div> -->
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
    {!! Form::submit('Creat Actor', null, ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    @include('includes.form_error')
 </div>
@endsection
