<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public  function posts(){
        return $this->belongsToMany('App\post','categoryposts')->orderby('created_at','desc')->paginate(1);
    }

    public function getRouteKeyName()
    { //for using slug
        return 'slug';
    }
}
