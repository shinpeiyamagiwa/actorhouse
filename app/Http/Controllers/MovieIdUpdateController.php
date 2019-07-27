<?php

namespace App\Http\Controllers;
use App\Movie;
use App\Cast;
use App\FavoriteActor;
use Illuminate\Http\Request;

class MovieIdUpdateController extends Controller
{
    //
    public function update(Request $request) {

        //
    

    // $start = $request->count;
    // $end = $request->count;

    
            
                $curl = curl_init();
                curl_setopt_array($curl, array(
                  CURLOPT_URL => "https://api.themoviedb.org/3/movie/$request->count?language=ja-JP&api_key=c04db39f7aa30c13badfff2f6954efda",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 150,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "GET",
                  CURLOPT_POSTFIELDS => "{}",
                ));
                $details = curl_exec($curl);
                $details = json_decode($details, true);
                curl_close($curl);
                
                if(isset($details['id'])) {
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://api.themoviedb.org/3/movie/$request->count/credits?api_key=c04db39f7aa30c13badfff2f6954efda",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 150,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET",
                        CURLOPT_POSTFIELDS => "{}",
                    ));
                    
                    $credits = curl_exec($curl);
                    curl_close($curl);
                    $credits = json_decode($credits, true);
                    if(isset($credits['id'])) {
                        $castlist = Cast::where('movie_id', '=', $request->count)
                                            ->first();
                        if(is_null($castlist)){
                            if(isset($credits['cast'])) {
                                
                                foreach ($credits['cast'] as $cast) {
                                    Cast::create([
                                        'movie_id' => $request->count,
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
                    $movie = Movie::where('tmdb_id', $request->count)->first();
                    if(is_null($movie)){
                        Movie::create([
                            'tmdb_id' => $details['id'],
                            'title' => $details['title'],
                            'homepage' => isset($details['homepage']) ? $details['homepage'] : null,
                            'image_path' => $details['poster_path'],
                            'backdrop_path' => isset($details['backdrop_path']) ? $details['backdrop_path'] : null,
                            'released_at' => isset($details['release_date']) ? $details['release_date'] : null,
                            'video_link' =>  null,
                            'screen_time' => isset($details['runtime']) ? $details['runtime'] : null,
                            'overview' => $details['overview']
                        ]); 
                    }else {
                        Movie::where('tmdb_id', $request->count)
                        ->update([
                            'title' => $details['title'],
                            'homepage' => isset($details['homepage']) ? $details['homepage'] : null,
                            'image_path' => $details['poster_path'],
                            'backdrop_path' => isset($details['backdrop_path']) ? $details['backdrop_path'] : null,
                            'released_at' => isset($details['release_date']) ? $details['release_date'] : null,
                            'screen_time' => isset($details['runtime']) ? $details['runtime'] : null,
                            'overview' => $details['overview']
                        ]); 
                    }
                    
                }
        
    // }
    return response()->json([
        'result' => true
    ]);      
}

}
