@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Actor Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthdate" class="col-md-4 col-form-label text-md-right">{{ __('Birthdate') }}</label>

                            <div class="col-md-6">
                                <input id="birthdate" type="text" class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" birthdate="birthdate" value="{{ old('birthdate') }}" required autofocus>

                                @if ($errors->has('birthdate'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="place" class="col-md-4 col-form-label text-md-right">{{ __('Place') }}</label>

                            <div class="col-md-6">
                                <input id="place" type="text" class="form-control{{ $errors->has('place') ? ' is-invalid' : '' }}" place="place" value="{{ old('place') }}" required autofocus>

                                @if ($errors->has('place'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('place') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image_path" class="col-md-4 col-form-label text-md-right">{{ __('image_path') }}</label>

                            <div class="col-md-6">
                                <input id="image_path" type="image_path" class="form-control{{ $errors->has('image_path') ? ' is-invalid' : '' }}" name="image_path" value="{{ old('image_path') }}" required>

                                @if ($errors->has('image_path'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image_path') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="video_link" class="col-md-4 col-form-label text-md-right">{{ __('video_link') }}</label>

                            <div class="col-md-6">
                                <input id="video_link" type="video_link" class="form-control{{ $errors->has('video_link') ? ' is-invalid' : '' }}" name="video_link" value="{{ old('video_link') }}" required>

                                @if ($errors->has('video_link'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('video_link') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="twitter_link" class="col-md-4 col-form-label text-md-right">{{ __('twitter_link') }}</label>

                            <div class="col-md-6">
                                <input id="twitter_link" type="twitter_link" class="form-control{{ $errors->has('twitter_link') ? ' is-invalid' : '' }}" name="twitter_link" value="{{ old('twitter_link') }}" required>

                                @if ($errors->has('twitter_link'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('twitter_link') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="insta_link" class="col-md-4 col-form-label text-md-right">{{ __('insta_link') }}</label>

                            <div class="col-md-6">
                                <input id="insta_link" type="insta_link" class="form-control{{ $errors->has('insta_link') ? ' is-invalid' : '' }}" name="insta_link" value="{{ old('insta_link') }}" required>

                                @if ($errors->has('insta_link'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('insta_link') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('追加') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
