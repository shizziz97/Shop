<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    //define the relation ship
    public function posts(){
     return   $this->hasMany('App\Post');
    }
}
