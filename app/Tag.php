<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public  function posts(){
        return $this->belongsToMany('App\post','tagposts')->orderby('created_at','desc')->paginate(2);
    }

    public function getRouteKeyName()
    { //for using slug
        return 'slug';
    }
}
