<?php

namespace App\Http\Controllers;
use App\Cast;
use App\FavoriteActor;
use Illuminate\Http\Request;

class CastUpdateController extends Controller
{
    //
    public function update(Request $request)  {
        $curl = curl_init();
        $start = $request->start;
        $end = $request->end;
        
        for($cast = $start; $cast <= $end; $cast++) {
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.themoviedb.org/3/movie/$cast/credits?api_key=c04db39f7aa30c13badfff2f6954efda",
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
            if(isset($response['id'])) {
                $castlist = Cast::where('movie_id', '=', $response['id'])
                            ->first();
                if(is_null($castlist)){
                    if(isset($response['cast'])) {
                        $cas = count($response['cast']);
                        for ($i=0; $i<$cas; $i++) {
                            Cast::create([
                                'movie_id' => $response['id'],
                                'actor_id' => $response['cast'][$i]['id'],
                            ]); 
                            $new = FavoriteActor::where('favorite_actors.actor_id', '=', $response['cast'][$i]['id'])
                                                ->first();
                            if(isset($new)) {
                                FavoriteActor::where('favorite_actors.actor_id', '=', $response['cast'][$i]['id'])
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
