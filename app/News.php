<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $table = "news";
    public function news_category(){
    	return $this->belongsTo('App\NewsCategory','id_cat','id');
    }
}
