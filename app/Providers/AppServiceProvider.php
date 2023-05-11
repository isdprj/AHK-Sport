<?php

namespace App\Providers;

use App\Models\Cart;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\ProductCategory;
use Illuminate\Support\ServiceProvider;
use App\Models\Favourite;
use App\Models\Menu;

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
        view()->composer('header', function($view){
            $shoeType = ProductCategory::get()->sortBy('id')->take(5);
            $ultiType = ProductCategory::get()->sortByDesc('id')->take(5);
            $favouriteNumber = Favourite::get('id');

            $view->with([
                'shoeType' => $shoeType,
                'ultiType' => $ultiType,
                'favouriteNumber' => $favouriteNumber
            ]);
        });
        view()->composer(['header','page.checkout'],function($view){
            if(Session('cart')){
                $oldCart = session()->get('cart');
                $cart = new Cart($oldCart);
                $view->with([
                'cart'=>session()->get('cart'),
                'product_cart'=>$cart->items,
                'totalPrice'=>$cart->totalPrc,
                'totalQty'=>$cart->totalQty]);
            }
        });   
        view()->composer('admin.sidebar', function($view){
            $menus = Menu::get()->sortBy('id');
            $view->with(['menus' => $menus]);

        });     
    }
}
