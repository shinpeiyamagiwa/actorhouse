<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //
    protected $fillable = [
        'title',
        'image_path',
        'video_link',
        'screen_time',
        'released_at'
    ];
}
