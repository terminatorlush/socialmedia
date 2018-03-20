<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function user(){
      return $this->belongsTo('App\User');
    }
    public function likes(){
      return $this->belongsTo('App\Like');
    }
    public function comments(){
      return $this->belongsTo('App\Comment');
    }
}
