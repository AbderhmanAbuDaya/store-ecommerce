<?php

use Illuminate\Support\Facades\Route;

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
Route::group(['namespace'=>'Dashbord','middleware'=>'auth:admin','prefix'=>'admin'],function(){

   Route::get('users',function(){
       return 'in admin';
   });
   Route::get('dashboard','DashboardController@index')->name('admin.dashboard');

});


Route::group(['namespace'=>'Dashbord','prefix'=>'admin','middleware'=>'guest:admin'],function(){
Route::get('login','LoginController@getLogin')->name('admin.login');
Route::post('login','LoginController@postLogin')->name('admin.post.login');
Route::get('logout','LoginController@logout')->name('logout.admin');
});

