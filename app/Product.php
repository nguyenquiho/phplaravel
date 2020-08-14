<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "products";



    public function product_type()
    {
    	return $this->belongsTo('App\ProductType','id_type','id');
    }

    public function bill_detail(){
    	return $this->hasMany('App\BillDetail','id_product','id');
    }

    public function review(){
        return $this->hasMany('App\Review','id_product','id');
    }

    // e viết 1 hàm get product theo cat -> truyền id cat vào hàm này
    // queryviết ở đây
    // dạ r cũng viết hàm get proftuct  theo type nữa hả a 
    // quan hệ của mấy cái table ra sao
    // quan hệ mấy nó e set r đó a 
    // đó e bôi đó
    // ở model nào e cũng set
    // 
    // 1.getdataProduct($id_the_loai)
    // 2.$value = select * from product where $id_the_loai = $cat id 
    // kiểu vầy nè
    // e gọi cái $value này ở controller lưu nó vào $aray gì đó rồi ở trang blade e foreach cais array ra là dc
    // oh ok để e mò xem 
    // 
}
