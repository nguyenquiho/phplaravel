<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//start project
//customer

Route::get('index',['as'=>'trang-chu','uses'=>'PageController@getIndex']);

Route::get('danh-muc-san-pham/cat={id}',[
'as'=>'danhmucsanpham','uses'=>'PageController@getProductCategory']);

Route::get('loai-san-pham/type={type}',[
'as'=>'loaisanpham','uses'=>'PageController@getProductType']);

Route::get('chi-tiet-san-pham/{id}',[
'as'=>'chitietsanpham','uses'=>'PageController@getProductDetail']);

Route::get('lien-he',[
'as'=>'lienhe','uses'=>'PageController@getContact']);

Route::get('gioi-thieu',[
'as'=>'gioithieu','uses'=>'PageController@getGioiThieu']);

Route::get('add-to-cart/{id}',[
'as'=>'themgiohang',
'uses'=>'PageController@getAddtoCart']);

Route::get('del-cart/{id}',[
'as'=>'xoagiohang',
'uses'=>'PageController@getDelItemCart']);

Route::get('dat-hang',[
'as'=>'dathang',
'uses'=>'PageController@getCheckout']);

Route::post('dat-hang',[
'as'=>'dathang',
'uses'=>'PageController@postCheckout'
]);

route::get('dang-nhap',[
'as'=>'dangnhap',
'uses'=>'PageController@getLogin'
]);


route::post('dang-nhap',[
'as'=>'dangnhap',
'uses'=>'PageController@postLogin'
]);

route::get('dang-ki',[
'as'=>'dangki',
'uses'=>'PageController@getSignup'
]);


route::post('dang-ki',[
'as'=>'dangki',
'uses'=>'PageController@postSignup'
]);

route::get('dang-xuat',[
'as'=>'dangxuat',
'uses'=>'PageController@getLogout'
]);

route::post('danh-gia/{id}',[
'as'=>'danhgia',
'uses'=>'PageController@postReview'
]);

route::get('tim-kiem',[
'as'=>'timkiem',
'uses'=>'PageController@getSearch'
]);

route::get('tin-tuc',[
'as'=>'tin',
'uses'=>'PageController@getNews'
]);

route::get('tin-tuc/tin-cong-nghe',[
'as'=>'tincongnghe',
'uses'=>'PageController@getTechNews'
]);

route::get('tin-tuc/tin-khuyen-mai',[
'as'=>'tinkhuyenmai',
'uses'=>'PageController@getSaleNews'
]);

route::get('doc-tin-tuc/{id}',[
'as'=>'doctintuc',
'uses'=>'PageController@getReadNews'
]);

route::get('trang-ca-nhan',[
'as'=>'trangcanhan',
'uses'=>'PageController@getInfoUser'
]);

route::get('quan-li-don-hang',[
'as'=>'quanlidonhang',
'uses'=>'PageController@getManageBill'
]);



route::get('loc-hd',[
'as'=>'lochoadon',
'uses'=>'PageController@checkBill'
]);

route::get('thong-bao',[
'as'=>'pagethongbao',
'uses'=>'PageController@getNotifiPage'
]);

route::get('huy-don-hang/{id}',[
'as'=>'huydonhang',
'uses'=>'PageController@getRemoveBill'
]);

route::get('lien-he',[
'as'=>'lienhe',
'uses'=>'PageController@getContacts'
]);




//at admin


route::get('administrator/xem-tin/{id}',[
	'as'=>'xemtin',
	'uses'=>'PageController@getReadNews'
]);

route::get('administrator/index',[
'as'=>'quantri',
'uses'=>'AdminPageController@getIndex'
]);

route::post('administrator/login',[
'as'=>'admin-dangnhap',
'uses'=>'AdminPageController@postLogin'
]);


