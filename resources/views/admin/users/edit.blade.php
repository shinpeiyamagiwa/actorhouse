@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Edit User</h1>

    {!! Form::open(['method'=>'POST', 'action'=> 'AdminUserController@edit']) !!}
    <!--  -->
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
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
        {!! Form::label('rank_1', 'rank_1:') !!}
        {!! Form::text('rank_1', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('rank_2', 'rank_2:') !!}
        {!! Form::text('rank_2', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('rank_3', 'rank_3:') !!}
        {!! Form::text('rank_3', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('rank_4', 'rank_4:') !!}
        {!! Form::text('rank_4', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::submit('Edit User', null, ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    @include('includes.form_error')
 </div>
@endsection
