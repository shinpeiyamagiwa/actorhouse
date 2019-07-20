@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h1 class="mt-5 pt-5">Edit User</h1>

    {!! Form::model($user,['method'=>'PATCH', 'action'=> ['AdminUserController@update', $user->id],'files' => true]) !!}

    <div class="form-group">
        {!! Form::label('image_path', 'プロフィール写真:') !!}
        {!! Form::file('image_path', null, ['class'=>'form-control']) !!}
    </div> 
    <div class="form-group">
    {!! Form::submit('Edit User', null, ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    @include('includes.form_error')
 </div>
@endsection
