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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    $category=  \App\Models\Category::find(2);
   $category->makeVisible(['translations']);
   return $category;

});


Route::get('search/{search}', function ($search) {
    return $search;
})->where('search', '[1-3]');




Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();


Route::get('/test/env', function () {
    dd(env('DB_DATABASE')); // dump db variable value one by one
});
