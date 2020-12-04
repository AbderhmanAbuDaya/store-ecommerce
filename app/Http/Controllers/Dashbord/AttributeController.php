<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;
use App\Http\Requests\BrandsRequest;
use App\Http\Requests\MainCategotyRequest;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use mysql_xdevapi\Exception;

class AttributeController extends Controller
{
  public function index(){
      $attributes=Attribute::orderBy('id','desc')->paginate(PAGENIATE_COUNT)->makeVisible('translations');
      return view('dashbord.attributes.index',compact('attributes'));
  }
  public function create(){
        return view('dashbord.attributes.create');
  }
    public  function  delete(Request  $request){
        try {
            $attribute = Attribute::find($request->id_attribute);
            // return $category;
            if (!$attribute):
                return redirect()->route('admin.products.attributes')->with(['error' => 'هذا الخاصية غير موجود ']);
            else:


                if ($attribute->delete()):
                    $attribute->deleteTranslations();

                    return response()->json([
                        'status' => true,
                        'success' => 'تم الحذف',
                        'id' => $request->id_attribute,
                        'count'=>Attribute::count()
                    ]);
                else:
                    return response()->json([
                        'status' => true,
                        'success' => 'لم يم الحذف',
                        'id' => $request->id_attribute,
                    ]);
                endif;

            endif;
        }catch (Exception $ex){
            return redirect()->route('admin.products.attributes')->with(['error'=>'حاول مرة اخرى']);
        }


    }


    public function edit($id){
        $attribute=Attribute::find($id);
        if(empty($attribute)):
            return redirect()->back()->with(['error'=>'الخاصية غير موجود']);
        endif;

        return view ('dashbord/attributes/edit',compact(['attribute']));
    }

    public function update(AttributeRequest $request){
        try {
            $attribute=Attribute::find($request->id);
            if(empty($attribute)):
                return redirect()->route('admin.products.attributes')->with(['error'=>'الخاصية مش موجود']);
            else:
                DB::beginTransaction();

                $attribute->name=$request->name;

                if($attribute->save()):
                    DB::commit();

                    return redirect()->route('admin.products.attributes')->with(['success'=>'تم تعديل الخاصية']) ;
                endif;

            endif;

        }catch (Exception $ex){
            return redirect()->route('admin.products.attributes')->with(['error'=>'حاول مرة اخرى']);
        }

    }


    public  function changeStatus(Request  $request){

        $attribute=  Attribute::find($request->id_attribute);
        if(!empty($attribute)):

            if($attribute->is_active=='active'):
                $attribute->update([
                    'is_active'=>false
                ]);
            else:
                $attribute->update([
                    'is_active'=>true
                ]);
            endif;

            return response()->json([
                'status'=>true,
                'success'=>'تم التعديل',
                'id'=>$request->id_attribute,
                'msg'=>($attribute->is_active=='active')?'الغاء تفعيل':'تفعيل',
                'msgstatus'=>$attribute->is_active,

            ]);
        endif;

    }

    public function  store(AttributeRequest $request)
    {

            DB::beginTransaction();

        $attribute=Attribute::create($request->except(['_token']));

        $attribute->name=$request->name;

        $attribute->save();
            DB::commit();

            return redirect()->route("admin.products.attributes")->withInput($request->all())->with(['success' => 'تم اضافة خاصية المنتج']);




            DB::rollback();
            return redirect()->route('admin.products.attributes')->with(['error' => 'حاول مرة اخرى']);

    }




}
