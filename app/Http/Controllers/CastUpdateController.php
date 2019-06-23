<?php

namespace App\Http\Controllers;
use App\Cast;
use App\FavoriteActor;
use Illuminate\Http\Request;

class CastUpdateController extends Controller
{
    //
    public function update(Request $request)  {
        
        $start = $request->start;
        $end = $request->end;
        
        for($movie_id = $start; $movie_id <= $end; $movie_id++) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.themoviedb.org/3/movie/$movie_id/credits?api_key=c04db39f7aa30c13badfff2f6954efda",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_POSTFIELDS => "{}",
            ));
            
            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response, true);

            if(isset($response['id'])) {
                $castlist = Cast::where('movie_id', '=', $movie_id)
                                    ->first();
                if(is_null($castlist)){
                    if(isset($response['cast'])) {
                        
                        foreach ($response['cast'] as $cast) {
                            Cast::create([
                                'movie_id' => $movie_id,
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
        }
        return redirect('/home');
    }
}
