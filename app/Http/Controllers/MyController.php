<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function XinChao(){
    	echo "Đã tạo Controller 1";
    }

    public function Hello(){
    	echo "Đây là Controller Hello";
    }

    public function GetURL(Request $request){
		// if($request->isMethod('post'))
		// 	echo "Đây là phương thức POST";
		// else echo "Đây không phải là phương thức POST";
		if($request->is('MyReq*'))
			echo "Có chuỗi";
		else echo "Không có chuỗi";
    }

    public function GoiHam(Request $request){
    	return $request->path();
    }

    public function GoiHamABC(Request $request){
    	if($request->is('Ham/*'))
    		echo "Có chữ Ham";
    	else echo "Không có chữ Ham";
    }

    public function postForm(Request $request){
    	if($request->has('HoTens'))
    		echo "Có tham số";
    	else echo "Không có tham số";
    }
}
