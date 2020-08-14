<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = "product_category";
    public function productType(){
    	return $this->hasMany('App\ProductType','category_id','id');
    }
}
