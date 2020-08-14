<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductCategory;
use App\ProductType;
use App\Cart;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use App\News;
use App\Review;
use App\DiscountCode;
use App\Notifi;
use Hash;
use Auth;
use Session;
use Carbon\Carbon;
Carbon::setLocale('vi'); // hiển thị ngôn ngữ tiếng việt.

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    
    public function getIndex(){
        $slide = Slide::where('status',1)->get();
        $tech_news = News::where('id_cat',1)->paginate(5);
        $sale_news = News::where('id_cat',2)->paginate(5);
        
        $new_product = Product::where('new',1)->paginate(6);
        $sale_product = Product::where('promotion_price','<>',0)->paginate(6); 
        return view('page.home',compact('slide','new_product','sale_product','tech_news','sale_news'));
    }

        public function getProductType($type){
        $sp_theoloai = Product::where('id_type',$type)->paginate(12);
        $loai = ProductType::where('id',$type)->first();
        $danhmuc = ProductCategory::where('id',$loai->category_id)->get();
        return view('page.product_type',compact('sp_theoloai','loai','danhmuc'));
    }
    
        public function getProductCategory($cat){
        $danhmuc = ProductCategory::where('id',$cat)->first();
        $loai_theodm = ProductType::where('category_id',$cat)->get();
        $sanpham = Product::paginate(16);
        return view('page.product_category',compact('loai_theodm','danhmuc','sanpham'));
    }



        public function getProductDetail(Request $req){
        $sanpham = Product::where('id',$req->id)->first();
        $loai = ProductType::where('id',$sanpham->id_type)->first();
        $danhmuc = ProductCategory::where('id',$loai->category_id)->get();
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(6);
        $new_product = Product::where('new',1)->paginate(8);
        $reviews = Review::where('id_product',$req->id)
        ->orderBy('created_at','desc')
        ->get();
        $user = User::all();
        $best_seller = BillDetail::groupBy('id_product')
                     ->orderByRaw('SUM(quantity) desc')
                     ->limit(5)
                     ->pluck('id_product');
        $all_sanpham = Product::all();
    	return view('page.product_detail',compact('sanpham','sp_tuongtu','loai','danhmuc','new_product','reviews','user','best_seller','all_sanpham'));
    }
        public function getContact(){
    	return view('page.contact');
    }

    	public function getGioiThieu(){
    	return view('page.about');
    }

        public function getAddtoCart(Request $req,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        if ($req->quantity) {
            $quan = $req->quantity;
        }
        else{
            $quan = 1;
        }
        $cart->add($product,$id,$quan);
        $req->session()->put('cart',$cart);
        return redirect()->back();

    }
        public function getDelItemCart($id){
            $oldCart = Session::has('cart')?Session::get('cart'):null;
            $cart = new Cart($oldCart);
            $cart->removeItem($id);
            if(count($cart->items)>0){
                Session::put('cart',$cart);
            }
            else{
                Session::forget('cart');
            }
            
            return redirect()->back();
        }

        public function getCheckout(){
            return view('page.checkout');
        }

        public function postCheckout(Request $req){
            $cart = Session::get('cart');
            //dd($cart);
            //Lưu thông tin khách hàng
            $customer = new Customer;
            $customer->name = $req->name;
            $customer->gender = $req->gender;
            $customer->email = $req->email;
            $customer->address = $req->address;
            $customer->phone_number = $req->phone;
            $customer->note = $req->notes;
            $customer->save();

            //Lưu thông tin đơn hàng
            $bill = new Bill;
            $bill->bill_code = "TS00000".$customer->id;
            $bill->status = 0;
            $bill->id_customer = $customer->id;
            $bill->date_order = date('Y-m-d');
            if ($req->code != null) {
                $count = DiscountCode::where('code',$req->code)->count();
                if ($count > 0) {
                    $code = DiscountCode::where('code',$req->code)->first();
                    $bill->total = $cart->totalPrice-($cart->totalPrice*$code->percent/100);
                    $bill->discount = $code->percent;
                }
                else{
                    return redirect()->back()->with(['flag'=>'danger','message'=>'Mã giảm giá không tồn tại hoặc đã hết hạn']);
                }
            }
            else{
                    $bill->total = $cart->totalPrice;
            }
            
            
            $bill->payment = $req->payment;
            $bill->note = $req->notes;
            $bill->save();

            //Lưu thông tin chi tiết hoá đơn
            
            foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
            }
            
            Session::forget('cart');
            return redirect()->back()->with('thongbao','Đặt hàng thành công!');
        }

        public function getLogin(){
            return view('page.login');
        }

        public function getSignup(){
            return view('page.signup');
        }

        public function postLogin(Request $req){
            $this->validate($req,
                [
                    'email'=>'required|email',
                    'pass'=>'required'
                ],
                [
                    'email.required'=>'Vui lòng nhập email',
                    'email.email'=>'Không đúng định dạng email',
                    'pass.required'=>'Vui lòng nhập mật khẩu',
                ]

            );

            $credentials = array('email'=>$req->email,'password'=>$req->pass);

            if (Auth::attempt($credentials)) {
                return redirect()->route('trang-chu');
            }
            else {
                return redirect()->back()->with(['flag'=>'danger','message'=>'Sai tài khoản hoặc mật khẩu!']);
            }
        }

        public function postSignup(Request $req){
            $this->validate($req,
                [
                    'email'=>'required|email|unique:users,email',
                    'pass'=>'required|min:6|max:20',
                    'name'=>'required',
                    'repass'=>'required|same:pass'

                ],
                [
                    'email.required'=>'Vui lòng nhập email!',
                    'email.email'=>'Không đúng định dạng Email!',
                    'email.unique'=>'Email đã có người sử dụng!',
                    'pass.required'=>'Vui lòng nhập mật khẩu!',
                    'repass.same'=>'Mật khẩu không khớp!',
                    'pass.min'=>'Mật khẩu ít nhất 6 kí tự!',
                    'pass.max'=>'Mật khẩu không quá 20 kí tự'
            ]);
            
            $user = new User;
            $user->full_name = $req->name;
            $user->email = $req->email;
            $user->address = $req->address;
            $user->password = Hash::make($req->pass);
            $user->phone = $req->phone;
            $user->save();
            return redirect()->back()->with('thanhcong','Đăng kí tài khoản thành công!');
        }


        public function getLogout(){
            Auth::logout();
            return redirect()->route('trang-chu');
        }

        public function getSearch(Request $req){
            $product = Product::where('name','like','%'.$req->key.'%')->get();
            return view('page.search',compact('product'));
        }

        public function postReview(Request $req, $id){
            if(Auth::check()){
                $id_user = Auth::user()->id;
            }
            $review = new Review;
            $review->id_user = $id_user;
            $review->id_product = $id;
            $review->content = $req->review;    
            $review->save();
            return redirect()->back();

        }
       
        public function getTechNews(){
            $tincn = News::where('status',1)
                        ->where('id_cat',1)
                        ->get();
            return view('page.tech_news',compact('tincn'));
        }

        public function getNews(){
            $tin = News::where('status',1)->paginate(10);
            return view('page.news',compact('tin'));
        }
        
        public function getSaleNews(){
            $tinkm = News::where('status',1)
                        ->where('id_cat',2)
                        ->get();
            return view('page.sale_news',compact('tinkm'));
        }

        public function getInfoUser(){
            if(Auth::check()){
                return view('page.info_user');
            }

            
        }
        
        public function getManageBill(){
            if(Auth::check()){
                $mail = Auth::user()->email;
            }
                $customer = Customer::where('email',$mail)->get();
                $bill = Bill::where('status',0)->get();
                $billde = BillDetail::all();
                $product = Product::all();
                return view('page.bill',compact('customer','bill','billde','product'));
        }

        public function getReadNews($id){
                $news = News::where('id',$id)->first();
                return view('page.read_news',compact('news'));
        }

        public function checkBill(Request $req){
            if(Auth::check()){
                $mail = Auth::user()->email;
            }
                $customer = Customer::where('email',$mail)->get();
                if ($req->status == 0) {
                $bill = Bill::where('status',0)->get();
                $billde = BillDetail::all();
                $product = Product::all();
                return view('page.bill',compact('customer','bill','billde','product'));
                }
                elseif ($req->status == 1) {
                $bill = Bill::where('status',1)->get();
                $billde = BillDetail::all();
                $product = Product::all();
                return view('page.bill',compact('customer','bill','billde','product'));
                }
                else{
                $bill = Bill::where('status',2)->get();
                $billde = BillDetail::all();
                $product = Product::all();
                return view('page.bill',compact('customer','bill','billde','product'));
                }
                
        }

        public function getNotifiPage(){
            $notifi = Notifi::all();
            return view('page.notifi',compact('notifi'));
        }
            
        public function getRemoveBill($id){
            Bill::where('id',$id)->delete();
            return redirect()->back();
        }

        public function getContacts(){
            
            return view('page.contacts');
        }
        
            
            

            // at admin



}
