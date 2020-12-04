<?php

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

          Route::group(['prefix'=>'dashboard/brands/'],function (){

              Route::get('/','brandsController@index')->name('admin.brands');
              Route::get('create','brandsController@create')->name('admin.brands.create');
              Route::post('store','brandsController@store')->name('admin.brands.stroe');
              Route::get('edit/{id}','brandsController@edit')->name('admin.brands.edit');
              Route::post('update','brandsController@update')->name('admin.brands.update');
              Route::post('delete','brandsController@delete')->name('admin.brands.delete');
              Route::post('changeStatus','brandsController@changeStatus')->name('admin.brands.changeStatus');

          });

          Route::group(['prefix'=>'dashboard/tags/'],function (){

              Route::get('/','TagController@index')->name('admin.tags');
              Route::get('create','TagController@create')->name('admin.tags.create');
              Route::post('store','TagController@store')->name('admin.tags.stroe');
              Route::get('edit/{id}','TagController@edit')->name('admin.tags.edit');
              Route::post('update','TagController@update')->name('admin.tags.update');
              Route::post('delete','TagController@delete')->name('admin.tags.delete');

          });
          Route::group(['prefix'=>'dashboard/products/'],function (){

              Route::get('','ProductController@index')->name('admin.products');
              Route::post('changeStatus','ProductController@changeStatus')->name('admin.products.general.changeStatus');
              Route::post('delete','ProductController@delete')->name('admin.products.delete');
              Route::get('edit/{id}','ProductController@edit')->name('admin.products.price.edit');
              Route::post('update','ProductController@update')->name('admin.products.update');

              /*############################################################################*/
              Route::get('general-information','ProductController@create')->name('admin.products.general.create');
              Route::post('general-information','ProductController@store')->name('admin.products.general.store');
              /*############################################################################*/
              Route::post('storeHouse','ProductController@storeHouse')->name('admin.products.storeHouse');
              /*###################################################################################*/
              Route::get('create','ProductController@create')->name('admin.products.create');
              Route::post('price','ProductController@priceStore')->name('admin.products.price.store');
              /*###################################################################################*/
              Route::post('images/folder','ProductController@addImagesInFolder')->name('admin.products.images');
              Route::post('images/database','ProductController@addImagesInDatabase')->name('admin.products.images.database');
              /*###################################################################################*/

              Route::group(['prefix'=>'dashboard/attributes/'],function (){

                  Route::get('/','AttributeController@index')->name('admin.products.attributes');
                  Route::get('create','AttributeController@create')->name('admin.products.attributes.create');
                  Route::post('store','AttributeController@store')->name('admin.products.attributes.stroe');
                  Route::get('edit/{id}','AttributeController@edit')->name('admin.products.attributes.edit');
                  Route::post('update','AttributeController@update')->name('admin.products.attributes.update');
                  Route::post('delete','AttributeController@delete')->name('admin.products.attributes.delete');
                  Route::post('changeStatus','AttributeController@changeStatus')->name('admin.products.attributes.changeStatus');

              });
              /*##################################################################################*/
              /*###################################################################################*/

              Route::group(['prefix'=>'dashboard/attributes/options'],function (){

                  Route::get('/','OptionController@index')->name('admin.products.options');
                  Route::get('create','OptionController@create')->name('admin.products.options.create');
                  Route::post('store','OptionController@store')->name('admin.products.options.store');
                  Route::get('edit/{id}','OptionController@edit')->name('admin.products.options.edit');
                  Route::post('update','OptionController@update')->name('admin.products.options.update');
                  Route::post('delete','OptionController@delete')->name('admin.products.options.delete');
                  Route::post('changeStatus','OptionController@changeStatus')->name('admin.products.options.changeStatus');

              });


              /*##################################################################################*/
              Route::get('general-information/{id}',function ($id){
//                  return "aa";
                  return redirect()->route('admin.products.general.create')->with(['howActive'=>$id]);
              })->name('redirectRequest');

          });
          /*##################################################################################*/
          Route::group(['prefix'=>'sliders'],function (){
              Route::get('/','SliderController@addImages')->name('admin.sliders.create');
              Route::post('images','SliderController@saveSliderImages')->name('admin.sliders.images.store');
              Route::post('images/database','SliderController@saveSliderImagesDB')->name('admin.sliders.images.store.db');
          });
          /*##################################################################################*/



      });


      Route::group(['namespace'=>'Dashbord','prefix'=>'admin','middleware'=>'guest:admin'],function(){
      Route::get('login','LoginController@getLogin')->name('admin.login');
      Route::post('login','LoginController@postLogin')->name('admin.post.login');


      });
      Route::get('logout-admin','Dashbord\LoginController@logout')->name('logout.admin');



   });
