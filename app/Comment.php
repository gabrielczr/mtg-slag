<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //define relationship with the Post

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
