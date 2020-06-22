<?php

namespace App\Providers;
use App\TypeProduct;
use App\Cart;
use Illuminate\Support\ServiceProvider;
use Session;
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
            $loai_sp = TypeProduct::all();
            $view->with('loai_sp',$loai_sp);
        });
        view()->composer('header',function($view){
           if(Session('cart')){
               $oldCart= Session::get('cart');
               $cart= new Cart($oldCart);
               $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'
               =>$cart->totalPrice, 'totalQuantity'=>$cart->totalQuantity]);
           }
        });
    }
}
