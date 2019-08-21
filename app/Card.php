<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //use CrudTrait;
    protected $table = "cards";
    protected $fillable = ['name'];
    public function user()
    {
        return $this->belongsTo("User");
    }
}
