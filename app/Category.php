<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Each category has many posts 
    public function posts()
    {
       return $this->hasMany('App\Post');
    }
}
