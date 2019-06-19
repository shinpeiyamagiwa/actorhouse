@extends('layouts.app')

@section('content')

<div class="container">
    <div class="py-5">
        <h1>Create Actors</h1>
    
        {!! Form::model($actor,['method'=>'PATCH', 'action'=> ['AdminActorController@update', $actor->tmdb_id]]) !!}
        <!--  -->
        <div class="form-group">
            {!! Form::label('name', '名前:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('place', '出身地:') !!}
            {!! Form::text('place', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {{-- {!! Form::label('birthday', '日付:') !!}
            {{Form::selectRange('birthday_year', 1960, 2019, '', ['placeholder' => ''])}}年
            {{Form::selectRange('birthday_month', 1, 12, '', ['placeholder' => ''])}}月
            {{Form::selectRange('birthday_day', 1, 31, '', ['placeholder' => ''])}}日 --}}
            {!! Form::label('birthday', '生年月日:') !!}
            {!! Form::date('birthday', null, ['class'=>'form-control col-sm-4 col-md-3']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('image_path', 'Image:') !!}
            {!! Form::text('image_path', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('homepage', 'ホームページ:') !!}
            {!! Form::text('homepage', null, ['class'=>'form-control']) !!}
        </div>
        <!-- <div class="form-group">
            {!! Form::label('file', 'Image:') !!}
            {!! Form::file('file', null, ['class'=>'form-control']) !!}
        </div> -->
        <div class="form-group">
            {!! Form::label('info', '紹介文:') !!}
            {!! Form::text('info', null, ['class'=>'form-control']) !!}
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
