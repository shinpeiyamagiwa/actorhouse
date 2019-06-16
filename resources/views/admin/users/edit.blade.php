@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Edit User</h1>

    {!! Form::model($user,['method'=>'PATCH', 'action'=> ['AdminUserController@update', $user->id]]) !!}
    <!--  -->
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('image_path', 'Image:') !!}
        {!! Form::file('image_path', null, ['class'=>'form-control']) !!}
    </div> 
    <div class="form-group">
    {!! Form::submit('Edit User', null, ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    @include('includes.form_error')
 </div>
@endsection
