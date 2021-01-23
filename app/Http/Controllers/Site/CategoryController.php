<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function productBySlug($slug){

       $data=[];
       $data['category']=Category::where('slug',$slug)->first();
       if($data['category'])
           $data['products']=$data['category']->products;
     //  return Product::with('images')->find(511);
           return view('front.products',$data);

    }
}
