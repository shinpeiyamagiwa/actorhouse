@extends('layouts.app')

@section('content')
<!-- 映画紹介 -->
  <div class="MovieProfile jumbotron">
    <div class="row">
      <div class="movieimage col-sm-4 mb-3">
        <img  class="w-100 h-100"  src="images/emma_LALALAND.jpg" alt="">
      </div>
      <div class="actorprofile col-sm-8 mb-3">
        <div class="card w-100 h-75">
          <div class="card-body  w-100 h-100">
            <iframe width=100% height=100% src="https://www.youtube.com/embed/tlyqz57sHgM" 
            frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>        
          </div>
        </div>
        <div class="row">
          <div class="actorName col-6">
            <h3>LA LA LAND</h3>           
            <ul class="d-none d-sm-block">
              <li>公開日	1988年11月6日</li>
              <li>作品時間	127分</li>
            </ul>
          </div>
          <div class="row col-6">
            <div class="float-right col-6 mt-3">
              <button class="btn btn-outline-success float-right"
              data-toggle="modal" data-target="#moviediary">
                <i class="far fa-edit"></i><p class="d-none d-md-block">記録</p>
              </button>
              <div class="modal" id="moviediary">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header bg-success">
                      <h5 class="modal-title">日記</h5>
                      <button class="close" data-dismiss="modal">
                        &times;
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="form-group">
                        <label for="point">評価</label>
                        <input type="text" placeholder="評価0~5.0"
                        class="form-control">
                        <div class="form-group">
                          <label for="point">鑑賞日</label>
                          <input type="date" name="date"　class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="point">感想</label>
                          <textarea name="editor1" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                          <div class="btn btn-success float-right">
                            記録
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="float-right col-6 mt-3">
              <a href="#" class="btn btn-outline-success float-right">
                <i class="fas fa-plus"></i>
                <p class="d-none d-md-block">気になる</p>
              </a>
            </div>
          </div>
        </div>
        <!-- 　　<p class="d-none d-lg-block">夢を叶えたい人々が集まる街、ロサンゼルス。
               映画スタジオのカフェで働くミアは女優を目指していたが、何度オーディションを受けても落ちてばかり。
               ある日、ミアは場末の店で、あるピアニストの演奏に魅せられる。彼の名はセブ（セバスチャン）、いつか自分の店を持ち、大好きなジャズを思う存分演奏したいと願っていた。やがて二人は恋におち、互いの夢を応援し合う。
               しかし、セブが店の資金作りのために入ったバンドが成功したことから、二人の心はすれ違いはじめる・・・。(C)2017 Summit Entertainment, LLC. All Rights Reserved.
            </p> -->
      </div> 
    </div>
    <div class="card w-100 mx-auto　mt-3">
      <table class="card-body w-100 table table-responsive">
        <thead>
        <tr>
          <th>Name</th>
          <th>comment</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>Shinpei</td>
          <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste dicta quaerat assumenda debitis sequi officiis est voluptas eaque ipsam inventore, reprehenderit, 
          optio eius id quibusdam laudantium, suscipit deleniti asperiores velit?</td>
          <td>
            <i class="far fa-grin-beam"></i>
            <br>
            <i class="far fa-comment-dots"></i>
          </td>  
        </tr>
        </tbody>
      </table>
    </div> 
  </div>

  <div class="ActorMovie">
    <h5　class="mx-3">出演者</h5>
    <div class="row actorList responsive container mx-auto">
      <div class="col-2">
        <img src="images/emmastone.jpg" alt="" class="img-fluid">
      </div>
      <div class="col-2">
        <img src="images/Hailee Steinfeld.png" alt="" class="img-fluid">
      </div>
      <div class="col-2">
        <img src="images/Tom Cruise.jpg" alt="" class="img-fluid">
      </div>
      <div class="col-2">
        <img src="images/Gal_Gadot.jpg" alt="" class="img-fluid">
      </div>
      <div class="col-2">
        <img src="images/Tony_Stark.jpg" alt="" class="img-fluid">
      </div>
      <div class="col-2">
        <img src="images/Mark_Ruffalo.jpg" alt="" class="img-fluid">
      </div>
    </div>
    <h5　class="text-right">More</h5>
  </div>

  <div class="jumbotron userTwieet img-fluid w-100">
    <h1 class="text-white text-center">LA LA LANDを語ろう</h1>
    <div class="card w-75 mx-auto">
      <table class="card-body w-80 table table-responsive">
        <thead>
          <tr>
            <th>Name</th>
            <th>comment</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Shinpei</td>
            <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste dicta quaerat assumenda debitis sequi officiis est voluptas eaque ipsam inventore, reprehenderit, 
              optio eius id quibusdam laudantium, suscipit deleniti asperiores velit?</td>
            <td>
              <i class="far fa-grin-beam"></i>
              <br>
              <i class="far fa-comment-dots"></i>
            </td>  
          </tr>
          <tr>
            <td>edwin</td>
            <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste dicta quaerat assumenda debitis sequi officiis est voluptas eaque ipsam inventore, reprehenderit, 
              optio eius id quibusdam laudantium, suscipit deleniti asperiores velit?</td>
          </tr>
        </tbody>
      </table> 
    </div>
  </div>
@endsection
