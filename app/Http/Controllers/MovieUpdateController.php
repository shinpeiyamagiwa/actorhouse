<?php

namespace App\Http\Controllers;
use App\Movie;
use App\Cast;
use App\Genre;
use App\FavoriteActor;
use Illuminate\Http\Request;

class MovieUpdateController extends Controller
{
    //
    public function update(Request $request) {

            //
        

        // $start = $request->count;
        // $end = $request->count;

        

        // for ($page = $start; $page <= $end; $page++) {
            $curl = curl_init();
            
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.themoviedb.org/3/discover/movie?page=$request->count&include_video=false&include_adult=false&sort_by=popularity.desc&language=ja-JP&api_key=c04db39f7aa30c13badfff2f6954efda",
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
            // dd($response);
            for ($i=0; $i<=19; $i++) {
                
                    
                    $tmdb_id = $response['results'][$i]['id'];
                    
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                      CURLOPT_URL => "https://api.themoviedb.org/3/movie/$tmdb_id?language=ja-JP&api_key=c04db39f7aa30c13badfff2f6954efda",
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

                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://api.themoviedb.org/3/movie/$tmdb_id/credits?api_key=c04db39f7aa30c13badfff2f6954efda",
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
                $movie = Movie::where('tmdb_id', $response['results'][$i]['id'])->first();
                if(is_null($movie)){
                    Movie::create([
                        'tmdb_id' => $response['results'][$i]['id'],
                        'title' => $response['results'][$i]['title'],
                        'homepage' => isset($details['homepage']) ? $details['homepage'] : null,
                        'image_path' => isset($response['results'][$i]['poster_path']) ? $response['results'][$i]['poster_path'] : null,
                        'backdrop_path' => isset($details['backdrop_path']) ? $details['backdrop_path'] : null,
                        'released_at' => empty($details['release_date']) ? null : $details['release_date'],
                        'video_link' =>  null,
                        'screen_time' => isset($details['runtime']) ? $details['runtime'] : null,
                        'overview' => isset($response['results'][$i]['overview']) ? $response['results'][$i]['overview'] : null,
                    ]); 
                }else {
                    Movie::where('tmdb_id', $response['results'][$i]['id'])
                    ->update([
                        'title' => $response['results'][$i]['title'],
                        'homepage' => isset($details['homepage']) ? $details['homepage'] : null,
                        'image_path' => isset($response['results'][$i]['poster_path']) ? $response['results'][$i]['poster_path'] : null,
                        'backdrop_path' => isset($details['backdrop_path']) ? $details['backdrop_path'] : null,
                        'released_at' => empty($details['release_date']) ? null : $details['release_date'],
                        'screen_time' => isset($details['runtime']) ? $details['runtime'] : null,
                        'overview' => isset($response['results'][$i]['overview']) ? $response['results'][$i]['overview'] : null,
                    ]); 
                }
                $genre = Genre::where('tmdb_id', $response['results'][$i]['id'])->first();
                    if(is_null($genre)) {
                        for($t = 0; $t < count($details['genres']); ++$t) {
                            Genre::create([
                                'tmdb_id' => $details['id'],
                                'genre_id' => $details['genres'][$t]['id'],
                                'genre_name' => $details['genres'][$t]['name'],
                            ]); 
                        }
                    }
            }
        // }
        return response()->json([
            'result' => true
        ]);      
    }

}
