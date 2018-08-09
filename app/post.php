<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
   public function tags(){
       return $this->belongsToMany('App\Tag','tagposts')->withtimestamps();
   }

    public function categories(){
        return $this->belongsToMany('App\category','categoryposts');
    }

    public function getRouteKeyName()
    { //for using slug
        return 'slug';
    }
}
