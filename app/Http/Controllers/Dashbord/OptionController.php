<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Http\Requests\GeneralProductRequest;
use App\Http\Requests\OptionRequest;
use App\Http\Requests\ProductImagesRequest;
use App\Http\Requests\ProductPriceRequest;
use App\Http\Requests\ProductStorHouseRequest;
use App\Models\Attribute;
use App\Models\Image;
use App\Models\Brand;

use App\Models\Category;
use App\Models\Option;
use App\Models\Product;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class OptionController extends Controller
{
    public function index(){
        $options=Option::orderBy('id','desc')->with(['product'=>function($product){
            $product->select('id');
        },'attribute'=>function($attribute){
          $attribute->select('id');
      }])->select('id','product_id','attribute_id','price','created_at')->paginate(PAGENIATE_COUNT);

        return view('dashbord.options.index',compact('options'));
    }
    public function create(){
        $data=[];
        $data['products']=Product::active()->with('translation')->select('id')->get();
        $data['attributes']=Attribute::get();

        return view('dashbord.options.create')->with(['data'=>$data]);
    }

    public function edit($id){
        $option=Option::find($id);
        $data=[];
        $data['products']=Product::active()->with('translation')->select('id')->get();
        $data['attributes']=Attribute::get();
        if(empty($option)):
            return redirect()->route('admin.products.options')->with(['error'=>'قيمة الخاصية غير موجود']);
        endif;

        return view ('dashbord/options/edit',compact(['option']))->with(['data'=>$data]);
    }
    public function update(OptionRequest $request){
        try {
            
            $option=Option::find($request->id);
            if(empty($option)):
                return redirect()->route('admin.products.options')->with(['error'=>'قيمة الخاصية مش موجودة']);
            else:
                DB::beginTransaction();



                $option->update($request->except(['_token','id','name']));
                $option->name=$request->name;

                if($option->save()):
                    DB::commit();

                    return redirect()->route('admin.products.options')->with(['success'=>'تم تعديل قيمة الخاصية']) ;
                endif;

            endif;

        }catch (Exception $ex){
            return redirect()->route('admin.mainCategories')->with(['error'=>'حاول مرة اخرى']);
        }

    }

    public  function changeStatus(Request  $request){

        $product=  Product::find($request->id_product);
//        return response()->json([
//            'aaa'=>$product
//        ]);
        if(!empty($product)):

            if($product->is_active=='active'):

                $product->update([
                    'is_active'=>false
                ]);
               $product->save();
            else:

                $product->update([
                    'is_active'=>true
                ]);
                return response()->json([
                    'eee'=>$product
                ]);
            endif;

            return response()->json([
                'status'=>true,
                'success'=>'تم التعديل',
                'id'=>$request->id_product,
                'msg'=>($product->is_active=='active')?'الغاء تفعيل':'تفعيل',
                'msgstatus'=>$product->is_active,

            ]);
        endif;

    }
//
    public function  store(OptionRequest $request)
    {
try{

//  return $request;
        DB::beginTransaction();

       $option=Option::create($request->except(['_token']));

    $option->name=$request->name;

       $option->save();

        DB::commit();

        return redirect()->route("admin.products.options.create")->withInput($request->all())->with(['success' => 'تم  اضافة قيمة جديد','howActive'=>0]);


}catch (Exception $ex){
    DB::rollback();
    return redirect()->route('admin.products.options')->with(['error' => 'حاول مرة اخرى']);

}


    }




}
