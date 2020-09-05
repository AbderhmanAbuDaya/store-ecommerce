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
Route::group(
   [
      'prefix' => LaravelLocalization::setLocale(),
      'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
   ], function(){

      Route::group(['namespace'=>'Dashbord','middleware'=>'auth:admin','prefix'=>'admin'],function(){

         Route::get('dashboard','DashboardController@index')->name('admin.dashboard');
         Route::group(['prefix'=>'dashboard/settings'],function(){
          Route::get('shipping-methods/{type}','SettingsController@editShippingMethods')->name('edite.shipping.method');
          Route::put('shipping-methods/{id}','SettingsController@updateShippingMethods')->name('update.shipping.method');

         });

          Route::group(['prefix'=>'dashboard/profile'],function(){
              Route::get('edite','ProfileController@editProfile')->name('edite.profile');
              Route::put('update','ProfileController@updateProfile')->name('update.profile');
              Route::put('update/password','ProfileController@updateProfilePassword')->name('update.profile.password');
              Route::post('checkPassword','ProfileController@checkPassword')->name('check.password');


          });
          Route::group(['prefix'=>'dashboard/main_categories/'],function (){

             Route::get('/{type}','MainCategoriesController@index')->name('admin.mainCategories');
             Route::get('create/{type}','MainCategoriesController@create')->name('admin.mainCategories.create');
             Route::post('store','MainCategoriesController@store')->name('admin.mainCategories.stroe');
             Route::get('edit/{id}/{type}','MainCategoriesController@edit')->name('admin.mainCategories.edit');
             Route::post('update/{id}','MainCategoriesController@update')->name('admin.mainCategories.update');
             Route::post('delete','MainCategoriesController@delete')->name('admin.mainCategories.delete');
             Route::post('changeStatus','MainCategoriesController@changeStatus')->name('admin.mainCategories.changeStatus');

          });

      });


      Route::group(['namespace'=>'Dashbord','prefix'=>'admin','middleware'=>'guest:admin'],function(){
      Route::get('login','LoginController@getLogin')->name('admin.login');
      Route::post('login','LoginController@postLogin')->name('admin.post.login');


      });
      Route::get('logout','Dashbord\LoginController@logout')->name('logout.admin');



   });
