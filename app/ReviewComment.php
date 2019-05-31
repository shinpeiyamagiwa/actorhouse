<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewComment extends Model
{
    //
    protected $fillable = [
        'user_id',
        'review_id',
        'content'
    ];
}
