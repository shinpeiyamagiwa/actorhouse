<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    //
    protected $fillable = [
        'movie_id',
        'actor_id'
    ];
}
