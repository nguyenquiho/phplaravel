<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Bill;
use App\BillDetail;
use App\Customer;
use App\ProductCategory;
use App\ProductType;
use App\Product;
use App\NewsCategory;
use App\News;
use App\User;
use App\Notifi;
use App\Slide;
use Auth;
use Session;

class AdminPageController extends Controller
{
        public function getIndex(){
            return view('administrator.admin');
        }
        
        public function postLogin(Request $req){
        	$this->validate($req,[            
        		'username'=>'required',
        		'pass'=>'required'
        	],
        	[
        		'username.required'=>'Vui lòng nhập tên người dùng!',
        		'pass.required'=>'Vui lòng nhập mật khẩu!'
        	]
        );

        	$credentials = Admin::where('username',$req->username)->where('password',md5($req->pass ))->first();

        	if (($credentials)) {
        		Session::put('username',$credentials->full_name);
        			return redirect()->route('donhang');
        	}
        	else {
        		return redirect()->back()->with(['flag'=>'danger','mess'=>'Sai tài khoản hoặc mật khẩu!']);
        	}

        }

        public function getManageBill(){
        	$bill = Bill::paginate(9);
        	if(Session::has('username')){
        			return view('administrator.manage-bill',compact('bill'));
        		}
        		else{
        			return redirect()->route('quantri');
        		}
        	
        }

        public function getBillDetail($id){
        	$bill_detail = BillDetail::where('id_bill',$id)->get();
        	$product = Product::all();
        	if(Session::has('username')){
        			return view('administrator.bill-detail',compact('bill_detail','product','id'));
        		}
        		else{
        			return redirect()->route('quantri');
        		}
        	
        }

        public function postUpdateBill(Request $req,$id){
        	if(Session::has('username')){
        			$bill = Bill::where('id', $id)->update(['status'=>$req->status]);
        			return redirect()->back()->with('thongbao','Cập nhật thành công');
        		}
        		else{
        			return redirect()->route('quantri');
        		}
        }

        public function showProduct(){
        	if(Session::has('username')){
        		    $product = Product::paginate(10);
        			return view('administrator.product-list',compact('product'));
        		}
        		else{
        			return redirect()->route('quantri');
        		}

        	
        }

        
        public function getAddProduct(){
        	$danhmuc = ProductCategory::all();
        	$loai = ProductType::all();
        	if(Session::has('username')){
        			return view('administrator.add-product',compact('danhmuc','loai'));
        		}
        		else{
        			return redirect()->route('quantri');
        		}
        }


        //add new product
        public function postAddProduct(Request $req){
        	if(Session::has('username')){
            $this->validate($req,
                [
                    'product_code'=>'required',
                    'name'=>'required',
                    'type'=>'required',
                    'amount'=>'required',
                    'unit_price'=>'required',
                ],
                [
                    'product_code.required'=>'Vui lòng nhập mã sản phẩm!',
                    'name.required'=>'Vui lòng nhập tên sản phẩm!',
                    'type.required'=>'Vui lòng nhập danh mục!',
                    'amount.required'=>'Vui lòng nhập số lượng!',
                    'unit_price.required'=>'Vui lòng nhập giá!',
           		]);

        			$product = new Product;
        			$product->product_code = $req->product_code;
        			$product->name = $req->name;
        			$product->id_type = $req->type;
        			$product->amount = $req->amount;
        			$product->unit_price = $req->unit_price;
        			$product->promotion_price = $req->promotion_price;
        			$product->short_description = $req->short_description;
        			$product->full_description = $req->full_description;
        			if ($req->hasFile('image')) {
        				$file = $req->file('image');
        				if ($file->getClientOriginalExtension('image')=='jpg'||$file->getClientOriginalExtension('image')=='JPG'||$file->getClientOriginalExtension('image')=='png'||$file->getClientOriginalExtension('image')=='PNG') {
        					$filename = $file->getClientOriginalName('image');
        					$file->move('source/image/product',$filename);
        					$product->image = $filename;
        					$product->save();
        					return redirect()->back()->with(['flag'=>'success','message'=>'Thêm sản phẩm thành công!']);
        				}
        				else {
        						return redirect()->back()->with(['flag'=>'danger','message'=>'Phải là định dạng hình ảnh!']);
        					}
        			}
        			else  return redirect()->back()->with(['flag'=>'danger','message'=>'Chưa có hình đại diện!']);
        		}
        		else{
        			return redirect()->route('quantri');
        		}

        }

        // end add new product



        public function getUpdateProduct($id){
        	if(Session::has('username')){
        			$product = Product::where('id',$id)->first();
        			$danhmuc = ProductCategory::all();
        			$loai = ProductType::all();
        			return view('administrator.update-product',compact('product','danhmuc','loai','id'));
        		}
        		else{
        			return redirect()->route('quantri');
        		}
        	
        }


