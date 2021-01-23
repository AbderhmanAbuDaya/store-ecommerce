<?php

use App\Support\Storage\SessionStorage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::group(['namespace'=>'Site','middleware'=>['auth:web','VerifyCode']],function() {
          Route::get('profile',function (){
              return "u are authontaction";
          })->name('profile');


    });
    Route::group(['namespace'=>'Auth','middleware'=>['auth:web','redirectVerify']],function() {
        Route::post('verify-user','VerificationCodeController@verify')->name('verify user');
        Route::get('verify','VerificationCodeController@index')->name('get verify');


    });


    Route::group(['namespace'=>'site'],function() {
       /************************** Home ***********************/
        Route::get('/', 'HomeController@index');
        Route::get('/home', 'HomeController@index')->name('home');

        /************************** category product show ****************************/
        Route::get('/category/{slug}', 'CategoryController@productBySlug')->name('category');
        Route::get('/product/{slug}', 'ProductController@productBySlug')->name('product.details');


        /**
         *  Cart routes
         */
        Route::group(['prefix' => 'cart'], function () {
            Route::get('/', 'CartController@getIndex')->name('site.cart.index');
//            Route::get('/',function (){
//                $a= new \App\Http\Controllers\Site\CartController(new \App\Basket\Basket(new SessionStorage(),new \App\Models\Product()));
//                return $a->getIndex();
//            } )->name('site.cart.index');
            Route::post('/cart/add/{slug?}', 'CartController@postAdd')->name('site.cart.add');
            Route::post('/update/{slug}', 'CartController@postUpdate')->name('site.cart.update');
            Route::post('/update-all', 'CartController@postUpdateAll')->name('site.cart.update-all');
        });

    });

});

Route::group(['namespace' => 'Site', 'middleware' => 'auth'], function () {

    Route::post('wishlist', 'WishlistController@store')->name('wishlist.store');
    Route::delete('wishlist', 'WishlistController@destroy')->name('wishlist.destroy');
    Route::get('wishlist/products', 'WishlistController@index')->name('wishlist.products.index');
    Route::get('payment/{amount}', 'PaymentController@getPayments') -> name('payment');
    Route::post('payment', 'PaymentController@processPayment') -> name('payment.process');
});


Auth::routes();

Route::get('aaaa',function (Request $request){
    $r=\App\Models\Category::query();
     if($request->input('is_active')==1)
    $r->where('is_active',1);
    if($request->input('is_active')==0)
        $r->where('is_active',0);
    return $r->get();
});

