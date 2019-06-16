@extends('layouts.app')

@section('content')
<!-- 映画紹介 -->
  <div id="reviewsRoom" class="collapse">
    <div class="responsive mb-2 mx-auto mt-5">
      @if($reviews)
        <div class="review center-block">
          <div class="container">
            @foreach($reviews as $review)
              <div class="card border-success mb-3" >
                <div class="card-header d-inline py-0">
                  <div class="row no-gutters mt-1">
                    <div class="col-1 rounded-circle postImages mr-2　d-inline-block">
                      @if($user->image_path)
                        <img src="/images/{{$user->image_path}}" alt="" class="float-right mt-2">
                      @else
                        <i class="fas fa-user float-right mt-2"></i>
                      @endif
                    </div>
                    <div class="col-6 d-inline-block">
                      <a href="/user/{{$review->user_id}}">
                        <p class="ml-1 mt-1 py-0">{{$review->name}}<p>
                      </a>
                    </div>
                    <div class="col-1 float-right">
                      <div data-toggle="modal" data-target="#reviewreply">
                        <i class="far fa-comment-dots float-left mt-2"></i>
                      </div>
                      <div class="modal fade" id="reviewreply"　tabindex="-1" role="dialog" 
                        aria-labelledby="reviewReplyLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header bg-success">
                              <button class="close" data-dismiss="modal">
                                &times;
                              </button>
                            </div>
                            <div class="modal-body">
                              {!! Form::open(['method'=>'review', 'action'=> 'ReviewCommentController@store']) !!}
                                <div class="form-group">
                                    {!! Form::label('content', '') !!}
                                    {!! Form::textarea('content', null, ['class'=>'form-control']) !!} 
                                </div>
                                <div class="form-group">
                                    {{Form::hidden('movie_id', $movie->tmdb_id)}} 
                                </div>
                                <div class="form-group">
                                    {{Form::hidden('review_id', $review->id)}} 
                                </div>
                                <div class="form-group">
                                    {!! Form::submit('返信', null, ['class'=>'btn btn-success']) !!}
                                </div>
                                @if ($errors->any())
                                  <div class="alert alert-danger">
                                    <ul>
                                      @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                      @endforeach
                                    </ul>
                                  </div>
                                @endif
                              {!! Form::close() !!}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body text-success">
                    {{$review->content}}
                </div>
              </div>
            @endforeach
          </div>
        </div>
      @endif
    </div>      
  </div>     

@endsection
