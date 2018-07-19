<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    protected $fillable = ['saying', 'user_id', 'post_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
