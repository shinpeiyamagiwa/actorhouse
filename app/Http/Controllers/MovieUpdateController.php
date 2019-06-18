<?php

namespace App\Http\Controllers;
use App\Movie;
use Illuminate\Http\Request;

class MovieUpdateController extends Controller
{
    //
    public function update(Request $request) {

            //
        

        $start = $request->start;
        $end = $request->end;

        

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

            for ($i=0; $i<=19; $i++) {
                $movie = Movie::where('tmdb_id', $response['results'][$i]['id'])->first();
                if(is_null($movie)){
                    $option = array(
                        'part' => 'snippet', 
                        'key' => 'AIzaSyC23guRfvzzJOq4XhSu-8DDWBuj3yPwHfk',
                        'q' => $response['results'][$i]['title']." "."予告編"
                     );
                    $url = "https://www.googleapis.com/youtube/v3/search?".http_build_query($option, 'a', '&');
                    $curl = curl_init($url);
                    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
                    $json_response = curl_exec($curl);
                    curl_close($curl);
                    $responseObj = json_decode($json_response, true);
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
                    Movie::create([
                        'tmdb_id' => $response['results'][$i]['id'],
                        'title' => $response['results'][$i]['title'],
                        'homepage' => isset($details['homepage']) ? $details['homepage'] : null,
                        'image_path' => $response['results'][$i]['poster_path'],
                        'released_at' => $details['release_date'],
                        'video_link' => isset($responseObj['items'][0]['id']['videoId']) ? $responseObj['items'][0]['id']['videoId'] : 'test',
                        'screen_time' => $details['runtime'],
                        'overview' => $response['results'][$i]['overview']
                    ]); 
                }
            }
        }
        return redirect('/home');        
    }

}
