@extends('layouts.app')

@section('content')
     
<!-- 会員登録ボタン -->
  {{-- <div class="Topheader jumbotron text-center">
    <h1>好きな俳優を見つけよう</h1>
    @unless (Auth::check())
      <a href="register">
        <button class="btn btn-primary"
          data-toggle="modal" data-target="#menber">Register
        </button>
      </a>  
      <a href="login">
        <button class="btn btn-primary"
          data-toggle="modal" data-target="#menber">Login
        </button>
      </a>  
    @endunless
    <br>
    <h3>映画記録アプリ</h3>
  </div> --}}

<!-- トレンド俳優（週間でのファン登録数TOP６） -->
  <div class="trendactor text-center">
    <h4>気になる俳優をクリック!!</h4>
    <div class="row castList responsive mx-1 mt-md-5 mb-0 no-gutters">
      <div class="col-md-1 col-2 mb-3">
        <a href="/actor/524">
          <img src="images/ナタリーポートマン.jpg" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-md-1 col-2 mb-3">
        <a href="/actor/1813">
          <img src="images/ハサウェイ.jpg" alt="" class="img-fluid">
        </a>      
      </div>
      <div class="col-md-1 col-2 mb-3">
        <a href="/actor/1461">
          <img src="images/George Clooney.jpg" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-md-1 col-2 mb-3">
        <a href="/actor/116">
          <img src="images/キーラナイトレイ.jpg" alt="" class="img-fluid">
        </a> 
      </div>
      <div class="col-md-1 col-2 mb-3">
        <a href="/actor/976">
          <img src="images/201707-N0092682-main.jpg" alt="" class="img-fluid">
        </a> 
      </div>
      <div class="col-md-1 col-2 mb-3">
        <a href="/actor/500">
          <img src="images/トムクルーズ.jpeg" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-md-1 col-2 mb-3">
        <a href="/actor/54693">
          <img src="http://image.tmdb.org/t/p/w500//elDuP7PNuJTT0nmhzJz4jcrVR1R.jpg" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-md-1 col-2 mb-3">
        <a href="/actor/30614">
          <img src="http://image.tmdb.org/t/p/w500//3dVrtUzLYNszM4QecBhMypUPdU4.jpg" alt="" class="img-fluid">
        </a>      
      </div>
      <div class="col-md-1 col-2 mb-3">
        <a href="/actor/3223">
          <img src="http://image.tmdb.org/t/p/w500//1YjdSym1jTG7xjHSI0yGGWEsw5i.jpg" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-md-1 col-2 mb-3">
        <a href="/actor/1245">
          <img src="http://image.tmdb.org/t/p/w500//tHMgW7Pg0Fg6HmB8Kh8Ixk6yxZw.jpg" alt="" class="img-fluid">
        </a> 
      </div>
      <div class="col-md-1 col-2 mb-3">
        <a href="/actor/71580">
          <img src="http://image.tmdb.org/t/p/w500//wz3MRiMmoz6b5X3oSzMRC9nLxY1.jpg" alt="" class="img-fluid">
        </a> 
      </div>
      <div class="col-md-1 col-2 mb-3">
        <a href="/actor/84223">
          <img src="http://image.tmdb.org/t/p/w500//azYQijqqcbYAKnRtSrwMWUgcNvz.jpg" alt="" class="img-fluid">
        </a>
      </div>
    </div>
    <div class="Topheader text-center my-0 py-1 height">
 
      <h3>素敵な俳優と素敵な音楽に出会える</h3>
      @unless (Auth::check())
      <a href="register">
        <button class="btn btn-primary btn-sm mb-2"
          data-toggle="modal" data-target="#menber">Register
        </button>
      </a>  
      <a href="login">
        <button class="btn btn-primary btn-sm mb-2 px-3"
          data-toggle="modal" data-target="#menber">Login
        </button>
      </a>
    @endunless
      <h3>映画記録アプリ</h3>
      {{-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#searchModal">
          <h6 class="mb-0">いま観る検索</h6>
      </button> --}}
  
      <!-- Modal -->
      {{-- <div class="modal fade" id="searchModal" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
          <div class="modal-header text-light">
              <h5 class="modal-title" id="searchModalLabel">いま見る検索</h5>
              <button type="button" class="close btn-light" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              {!! Form::open(['method'=>'POST', 'action'=> 'SearchController@index']) !!}
              <div class="form-group">
                {!! Form::label('genre', 'ジャンル：') !!}
                {{Form::select('genre', [18 => 'ドラマ', 28 => 'アクション', 12 => 'アドベンチャー', 878 => 'SF', 35 => 'コメディ', 16 => 'アニメ'], null, ['class' => 'field'])}}
              </div>
              <div class="form-group">
                  {!! Form::label('age', '公開年:') !!}
                  {{Form::selectRange('age', 2019, 1970, '', ['placeholder' => ''])}}
                </div>
              <div class="form-group">
                {!! Form::label('content', '<気分は?>') !!}
                <h6>{!! Form::radio('runtime', '1', true) !!} サクッと観たい(~90分)</h6>
                <h6>{!! Form::radio('runtime', '2') !!} じっくり映画を味わいたい(91分~120分)</h6>
                <h6>{!! Form::radio('runtime', '3') !!} 今日は映画の日！(121分~150分)</h6>
                <h6>{!! Form::radio('runtime', '4') !!} 気合十分(151分~)</h6>
              </div>
              <div class="form-group">
                  {!! Form::submit('検索', null, ['class'=>'btn btn-success']) !!}
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
          </div> --}}
        </div>
      </div>
    </div>
    <div class="row castList responsive mx-1 no-gutters mb-0">
      <div class="col-md-1 col-2 mb-3">
        <a href="/actor/5081">
          <img src="http://image.tmdb.org/t/p/w500//jqlqq3knztTnty5rcMg5evqZRCa.jpg" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-md-1 col-2 mb-3">
        <a href="/actor/62064">
          <img src="http://image.tmdb.org/t/p/w500//ipG3BMO8Ckv9xVeEY27lzq975Qm.jpg" alt="" class="img-fluid">
        </a>      
      </div>
      <div class="col-md-1 col-2 mb-3">
        <a href="/actor/90633">
          <img src="http://image.tmdb.org/t/p/w500//fysvehTvU6bE3JgxaOTRfvQJzJ4.jpg" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-md-1 col-2 mb-3">
        <a href="/actor/16828">
          <img src="http://image.tmdb.org/t/p/w500//7dUkkq1lK593XvOjunlUB11lKm1.jpg" alt="" class="img-fluid">
        </a> 
      </div>
      <div class="col-md-1 col-2 mb-3">
        <a href="/actor/60073">
          <img src="http://image.tmdb.org/t/p/w500//4ZgxRd2ADYVm2gd5yQJa1emtMl5.jpg" alt="" class="img-fluid">
        </a> 
      </div>
      <div class="col-md-1 col-2 mb-3">
        <a href="/actor/13240">
          <img src="http://image.tmdb.org/t/p/w500//z2wJh5n7qZRUE1y9uB8UrivAV2b.jpg" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-md-1 col-2 mb-3">
        <a href="/actor/72129">
          <img src="http://image.tmdb.org/t/p/w500//naZyy9IqAQDaAbr1kYShLdg6aPR.jpg" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-md-1 col-2 mb-3">
        <a href="/actor/6968">
          <img src="http://image.tmdb.org/t/p/w500//dFbNlPpiEPupTAlNVNh5vrxBU1h.jpg" alt="" class="img-fluid">
        </a>      
      </div>
      <div class="col-md-1 col-2 mb-3">
        <a href="/actor/29222">
          <img src="http://image.tmdb.org/t/p/w500//6oXNHv7gAyXXYFpF943pKRsTtqQ.jpg" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-md-1 col-2 mb-3">
        <a href="/actor/3">
          <img src="http://image.tmdb.org/t/p/w500//7CcoVFTogQgex2kJkXKMe8qHZrC.jpg" alt="" class="img-fluid">
        </a> 
      </div>
      <div class="col-md-1 col-2 mb-3">
        <a href="/actor/287">
          <img src="http://image.tmdb.org/t/p/w500//kU3B75TyRiCgE270EyZnHjfivoq.jpg" alt="" class="img-fluid">
        </a> 
      </div>
      <div class="col-md-1 col-2 mb-3">
        <a href="/actor/9273">
          <img src="http://image.tmdb.org/t/p/w500//1h2r2VTpoFb5QefAaBYYQgQzL9z.jpg" alt="" class="img-fluid">
        </a>
      </div>
    </div>
  </div>
  <h4 class="mx-2 mt-4 topic">公開中&近日公開</h4>
  <div class="row no-gutters movieList">
    <div class="col-md-2 col-4">
      <a href="/movie/412117">
        <img src="http://image.tmdb.org/t/p/w500//pXLfG0h89VOvkjS2TqPfuxphmh.jpg" alt="" class="img-fluid">
      </a>
    </div>
    <div class="col-md-2 col-4">
      <a href="/movie/568160">
        <img src="http://image.tmdb.org/t/p/w500//tvFScjYdjpltGBG6UQ9V6R02owV.jpg" alt="" class="img-fluid">
      </a>
    </div>
    <div class="col-md-2 col-4">
      <a href="/movie/301528">
        <img src="http://image.tmdb.org/t/p/w500//fV8IBuRHisDcIBiMcIhRwev6DOJ.jpg" alt="" class="img-fluid">
      </a>
    </div>
    <div class="col-md-2 col-4">
      <a href="/movie/429617">
        <img src="http://image.tmdb.org/t/p/w500//iyiXICmKjJieoa1a1Jmni7KGMUl.jpg" alt="" class="img-fluid">
      </a>
    </div>
    <div class="col-md-2 col-4">
      <a href="/movie/420817">
        <img src="http://image.tmdb.org/t/p/w500//aaFg8xedEr1w5ML4tJUGX3VblBU.jpg" alt="" class="img-fluid">
      </a>
    </div>
    <div class="col-md-2 col-4">
      <a href="/movie/384018">
        <img src="http://image.tmdb.org/t/p/w500//keym7MPn1icW1wWfzMnW3HeuzWU.jpg" alt="" class="img-fluid">
      </a>
    </div>
  </div>
  <h4 class="mx-2 mt-4 text-center topic">オススメ映画</h4>
  <div class="container">
    <div class="row no-gutters">
      <div class="col-md-4 col-6">
        <a href="/movie/297762">
          <img src="http://image.tmdb.org/t/p/w500//6iUNJZymJBMXXriQyFZfLAKnjO6.jpg" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-md-4 col-6">
        <a href="/movie/299534">
          <img src="http://image.tmdb.org/t/p/w500//7RyHsO4yDXtBv1zUU3mTpHeQ0d5.jpg" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-md-4 col-6">
        <a href="/movie/140607">
          <img src="http://image.tmdb.org/t/p/w500//njv65RTipNSTozFLuF85jL0bcQe.jpg" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-md-4 col-6">
        <a href="/movie/168259">
          <img src="http://image.tmdb.org/t/p/w500//ypyeMfKydpyuuTMdp36rMlkGDUL.jpg" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-md-4 col-6">
        <a href="/movie/313369">
          <img src="http://image.tmdb.org/t/p/w500//fp6X6yhgcxzxCpmM0EVC6V9B8XB.jpg" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-md-4 col-6">
        <a href="/movie/161">
          <img src="http://image.tmdb.org/t/p/w500//z2fiN0tgkgOcAFl5gxvQlYXCn3l.jpg" alt="" class="img-fluid">
        </a>
      </div>
    </div>

  </div>

@endsection