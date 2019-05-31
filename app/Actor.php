<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    //
    protected $fillable = [
        'name', 
        'place',
        'birthday',
        'image_path',
        'video_link',
        'twitter_link',
        'insta_link'
    ];
}
