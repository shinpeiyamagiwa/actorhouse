<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" 
    crossorigin="anonymous">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="small.css" media="screen and (max-width:350px)">
    <link rel="stylesheet" href="medium.css" media="screen and (min-width:350px) and (max-width:896px)">
    <link rel="stylesheet" href="wide.css" media="screen and (min-width:896px)">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" />
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-light navbar-expand-sm fixed-top">
            <div class="container">
                <a href="/" class="navbar-brand">
                    <h4>ACTOR HOUSE</h4>
                </a>
                {!! Form::open(['method'=>'POST', 'action'=> 'MovieSearchController@index']) !!}
                    <div class="form-group">
                        {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'映画タイトル']) !!}
                    </div>
                {!! Form::close() !!}
                {!! Form::open(['method'=>'POST', 'action'=> 'MovieSearchController@index']) !!}
                    <div class="form-group">
                        {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'俳優']) !!}
                    </div>
                {!! Form::close() !!}
                <button class="navbar-toggler col-sm-" data-toggle="collapse"
                    data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <!-- <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a href="user" class="nav-link">MYページ</a>
                        </li>
                        <li class="nav-item ">
                            <a href="user" class="nav-link">Tweetページ</a>
                        </li>
                        <li class="nav-item ">
                            <a href="/logout" class="nav-link">ログアウト</a>
                        </li>

                    </ul> -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/home">MYページ</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer id="main-footer" class="text-center p-4">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p>Copyright &copy;
                            <span id="year"></span>Glozzom
                        </p>
                    </div>
                </div>
            </div>
        </footer>
      </div>
      <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
    <script src="modaal.min.js"></script>
<script>
      $('.mycontent1').click(function () {
      $('#twieetRoom').addClass('show');
      $('#movieRoom').removeClass('show');
      $('#actorRoom').removeClass('show');
      $('#watchlistRoom').removeClass('show');
    });
    $('.mycontent2').click(function () {
      $('#movieRoom').addClass('show');
      $('#twieetRoom').removeClass('show');
      $('#actorRoom').removeClass('show');
      $('#watchlistRoom').removeClass('show');
    });
    $('.mycontent3').click(function () {
      $('#actorRoom').addClass('show');
      $('#movieRoom').removeClass('show');
      $('#twieetRoom').removeClass('show');
      $('#watchlistRoom').removeClass('show');
    });
    $('.mycontent4').click(function () {
      $('#watchlistRoom').addClass('show');
      $('#movieRoom').removeClass('show');
      $('#actorRoom').removeClass('show');
      $('#twieetRoom').removeClass('show');
    });</script>
    


</body>
</html>
