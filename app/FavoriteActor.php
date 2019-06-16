<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoriteActor extends Model
{
    //
    protected $fillable = [
        'user_id',
        'actor_id',
        'new'
    ];
}
