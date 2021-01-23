<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productBySlug($slug){

       $data=[];
       $data['product']=Product::where('slug',$slug)->first();
       $product_id=$data['product']->id;
       $product_categories_id=$data['product']->categories->pluck('id');
       $data['product_attributes']=Attribute::whereHas('options',function ($q) use($product_id){
           $q->whereHas('product',function ($qq) use ($product_id){
              $qq->where('product_id',$product_id);
           });
        })->get();

       $data['related_products']=Product::whereHas('categories',function ($q) use($product_categories_id){
           $q->whereIn('category_id',$product_categories_id);
       })->where('id','!=',$product_id)->limit(20)->latest()->get();
//     return count($data['related_products']);
           return view('front.products-details',$data);

    }
}
