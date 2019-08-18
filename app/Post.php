<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Post extends Model

{
    use CrudTrait;
    protected $table = "posts";
    //protected $fillable = ['name'];
    public function user()
    {
        return $this->belongsTo("User");
    }

    /*
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    */

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
}
