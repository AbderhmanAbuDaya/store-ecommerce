<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Http\Requests\GeneralProductRequest;
use App\Http\Requests\ProductImagesRequest;
use App\Http\Requests\ProductPriceRequest;
use App\Http\Requests\ProductStorHouseRequest;
use App\Models\Image;
use App\Models\Brand;

use App\Models\Category;
use App\Models\Product;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class ProductController extends Controller
{
    public function index(){
        $products=Product::orderBy('id','desc')->select('id','slug','price','created_at')->paginate(PAGENIATE_COUNT);
        return view('dashbord.products.general.index',compact('products'));
    }
    public function create(){
        $data=[];
        $data['brands']=Brand::active()->get();
        $data['tags']=Tag::get();
        $data['products']=Product::get();
         $data['categories']=Category::active()->select(['id'])->get();
        return view('dashbord.products.general.create')->with(['data'=>$data]);
    }

//    public  function  delete(Request  $request){
//        try {
//            $brand = Brand::find($request->id_brand);
//            // return $category;
//            if (!$brand):
//                return redirect()->route('admin.brands')->with(['error' => 'هذا الماركة غير موجود ']);
//            else:
//                $image_path ='assets/images/brands/'.$brand->photo;// Value is not URL but directory file path
//                if(File::exists($image_path)) {
//                    File::delete($image_path);
//                }
//                $brand->deleteTranslations();
//
//                if ($brand->delete()):
//                    return response()->json([
//                        'status' => true,
//                        'success' => 'تم الحذف',
//                        'id' => $request->id_brand,
//                        'count'=>Brand::count()
//                    ]);
//                else:
//                    return response()->json([
//                        'status' => true,
//                        'success' => 'لم يم الحذف',
//                        'id' => $request->id_brand,
//                    ]);
//                endif;
//
//            endif;
//        }catch (Exception $ex){
//            return redirect()->route('admin.brands')->with(['error'=>'حاول مرة اخرى']);
//        }
//
//
//    }
//
//
//    public function edit($id){
//        $brand=Brand::find($id);
//        if(empty($brand)):
//            return redirect()->back()->with(['error'=>'الماركة غير موجود']);
//        endif;
//
//        return view ('dashbord/brands/edit',compact(['brand']));
//    }
//
//    public function update(BrandsRequest $request){
//        try {
//            $brand=Brand::find($request->id);
//            if(empty($brand)):
//                return redirect()->route('admin.brands')->with(['error'=>'الماركة مش موجود']);
//            else:
//                DB::beginTransaction();
//
//                $fileName="";
//                if($request->has('photo')){
//                    $fileName=uploadImage('brands',$request->photo);
//                    $image_path ='assets/images/brands/'.$brand->photo;// Value is not URL but directory file path
//                    if(File::exists($image_path)) {
//                        File::delete($image_path);
//                    }
//                    Brand::where('id',$request->id)->update([
//                        'photo'=>$fileName
//
//                    ]);
//                }
//                $brand->update($request->except(['_token','id','name','photo']));
//                $brand->name=$request->name;
//
//                if($brand->save()):
//                    DB::commit();
//
//                    return redirect()->back()->with(['success'=>'تم تعديل العرض']) ;
//                endif;
//
//            endif;
//
//        }catch (Exception $ex){
//            return redirect()->route('admin.mainCategories')->with(['error'=>'حاول مرة اخرى']);
//        }
//
//    }
//
//
public function priceStore(ProductPriceRequest $request){
    try {
        $product=Product::find($request->input('id_product'));
        $product->update($request->except(['_token','id_product']));
        return redirect()->route('admin.products.general.create')->with(['success' => 'تم  اضافة للمنتج سعر','howActive'=>1]);

    }catch (\Exception $ex){
        return redirect()->route('admin.products')->with(['error' => 'حاول مرة اخرى']);

    }
    }
    public function addImagesInDatabase(ProductImagesRequest  $request){
        try {
            $documents=$request->document;
            $product=$request->input('id_product');
            foreach ($documents as $document){
                Image::create([
                    'product_id'=>$product,
                    'photo'=>$document
                ]);

            }

                return redirect()->route('admin.products.general.create')->with(['success' => 'تم اضافة الصور للمنتج','howActive'=>3]);
        }catch (\Exception $ex){
            return redirect()->route('admin.products');
        }

    }
    public function addImagesInFolder(Request  $request){
         $file=$request->file('dzfile');
         $fileName=uploadImage('products',$file);
         return response()->json([
            'name'=>$fileName,
            'original_name'=>$file->getClientOriginalName(),
         ]);
    }


    public function storeHouse(ProductStorHouseRequest  $request){
        try {
            $product=Product::find($request->input('id_product'));
            if ($request->input('manage_stock')==1){
                $product->update($request->except(['_token','id_product']));
            }else{
                $product->update($request->except(['_token','id_product','qty']));
                $product->qty=null;
                $product->save();

            }
            return redirect()->route('admin.products.general.create')->with(['success' => 'تم اضافة معلومات التخزين','howActive'=>2]);
        }catch (\Exception $ex){
            return redirect()->route('admin.products')->with(['error' => 'حاول مرة اخرى']);

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
    public function  store(GeneralProductRequest $request)
    {
try{


        DB::beginTransaction();
       $product=new Product();
       $product->name=$request->name;
       $product->description=$request->description;
       $product->short_description=$request->short_description;
       $product->slug=$request->slug;
       $product->brand_id=$request->brand_id;
       $product->is_active=$request->is_active;
       $product->price=0;
       $product->save();

        $product->categories()->attach($request->categories);
        $product->tags()->attach($request->tags);

        DB::commit();

        return redirect()->route("admin.products")->withInput($request->all())->with(['success' => 'تم  اضافة منتج جديد','howActive'=>0]);


}catch (Exception $ex){
    DB::rollback();
    return redirect()->route('admin.products.general.create')->with(['error' => 'حاول مرة اخرى']);

}


    }




}
