<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandsRequest;
use App\Http\Requests\MainCategotyRequest;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use DB;

class BrandsController extends Controller
{
  public function index(){
      $brands=Brand::orderBy('id','desc')->paginate(PAGENIATE_COUNT)->makeVisible('translations');
      return view('dashbord.brands.index',compact('brands'));
  }
  public function create(){
        return view('dashbord.brands.create');
  }
    public  function  delete(Request  $request){
        try {
            $brand = Brand::find($request->id_brand);
            // return $category;
            if (!$brand):
                return redirect()->route('admin.brands')->with(['error' => 'هذا الماركة غير موجود ']);
            else:

                if ($brand->delete()):
                    return response()->json([
                        'status' => true,
                        'success' => 'تم الحذف',
                        'id' => $request->id_brand,

                    ]);
                else:
                    return response()->json([
                        'status' => true,
                        'success' => 'لم يم الحذف',
                        'id' => $request->id_brand,
                    ]);
                endif;

            endif;
        }catch (Exception $ex){
            return redirect()->route('admin.brands')->with(['error'=>'حاول مرة اخرى']);
        }


    }




    public  function changeStatus(Request  $request){

        $brand=  Brand::find($request->id_brand);
        if(!empty($brand)):

            if($brand->is_active=='active'):
                $brand->update([
                    'is_active'=>false
                ]);
            else:
                $brand->update([
                    'is_active'=>true
                ]);
            endif;

            return response()->json([
                'status'=>true,
                'success'=>'تم التعديل',
                'id'=>$request->id_brand,
                'msg'=>($brand->is_active=='active')?'الغاء تفعيل':'تفعيل',
                'msgstatus'=>$brand->is_active,

            ]);
        endif;

    }

    public function  store(BrandsRequest $request)
    {

            DB::beginTransaction();
            $fileName="";
            if($request->has('photo')){
                $fileName=uploadImage('brands',$request->photo);
            }
            $brand=Brand::create($request->except(['_token','photo']));

            $brand->photo=$fileName;
        $brand->name=$request->name;
            $brand->save();
            DB::commit();

            return redirect()->route("admin.brands.create")->withInput($request->all())->with(['success' => 'تم اضافة الماركة']);




            DB::rollback();
            return redirect()->route('admin.brands.create')->with(['error' => 'حاول مرة اخرى']);

    }



}
