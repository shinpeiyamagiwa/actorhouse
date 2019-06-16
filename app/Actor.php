<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    //
    protected $fillable = [
        'name', 
        'tmdb_id',
        'place',
        'birthday',
        'image_path',
        'video_link',
        'twitter_link',
        'insta_link',
        'homepage',
        'info',
    ];
}
