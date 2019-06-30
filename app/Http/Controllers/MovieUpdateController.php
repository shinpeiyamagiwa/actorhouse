<?php

namespace App\Http\Controllers;
use App\Movie;
use App\Cast;
use App\FavoriteActor;
use Illuminate\Http\Request;

class MovieUpdateController extends Controller
{
    //
    public function update(Request $request) {

            //
        

        $start = $request->start;
        $end = $request->start;

        

        for ($page = $start; $page <= $end; $page++) {
            $curl = curl_init();
            
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.themoviedb.org/3/discover/movie?page=$page&include_video=false&include_adult=false&sort_by=popularity.desc&language=ja-JP&api_key=c04db39f7aa30c13badfff2f6954efda",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_POSTFIELDS => "{}",
            ));

            $response = curl_exec($curl);
            $response = json_decode($response, true);
            // dd($response);
            for ($i=0; $i<=19; $i++) {
                $movie = Movie::where('tmdb_id', $response['results'][$i]['id'])->first();
                if(is_null($movie)){
                    // $option = array(
                    //     'part' => 'snippet', 
                    //     'key' => 'AIzaSyC23guRfvzzJOq4XhSu-8DDWBuj3yPwHfk',
                    //     'q' => $response['results'][$i]['title']." "."予告編"
                    //  );
                    // $url = "https://www.googleapis.com/youtube/v3/search?".http_build_query($option, 'a', '&');
                    // $curl = curl_init($url);
                    // curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                    // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
                    // curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
                    // $json_response = curl_exec($curl);
                    // curl_close($curl);
                    // $responseObj = json_decode($json_response, true);
                    $tmdb_id = $response['results'][$i]['id'];
                    
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                      CURLOPT_URL => "https://api.themoviedb.org/3/movie/$tmdb_id?language=ja-JP&api_key=c04db39f7aa30c13badfff2f6954efda",
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => "",
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 30,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => "GET",
                      CURLOPT_POSTFIELDS => "{}",
                    ));
                    
                    $details = curl_exec($curl);
                    $details = json_decode($details, true);
                    curl_close($curl);

                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://api.themoviedb.org/3/movie/$tmdb_id/credits?api_key=c04db39f7aa30c13badfff2f6954efda",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET",
                        CURLOPT_POSTFIELDS => "{}",
                    ));
                    
                    $credits = curl_exec($curl);
                    curl_close($curl);
                    $credits = json_decode($credits, true);
                    if(isset($credits['id'])) {
                        $castlist = Cast::where('movie_id', '=', $tmdb_id)
                                            ->first();
                        if(is_null($castlist)){
                            if(isset($credits['cast'])) {
                                
                                foreach ($credits['cast'] as $cast) {
                                    Cast::create([
                                        'movie_id' => $tmdb_id,
                                        'actor_id' => $cast['id'],
                                    ]); 
                                    $news = FavoriteActor::where('favorite_actors.actor_id', '=', $cast['id'])
                                                        ->get();
                                    foreach ($news as $new) {
                                        FavoriteActor::where('favorite_actors.actor_id', '=', $cast['id'])
                                                    ->update(['new' => 1]);                       
                                    }
                                }
                            }
                        }
                    }

                    Movie::create([
                        'tmdb_id' => $response['results'][$i]['id'],
                        'title' => $response['results'][$i]['title'],
                        'homepage' => isset($details['homepage']) ? $details['homepage'] : null,
                        'image_path' => $response['results'][$i]['poster_path'],
                        'backdrop_path' => isset($details['backdrop_path']) ? $details['backdrop_path'] : null,
                        'released_at' => isset($details['release_date']) ? $details['release_date'] : null,
                        'video_link' =>  null,
                        'screen_time' => isset($details['runtime']) ? $details['runtime'] : null,
                        'overview' => $response['results'][$i]['overview']
                    ]); 
                }
            }
        }
        return redirect('/home');        
    }

}