route::group(['middleware'=>['web']],function(){

	route::get('administrator/don-hang',[
	'as'=>'donhang',
	'uses'=>'AdminPageController@getManageBill'
	]);

	route::get('administrator/chi-tiet-don-hang/{id}',[
	'as'=>'admin-chi-tiet-don-hang',
	'uses'=>'AdminPageController@getBillDetail'
	]);

	route::get('administrator/dang-xuat',[
	'as'=>'admin-dangxuat',
	'uses'=>'AdminPageController@getLogout'
	]);

	route::post('administrator/cap-nhat-don-hang/{id}',[
	'as'=>'capnhatdonhang',
	'uses'=>'AdminPageController@postUpdateBill'
	]);

	route::get('administrator/san-pham',[
	'as'=>'sanpham',
	'uses'=>'AdminPageController@showProduct'
	]);

	route::post('administrator/sap-xep-sp/}',[
	'as'=>'sapxepsp',
	'uses'=>'AdminPageController@sortProduct'
	]);
	
	route::get('administrator/them-san-pham',[
	'as'=>'themsanpham',
	'uses'=>'AdminPageController@getAddProduct'
	]);

	route::post('administrator/them-san-pham',[
	'as'=>'themsanpham',
	'uses'=>'AdminPageController@postAddProduct'
	]);

	route::get('administrator/sua-san-pham/{id}',[
	'as'=>'suasanpham',
	'uses'=>'AdminPageController@getUpdateProduct'
	]);

	route::post('administrator/sua-san-pham/{id}',[
	'as'=>'suasanpham',
	'uses'=>'AdminPageController@postUpdateProduct'
	]);

	route::get('administrator/xoa-san-pham/{id}',[
	'as'=>'xoasanpham',
	'uses'=>'AdminPageController@getDeleteProduct'
	]);

	route::get('administrator/tin-tuc',[
	'as'=>'tintuc',
	'uses'=>'AdminPageController@getNews'
	]);

	route::get('administrator/them-bai-viet',[
	'as'=>'thembaiviet',
	'uses'=>'AdminPageController@getAddNews'
	]);	

	route::post('administrator/them-bai-viet',[
	'as'=>'thembaiviet',
	'uses'=>'AdminPageController@postAddNews'
	]);

	route::get('administrator/sua-bai-viet/{id}',[
	'as'=>'suabaiviet',
	'uses'=>'AdminPageController@getUpdateNews'
	]);	

	route::post('administrator/sua-bai-viet/{id}',[
	'as'=>'suabaiviet',
	'uses'=>'AdminPageController@postUpdateNews'
	]);

	route::get('administrator/xoa-bai-viet/{id}',[
	'as'=>'xoabaiviet',
	'uses'=>'AdminPageController@getDeleteArticle'
	]);

	route::get('administrator/nguoi-dung',[
	'as'=>'nguoidung',
	'uses'=>'AdminPageController@getShowUsers'
	]);

	route::get('administrator/tim-kiem-sp',[
	'as'=>'timkiemsp',
	'uses'=>'AdminPageController@getSearchPro'
	]);

	route::get('administrator/thong-bao',[
	'as'=>'thongbao',
	'uses'=>'AdminPageController@getNotifi'
	]);
	
	route::get('administrator/them-thong-bao',[
	'as'=>'themthongbao',
	'uses'=>'AdminPageController@getAddNotifi'
	]);

	route::post('administrator/them-thong-bao',[
	'as'=>'themthongbao',
	'uses'=>'AdminPageController@postAddNotifi'
	]);

	route::get('administrator/ql-danh-muc',[
	'as'=>'ql-danhmuc',
	'uses'=>'AdminPageController@getCat'
	]);

	route::get('administrator/them-danh-muc',[
	'as'=>'themdanhmuc',
	'uses'=>'AdminPageController@addCat'
	]);

	route::get('administrator/ql-banner',[
	'as'=>'banner',
	'uses'=>'AdminPageController@getBanner'
	]);

	
	


	
	
	


	



		

	
});

