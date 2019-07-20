@extends('layouts.app')

@section('content')
<nav class="searchbar navbar-expand-sm center-block d-none d-sm-block">
    <div class="container mt-5">
        <div class="sesrchform">
          <div class="row">
            <div class="col-1">
              <i class="fas fa-search"></i>
            </div>
            <div class="col-3">
              <div style="display:inline-flex" class="center-block">
                  {!! Form::open(['method'=>'POST', 'action'=> 'MovieSearchController@index']) !!}
                      <div class="form-group">
                          {!! Form::text('title', null, ['class'=>'form-control mt-1', 'placeholder'=>'タイトル検索']) !!}
                      </div>
                  {!! Form::close() !!}  
              </div>
            </div>
            <div class="col-3">
              <div style="display:inline-flex" class="center-block">
                  {!! Form::open(['method'=>'POST', 'action'=> 'ListMovieAgeController@index']) !!}
                      <div class="form-group">
                          {{Form::selectRange('evaluate', 1970, 2020, '', ['placeholder' => ''])}}年
                      </div>
                  {!! Form::close() !!}  
              </div>

            </div>

          </div>
        </div>
    </div>
</nav>


@endsection