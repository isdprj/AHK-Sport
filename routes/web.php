<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SocialAccountController;
use App\Http\Controllers\Admin\User\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;

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

Route::get('/', function () {
    return redirect()->route('index');
});

Route::get('index', [PageController::class,'getIndex'])->name('index');

Route::get('ultility', [PageController::class,'getProductUltility'])-> name('ultility'); 

Route::get('shoes', [PageController::class,'getProductShoes'])-> name('shoes'); 

Route::get('product_categories/{type}', [PageController::class,'getProductCategory'])-> name('product_categories'); 

Route::get('product/{id}', [PageController::class,'getProduct'])->name('product');

Route::get('contact', [PageController::class,'getContact'])->name('contact');

Route::get('about', [PageController::class,'getAbout'])-> name('about');

Route::get('login', [PageController::class, 'getLogin']) -> name('login');


Route::get('login/{social}',[SocialAccountController::class, 'redirectToProvider'])->name('login');

Route::get('login/{social}/callback',[SocialAccountController::class, 'handleProviderCallback'])->name('login');

Route::get('register', [PageController::class,'getRegister'])->name('register');

Route::post('register',[PageController::class,'postRegister'])->name('register');

Route::post('login', [PageController::class, 'postLogin']) -> name('login');

Route::get('logout', [PageController::class, 'getLogout']) -> name('logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])
                ->middleware('guest')
                ->name('password.email');

Route::get('reset-password/{token}', [ResetPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('password.reset');

Route::post('reset-password', [ResetPasswordController::class, 'store'])
                ->middleware('guest');
                
Route::get('account',[PageController::class,'getAccount'])->name('account');
Route::get('cart/{id}', [PageController::class, 'addCart'])->name('cart');

Route::get('del-cart/{id}',[PageController::class, 'delCart'])->name('del-cart');

Route::get('like/{id}',[PageController::class, 'like'])->name('like');

Route::get('unlike/{id}',[PageController::class, 'unlike'])->name('unlike');

Route::get('favourite',[PageController::class, 'getFavourite'])->name('favourite');

Route::get('search',[PageController::class, 'getSearch'])->name('search');

Route::get('checkout',[PageController::class,'getCheckout'])->name('checkout');

Route::post('checkout',[PageController::class,'postCheckout'])->name('checkout');

Route::get('admin/users/login', [LoginController::class, 'index']);

Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::middleware(['auth', 'admin'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);
        Route::get('logout', [MainController::class, 'getLogout'])->name('adminlogout');

        #Menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
        });

        #Product
        Route::prefix('products')->group(function () {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);
        });

        Route::prefix('users')->group(function(){
            Route::get('list', [UserController::class, 'index']);
            Route::get('edit/{id}', [UserController::class, 'show']);
        });

        Route::prefix('orders')->group(function(){
            Route::get('list', [OrderController::class, 'index']);
            Route::get('detail/{id}',[OrderController::class,'show']);
        });
    });
});

Route::get('order',[PageController::class,'getOrder'])->name('order');
Route::get('cancel/{id}',[PageController::class,'getCancel'])->name('cancel');
Route::get('detail/{id}',[PageController::class,'getDetail'])->name('detail');
