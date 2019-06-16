<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActorImages extends Model
{
    //
    protected $fillable = [
        'user_id',
        'actor_id',
        'image_path'
    ];
}
