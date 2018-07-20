<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    protected $fillable = ['saying', 'chatmonotitle', 'user_id','mono_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
