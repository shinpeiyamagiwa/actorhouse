<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    
    <meta property="og:type" content="artcle" />
    @if(isset($actor))
        <title>{{$actor->name}}/俳優情報</title>
        <meta property="og:url" content="https://www.theactorhouse.com/actor/{{$actor->tmdb_id}}" />
        <meta name="description" content="俳優に特化した新しい映画記録アプリ。映画を記録していくだけで好きな俳優が見つかる。Twitter.Facebook
        にシェアでき、Amazonビデオ.Netflixにもリンクしすぐに視聴可能。">
        <meta property="og:title" content="{{$actor->name}}-俳優情報ーActorHOUS" />
        <meta property="og:description" content="俳優に特化した新しい映画記録webアプリ。鑑賞映画を記録して好きな俳優を見つけよう！！" />
        <meta property="og:image" content="http://image.tmdb.org/t/p/w500/{{$actor->image_path}}" />
    @elseif(isset($movie))
        <title>{{$movie->title}}/映画情報</title>
        @if(isset($movie->overview))
            <meta name="description" content={{$movie->overview}}>
        @else
            <meta name="description" content="俳優に特化した新しい映画記録アプリ。映画を記録していくだけで好きな俳優が見つかる。Twitter.Facebook
            にシェアでき、Amazonビデオ.Netflixにもリンクしすぐに視聴可能。">
        @endif
        <meta property="og:url" content="https://www.theactorhouse.com/movie/{{$movie->tmdb_id}}" />
        <meta property="og:title" content="{{$movie->title}}-映画情報ーActorHOUSE" />
        <meta property="og:description" content="{{$movie->overview}}" />
        <meta property="og:image" content="http://image.tmdb.org/t/p/w500/{{$movie->image_path}}" />
    @else
    <title>ActorHOUSE 素敵な俳優と素敵な音楽が見つかるー映画記録webアプリ</title>
    
    <!-- ※基本共通設定 -->
    <meta name="description" content="俳優に特化した新しい映画記録アプリ。映画を記録していくだけで好きな俳優が見つかる。Twitter.Facebook
    にシェアでき、Amazonビデオ.Netflixにもリンクしすぐに視聴可能。">
    @endif

    <!-- ※ Twitter 共通設定 -->
    @if(isset($actor))
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="ActorHOUSE">
    <meta name="twitter:image" content="http://image.tmdb.org/t/p/w500/{{$actor->image_path}}" />
    <meta name="twitter:description" content="{{$actor->name}}">
    @endif
    @if(isset($movie))
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{$movie->title}}">
    <meta name="twitter:image" content="http://image.tmdb.org/t/p/w500/{{$movie->backdrop_path}}" />
    <meta name="twitter:description" content="{{$movie->overview}}">
    @endif
    <!-- Scripts -->
    <script src="{{ asset('js/app.js', true) }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" 
    crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css', true) }}" rel="stylesheet">
    <link href="{{ asset('css/style.css', true) }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-143383623-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-143383623-1');
    </script>

</head>
<body>
    <div id="app">
    {{-- navbar --}}
    <div class="header fixed-top">
        <nav class="navbar navbar-light navbar-expand-sm">
            <div class="container">
                <a href="/" class="navbar-brand">
                    <h4>ACTOR HOUSE</h4>
                </a>
                <a id="searchDropdown" class="nav-link dropdown-toggle text-light d-md-none d-block" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    検索<i class="fas fa-search"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="searchDropdown">
                    <div class="dropdown-item">
                        {!! Form::open(['method'=>'POST', 'action'=> 'MovieSearchController@index']) !!}
                            <div class="form-group">
                                {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'映画']) !!}
                            </div>
                        {!! Form::close() !!}  
                        </div>
                    <div class="dropdown-item">
                        {!! Form::open(['method'=>'GET', 'action'=> 'ListMovieAgeController@index']) !!}
                            <div class="form-group">
                                {!! Form::text('age', null, ['class'=>'form-control mt-1', 'placeholder'=>'公開年']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="dropdown-item">
                        {!! Form::open(['method'=>'POST', 'action'=> 'MovieSearchController@index']) !!}
                            <div class="form-group">
                                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'俳優']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                
                
                <button class="navbar-toggler text-light" data-toggle="collapse"
                    data-target="#navbarCollapse">
                    <i class="far fa-caret-square-down"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
    {{-- navbar --}}
        <nav class="searchbar navbar-expand-sm center-block d-none d-md-block">
            <div class="container">
                <div class="sesrchform">
                    <i class="fas fa-search"></i>
                    <div style="display:inline-flex" class="center-block">
                        {!! Form::open(['method'=>'POST', 'action'=> 'MovieSearchController@index']) !!}
                            <div class="form-group">
                                {!! Form::text('title', null, ['class'=>'form-control mt-1', 'placeholder'=>'映画']) !!}
                            </div>
                        {!! Form::close() !!}  
                    
                        {!! Form::open(['method'=>'GET', 'action'=> 'ListMovieAgeController@index']) !!}
                            <div class="form-group">
                                {!! Form::text('age', null, ['class'=>'form-control mt-1', 'placeholder'=>'公開年']) !!}
                            </div>
                        {!! Form::close() !!}
                    
                        {!! Form::open(['method'=>'POST', 'action'=> 'MovieSearchController@index']) !!}
                            <div class="form-group">
                                {!! Form::text('name', null, ['class'=>'form-control mt-1', 'placeholder'=>'俳優']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </nav>
    </div>

        <main class="py-4">
            @yield('content')
        </main>

        <footer id="main-footer" class="text-center p-4">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p>Copyright &copy;
                            <span id="year"></span>ActorHOUSE
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
</body>
</html>
