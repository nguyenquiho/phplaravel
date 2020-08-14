<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ProductType;
use App\ProductCategory;
use App\Cart;
use App\Bill;
use App\Customer;
use App\Notifi;
Use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('header',function($view){
            $productCategory = ProductCategory::all();
            $view->with('danhmuc',$productCategory);
        });

        view()->composer('header',function($view){
            $productType = ProductType::all();
            $view->with('loai_sp',$productType);
        });

        view()->composer('header',function($view){
            $notifi = Notifi::all();
            $view->with('notifi',$notifi);
        });
        
        view()->composer('header',function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
        });

        view()->composer('page.checkout',function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
        });


        view()->composer('administrator.manage-bill',function($view){
            $customer = Customer::all();
            $view->with('customer',$customer);
        });

        view()->composer('administrator.bill-detail',function($view){
            $bill = Bill::all();
            $view->with('bill',$bill);
        });


    }
}
