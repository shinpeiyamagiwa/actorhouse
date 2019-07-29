<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    //
    protected $fillable = [
        'tmdb_id',
        'genre_id',
        'genre_name',
    ];
}
