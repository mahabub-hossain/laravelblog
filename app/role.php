<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
   public  function permissions(){

       return $this->belongsToMany('App\permission','permissions_role');
   }
}