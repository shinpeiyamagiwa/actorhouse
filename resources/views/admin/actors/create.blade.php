@extends('layouts.app')

@section('content')

<div class="container">
    z
    <h1>Create Actors</h1>

    {!! Form::open(['method'=>'POST', 'action'=> 'AdminActorController@store']) !!}
    <!--  -->
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('place', 'Place:') !!}
        {!! Form::text('place', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {{-- {!! Form::label('birthday', '日付:') !!}
        {{Form::selectRange('birthday_year', 1960, 2019, '', ['placeholder' => ''])}}年
        {{Form::selectRange('birthday_month', 1, 12, '', ['placeholder' => ''])}}月
        {{Form::selectRange('birthday_day', 1, 31, '', ['placeholder' => ''])}}日 --}}
        {!! Form::label('birthday', 'Birthdate:') !!}
        {!! Form::date('birthday', null, ['class'=>'form-control col-sm-4 col-md-3']) !!}
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
        {!! Form::label('wikipedia', 'wikipedia:') !!}
        {!! Form::text('wikipedia', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('video_link', 'Video_link:') !!}
        {!! Form::text('video_link', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('twitter_link', 'Twitter_link:') !!}
        {!! Form::text('twitter_link', null, ['class'=>'form-control']) !!}
    </div>
    
    <div class="form-group">
    {!! Form::submit('Creat Actor', null, ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    @include('includes.form_error')
 </div>
@endsection
