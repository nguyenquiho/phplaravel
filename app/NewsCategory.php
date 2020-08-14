<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $table = 'news_category';
    function news(){
    	return $this->hasMany('App\News','id_cat','id');
    }
}