        // update Product
        public function postUpdateProduct($id,Request $req){
        	if(Session::has('username')){
            $this->validate($req,
                [
                    'product_code'=>'required',
                    'name'=>'required',
                    'type'=>'required',
                    'amount'=>'required',
                    'unit_price'=>'required',
                ],
                [
                    'product_code.required'=>'Vui lòng nhập mã sản phẩm!',
                    'name.required'=>'Vui lòng nhập tên sản phẩm!',
                    'type.required'=>'Vui lòng nhập danh mục!',
                    'amount.required'=>'Vui lòng nhập số lượng!',
                    'unit_price.required'=>'Vui lòng nhập giá!',
           		]);

        			if ($req->hasFile('image')) {
        				$file = $req->file('image');
        				if ($file->getClientOriginalExtension('image')=='jpg'||$file->getClientOriginalExtension('image')=='JPG'||$file->getClientOriginalExtension('image')=='png'||$file->getClientOriginalExtension('image')=='PNG') {
        					$filename = $file->getClientOriginalName('image');
        					$file->move('source/image/product',$filename);
        					$product = Product::where('id', $id)->update(['product_code'=>$req->product_code,'name'=>$req->name,'id_type'=>$req->type,'amount'=>$req->amount,'unit_price'=>$req->unit_price,'promotion_price'=>$req->promotion_price,'short_description'=>$req->short_description,'full_description'=> $req->full_description,'image'=>$filename]);

        					return redirect()->back()->with(['flag'=>'success','message'=>'Cập nhật sản phẩm thành công!']);
        				}
        				else {
        						return redirect()->back()->with(['flag'=>'danger','message'=>'Phải là định dạng hình ảnh!']);
        					}
        			}
        			else {
        				$product = Product::where('id', $id)->first();
        				$filename = $product->image;
        					$product = Product::where('id', $id)->update(['product_code'=>$req->product_code,'name'=>$req->name,'id_type'=>$req->type,'amount'=>$req->amount,'unit_price'=>$req->unit_price,'promotion_price'=>$req->promotion_price,'short_description'=>$req->short_description,'full_description'=> $req->full_description,'image'=>$filename]);

        					return redirect()->back()->with(['flag'=>'success','message'=>'Cập nhật sản phẩm thành công!']);
        			}
        		}
        		else{
        			return redirect()->route('quantri');
        		}

        	
        }  
        // end update product


        public function getDeleteProduct($id){
        	    if(Session::has('username')){
        			$product = Product::where('id',$id)->delete();
        			return redirect()->back();
        		}
        		else{
        			return redirect()->route('quantri');
        		}

        	
        }




        //show list News
        public function getNews(){
        	if(Session::has('username')){
        			$news = News::paginate(10);
        			return view('administrator.news',compact('news'));
        		}
        		else{
        			return redirect()->route('quantri');
        		}

        }

        public function getAddNews(){
        	    if(Session::has('username')){
        			$news_cat = NewsCategory::all();
        			$news = News::all();
        			return view('administrator.add-article',compact('news','news_cat'));
        		}
        		else{
        			return redirect()->route('quantri');
        		}
        	
        }

        public function postAddNews(Request $req){
        	if(Session::has('username')){
            $this->validate($req,
                [
                    'title'=>'required',
                    'type'=>'required',
                    'image'=>'required',
                    'content'=>'required',
                ],
                [
                    'title.required'=>'Vui lòng nhập tiêu đề!',
                    'type.required'=>'Vui lòng chọn thể loại!',
                    'image.required'=>'Vui lòng nhập chọn hình ảnh!',
                    'content.required'=>'Vui lòng nhập nội dung!',
           		]);

        			$news = new News;
        			$news->title = $req->title;
        			$news->id_cat = $req->type;
        			$news->content = $req->content;
        			$news->status = 1;
        			$news->views = 0;
        			$news->created_by = Session('username');

        			if ($req->hasFile('image')) {
        				$file = $req->file('image');
        				if ($file->getClientOriginalExtension('image')=='jpg'||$file->getClientOriginalExtension('image')=='JPG'||$file->getClientOriginalExtension('image')=='png'||$file->getClientOriginalExtension('image')=='PNG') {
        					$filename = $file->getClientOriginalName('image');
        					$file->move('source/image/news',$filename);
        					$news->image = $filename;
        					$news->save();
        					return redirect()->back()->with(['flag'=>'success','message'=>'Thêm bài viết thành công!']);
        				}
        				else {
        						return redirect()->back()->with(['flag'=>'danger','message'=>'Phải là định dạng hình ảnh!']);
        					}
        			}
        			else  return redirect()->back()->with(['flag'=>'danger','message'=>'Chưa có hình đại diện!']);
        		}
        		else{
        			return redirect()->route('quantri');
        		}

        }

