<?php

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
    Route::get('/','Site\HomeController@index');
    Route::get('/home', 'Site\HomeController@index')->name('home');
    Route::group(['namespace'=>'Site','middleware'=>['auth:web','VerifyCode']],function() {
          Route::get('profile',function (){
              return "u are authontaction";
          })->name('profile');


    });
    Route::group(['namespace'=>'Auth','middleware'=>['auth:web','redirectVerify']],function() {
        Route::post('verify-user','VerificationCodeController@verify')->name('verify user');
        Route::get('verify','VerificationCodeController@index')->name('get verify');


    });





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
