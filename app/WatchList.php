<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WatchList extends Model
{
    //
    protected $fillable = [
        'user_id',
        'movie_id'
    ];
}
