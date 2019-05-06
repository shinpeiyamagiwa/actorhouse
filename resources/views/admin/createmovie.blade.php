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
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" title="title" value="{{ old('title') }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="released_at" class="col-md-4 col-form-label text-md-right">{{ __('released_at') }}</label>

                            <div class="col-md-6">
                                <input id="released_at" type="text" class="form-control{{ $errors->has('released_at') ? ' is-invalid' : '' }}" released_at="released_at" value="{{ old('released_at') }}" required autofocus>

                                @if ($errors->has('released_at'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('released_at') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="screen_time" class="col-md-4 col-form-label text-md-right">{{ __('screen_time') }}</label>

                            <div class="col-md-6">
                                <input id="screen_time" type="text" class="form-control{{ $errors->has('screen_time') ? ' is-invalid' : '' }}" screen_time="screen_time" value="{{ old('screen_time') }}" required autofocus>

                                @if ($errors->has('screen_time'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('screen_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image_path" class="col-md-4 col-form-label text-md-right">{{ __('image_path') }}</label>

                            <div class="col-md-6">
                                <input id="image_path" type="image_path" class="form-control{{ $errors->has('image_path') ? ' is-invalid' : '' }}" title="image_path" value="{{ old('image_path') }}" required>

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
