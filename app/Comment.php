<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // fields can be filled
    protected $fillable = ['body', 'user_id', 'post_id'];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
