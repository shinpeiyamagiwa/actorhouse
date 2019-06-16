<?php

namespace App\Http\Controllers;
use App\Actor;
use Illuminate\Http\Request;

class ActorUpdateController extends Controller
{
    //
    public function update(Request $request)  {
        //
        $start = $request->start;
        $end = $request->end;

        for($person = $start; $person <= $end; $person++) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.themoviedb.org/3/person/$person?language=ja-JP&api_key=c04db39f7aa30c13badfff2f6954efda",
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
            curl_close($curl);
            
            if(isset($response['id'])) {
                // Youtube
                $option = array(
                    'part' => 'snippet', 
                    'key' => 'AIzaSyC23guRfvzzJOq4XhSu-8DDWBuj3yPwHfk',
                    'q' => $response['name']
                 );
                $url = "https://www.googleapis.com/youtube/v3/search?".http_build_query($option, 'a', '&');
                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
                $json_response = curl_exec($curl);
                curl_close($curl);
                $responseObj = json_decode($json_response, true);
                
                // 重複防止
                $actor = Actor::where('tmdb_id', $response['id'])->first();
                if(is_null($actor)){
                    Actor::create([
                        'name' => $response['name'],
                        'tmdb_id' => $response['id'],
                        'image_path' => $response['profile_path'],
                        'birthday' => $response['birthday'],
                        'video_link' => isset($responseObj['items'][0]['id']['videoId']) ? $responseObj['items'][0]['id']['videoId'] : 'test',
                        'twitter_link' => 'test',
                        'place' => $response['place_of_birth'],
                        'homepage' => $response['homepage'],
                        'info' => 'test'
                    ]); 
                }
            }    
        }
        return redirect('/home');
    }
}