        public function getUpdateNews($id){
        	    if(Session::has('username')){
        	    $news_cat = NewsCategory::all();
        		$news = News::where('id',$id)->first();

        		return view('administrator.update-article',compact('news_cat','news'));
        		}
        		else{
        			return redirect()->route('quantri');
        		}
        }

        public function postUpdateNews(Request $req, $id){
					if(Session::has('username')){
            	$this->validate($req,
                [
                    'title'=>'required',
                    'type'=>'required',
                    'image'=>'required',
                    'content'=>'required',
                ],
                [
                    'title.required'=>'Vui lòng nhập tiêu đề!',
                    'type.required'=>'Vui lòng chọn thể loại!',
                    'image.required'=>'Vui lòng nhập chọn hình ảnh!',
                    'content.required'=>'Vui lòng nhập nội dung!',
           		]);

        			if ($req->hasFile('image')) {
        				$file = $req->file('image');
        				if ($file->getClientOriginalExtension('image')=='jpg'||$file->getClientOriginalExtension('image')=='JPG'||$file->getClientOriginalExtension('image')=='png'||$file->getClientOriginalExtension('image')=='PNG') {
        					$filename = $file->getClientOriginalName('image');
        					$file->move('source/image/product',$filename);
        					$news = News::where('id', $id)->update(['title'=>$req->title,'id_cat'=>$req->type,'content'=>$req->content,'image'=>$filename]);

        					return redirect()->back()->with(['flag'=>'success','message'=>'Cập nhật bài viết thành công!']);
        				}
        				else {
        						return redirect()->back()->with(['flag'=>'danger','message'=>'Phải là định dạng hình ảnh!']);
        					}
        			}
        			else {
        				$product = Product::where('id', $id)->first();
        				$filename = $product->image;
        					$news = News::where('id', $id)->update(['title'=>$req->title,'id_cat'=>$req->type,'content'=>$req->content,'image'=>$filename]);

        					return redirect()->back()->with(['flag'=>'success','message'=>'Cập nhật bài viết thành công!']);
        			}
        		}
        		else{
        			return redirect()->route('quantri');
        		}

        }

        public function getDeleteArticle($id){

        	$news = News::where('id',$id)->delete();
        	return redirect()->back();
        }

        public function getShowUsers(){
        	$admin = Admin::all();
        	$users = User::all();
        	return view('administrator.user',compact('users','admin'));
        }


        
        public function getLogout(){
        	$username = Session::get('fullname');
            Session::flush();
            return redirect()->route('quantri');
        }

        public function sortProduct(Request $req){
            if ($req->by=="id") {
                $product = Product::orderby('id','asc')->paginate(10);
                return view('administrator.product-list',compact('product'));
            }
            else if ($req->by == "name") {
                $product = Product::orderby('name','asc')->paginate(10);
                return view('administrator.product-list',compact('product'));
            }
            else {
                $product = Product::orderby('unit_price','asc')->paginate(10);
                return view('administrator.product-list',compact('product'));
            }
        }


        public function getSearchPro(Request $req){
            $productS = Product::where('name','like','%'.$req->search_pro.'%')->get();
            return view('administrator.search_pro',compact('productS'));
        }

        public function getNotifi(){
            $notifi = Notifi::all();
            return view('administrator.notifi',compact('notifi'));
        }

        public function getAddNotifi(){
            $notifi = Notifi::all();
            return view('administrator.add-notifi',compact('notifi'));
        }

        public function postAddNotifi(Request $req){
            if(Session::has('username')){
            $this->validate($req,
                [
                    'title'=>'required',
                    'content'=>'required',
                ],
                [
                    'title.required'=>'Vui lòng nhập tiêu đề!',
                    'content.required'=>'Vui lòng nhập nội dung!',
                ]);

                    $notifi = new Notifi;
                    $notifi->title = $req->title;
                    $notifi->content = $req->content;
                    $notifi->save();
                    return redirect()->back()->with(['flag'=>'success','message'=>'Thêm thông báo thành công!']);
                }
                else{
                    return redirect()->route('quantri');
                }
        }

        public function getCat(){
            if(Session::has('username')){
                    $type = ProductType::paginate(10);
                    $cat = ProductCategory::all();
                    return view('administrator.cat',compact('type','cat'));
                }
                else{
                    return redirect()->route('quantri');
                }
        }

        public function addCat(){
            if(Session::has('username')){
                    $type = ProductType::paginate(10);
                    $cat = ProductCategory::all();
                    return view('administrator.add-cat',compact('type','cat'));
                }
                else{
                    return redirect()->route('quantri');
                }
        }
        
        public function getBanner(){
            if(Session::has('username')){
                    $slide = Slide::paginate(10);
                    return view('administrator.banner',compact('slide'));
                }
                else{
                    return redirect()->route('quantri');
                }
        }
        
        
        




}
