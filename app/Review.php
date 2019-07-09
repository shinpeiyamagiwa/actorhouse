<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable = [
        'id',
        'user_id',
        'movie_id',
        'evaluate',
        'content'
    ];
}
