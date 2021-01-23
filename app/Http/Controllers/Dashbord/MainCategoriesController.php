<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Requests\MainCategotyRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use mysql_xdevapi\Exception;

class MainCategoriesController extends Controller
{


    public function index($type){
         //return Category::list(7)->get();
       // return Category::findOrFail(99);
          $mainCategories=Category::parent()->paginate(PAGENIATE_COUNT)->makeVisible('translations');
          if($type=='sub')
              $mainCategories=Category::sub()->with('mainCategory')->paginate(PAGENIATE_COUNT)->makeVisible('translations');
             return view('dashbord/mainCategories/index',compact(['mainCategories','type']));
    }



    public  function  delete(Request  $request){
        try {
            $category = Category::find($request->id_category);
            // return $category;
            if (!$category):
                return redirect()->route('admin.mainCategories')->with(['error' => 'هذا القسم غير موجود ']);
            else:

                if ($category->delete()&&$category->deleteTranslations()):
                    return response()->json([
                        'status' => true,
                        'success' => 'تم الحذف',
                        'id' => $request->id_category,

                    ]);
                else:
                    return response()->json([
                        'status' => true,
                        'success' => 'لم يم الحذف',
                        'id' => $request->id_category,
                    ]);
                endif;

            endif;
        }catch (Exception $ex){
            return redirect()->route('admin.mainCategories')->with(['error'=>'حاول مرة اخرى']);
        }


    }




    public  function changeStatus(Request  $request){

        $category=  Category::find($request->id_category);
  if(!empty($category)):

   if($category->is_active=='active'):
       $category->update([
           'is_active'=>false
       ]);
   else:
       $category->update([
           'is_active'=>true
       ]);
 endif;

      return response()->json([
          'status'=>true,
          'success'=>'تم التعديل',
          'id'=>$request->id_category,
          'msg'=>($category->is_active=='active')?__('admin/category.deactivation'):__('admin/category.activation'),
          'msgstatus'=>$category->is_active,

      ]);
     endif;

    }



    public function edit($id_category,$type){
          $mainCategory=Category::find($id_category);
          if(empty($mainCategory)):
              return redirect()->back()->with(['error'=>'القسم غير موجود']);
          endif;
          if ($type=='sub'):
              $categories=Category::parent()->paginate(PAGENIATE_COUNT)->makeVisible('translations');
              return view ('dashbord/mainCategories/edit',compact(['mainCategory','categories','type']));
            endif;
        return view ('dashbord/mainCategories/edit',compact(['mainCategory','type']));
    }



    public function update(MainCategotyRequest $request,$id_category){
        try {
            $category=Category::find($id_category);
            if(empty($category)):
                return redirect()->route('admin.mainCategries')->with(['error'=>'القسم مش موجود']);
            else:
                DB::beginTransaction();
//        if($request->has(is_active))
//           $request->request->add('is_active',0);
//            else
//             $request->request->add('is_active',1);
           // return $request->except(['_token','id','name','sub','main']);
                $category->update($request->except(['_token','id','name','sub','main']));
                $category->name=$request->name;
                if($category->save()):
                    DB::commit();

                    return redirect()->route('admin.mainCategories',$request->type)->with(['success'=>'تم تعديل العرض']) ;
                endif;

            endif;

        }catch (Exception $ex){
            return redirect()->route('admin.mainCategories',$request->type)->with(['error'=>'حاول مرة اخرى']);
        }

    }

    public function create($type=null){
        $categories=Category::get()->makeVisible('translations');

        return view('dashbord.mainCategories.create',compact(['type','categories']));
    }


    public function  store(MainCategotyRequest $request)
    {
        try {
      //return $request;
            DB::beginTransaction();
          $category= Category::create($request->except('_token'));
         $category->name=$request->name;
          $category->save();
          DB::commit();
          $request->type='sub';
         if(is_null($category->parent_id))
             $request->type="main";
                return redirect()->route("admin.mainCategories",$request->type)->withInput($request->all())->with(['success' => 'تم اضافة القسم']);



        } catch (\Exception $ex){
           DB::rollback();
         return redirect()->route('admin.mainCategories.create',$request->type)->with(['error' => 'حاول مرة اخرى']);
        }
    }
}
