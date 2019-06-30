<?php

namespace App\Http\Controllers;
use App\Movie;
use App\Actor;
use Illuminate\Http\Request;

class YouTubeUpdateController extends Controller
{
    //
    public function update(Request $request) {
        
        $start = $request->start;
        $end = $request->end;
    if($request->genre == 'movie') {
        for($id = $start; $id <= $end; $id++) {
            $movie = Movie::where('movies.id', $id)
                          ->select('title')
                          ->first();
            if(isset($movie->title)) {
                // Youtube
                $option = array(
                    'part' => 'snippet', 
                    'key' => 'AIzaSyC23guRfvzzJOq4XhSu-8DDWBuj3yPwHfk',
                    'q' => $movie->title
                 );
                $url = "https://www.googleapis.com/youtube/v3/search?".http_build_query($option, 'a', '&');
                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
                $json_response = curl_exec($curl);
                curl_close($curl);
                $responseObj = json_decode($json_response, true);
                dd($responseObj);
                // 重複防止
                $video = Movie::where('movies.id', $id)
                               ->select('video_link')
                               ->first();
                if(is_null($video)){
                    Movie::wehere('movies.id', $id)
                        ->update([
                        'video_link' => isset($responseObj['items'][0]['id']['videoId']) ? $responseObj['items'][0]['id']['videoId'] : 'test']); 
                }
            }    
        }
    }
    if($request->genre == 'actor') {
        for($id = $start; $id <= $end; $id++) {
            $actor = Actor::where('actors.id', $id)
                          ->select('name')
                          ->first();
            if(isset($actor->name)) {
                // Youtube
                $option = array(
                    'part' => 'snippet', 
                    'key' => 'AIzaSyC23guRfvzzJOq4XhSu-8DDWBuj3yPwHfk',
                    'q' => $actor->name
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
                $video = Actor::where('actors.id', $id)
                               ->select('video_link')
                               ->first();
                if(is_null($video)){
                    Actor::wehere('actors.id', $id)
                        ->update([
                        'video_link' => isset($responseObj['items'][0]['id']['videoId']) ? $responseObj['items'][0]['id']['videoId'] : 'test']); 
                }
            }    
        }
    }
    
        return redirect('/home');
    }
}
