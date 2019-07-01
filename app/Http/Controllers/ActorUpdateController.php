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
            CURLOPT_TIMEOUT => 150,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "{}",
            ));
            $response = curl_exec($curl);
            $response = json_decode($response, true);
            curl_close($curl);
            
            if(isset($response['id'])) {
                // 重複防止
                $actor = Actor::where('tmdb_id', $response['id'])->first();
                if(is_null($actor)){
                    Actor::create([
                        'name' => $response['name'],
                        'tmdb_id' => $response['id'],
                        'image_path' => $response['profile_path'],
                        'birthday' => $response['birthday'],
                        'video_link' => null,
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
