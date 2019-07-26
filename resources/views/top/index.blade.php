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
  <h4 class="mx-2 mt-4">MOVIE</h4>
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
      <a href="/movie/168259">
        <img src="http://image.tmdb.org/t/p/w500//njv65RTipNSTozFLuF85jL0bcQe.jpg" alt="" class="img-fluid">
      </a>
    </div>
    <div class="col-md-4 col-6">
      <a href="/movie/320288">
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

@endsection