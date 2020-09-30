<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Requests\TagsRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class TagController extends Controller
{
    public function index(){
        $tags=Tag::orderBy('id','desc')->paginate(PAGENIATE_COUNT)->makeVisible('translations');
        return view('dashbord.tags.index',compact('tags'));
    }
    public function create(){
        return view('dashbord.tags.create');
    }
    public  function  delete(Request  $request){
        try {
            $tag= Tag::find($request->id_tag);
            // return $category;
            if (!$tag):
                return redirect()->route('admin.tags')->with(['error' => 'هذا الاشارة غير موجود ']);
            else:

                $tag->deleteTranslations();

                if ($tag->delete()):
                    return response()->json([
                        'status' => true,
                        'success' => 'تم الحذف',
                        'id' => $request->id_tag,
                        'count'=>Tag::count()
                    ]);
                else:
                    return response()->json([
                        'status' => true,
                        'success' => 'لم يم الحذف',
                        'id' => $request->id_tag,
                    ]);
                endif;

            endif;
        }catch (Exception $ex){
            return redirect()->route('admin.tags')->with(['error'=>'حاول مرة اخرى']);
        }


    }


    public function edit($id){
        $tag=Tag::find($id);
        if(empty($tag)):
            return redirect()->back()->with(['error'=>'الماركة غير موجود']);
        endif;

        return view ('dashbord/tags/edit',compact(['tag']));
    }

    public function update(TagsRequest $request){
        try {
            $tag=Tag::find($request->id);
            if(empty($tag)):
                return redirect()->route('admin.tags')->with(['error'=>'الماركة مش موجود']);
            else:
                DB::beginTransaction();

                $tag->update($request->except(['_token','id','name']));
                $tag->name=$request->name;

                if($tag->save()):
                    DB::commit();

                    return redirect()->back()->with(['success'=>'تم تعديل العرض']) ;
                endif;

            endif;

        }catch (Exception $ex){
            return redirect()->route('admin.mainCategories')->with(['error'=>'حاول مرة اخرى']);
        }

    }



    public function  store(TagsRequest $request)
    {

        DB::beginTransaction();

        $tag=Tag::create($request->except(['_token','name']));
        $tag->name=$request->name;
        DB::commit();

        $tag->save();

        return redirect()->route("admin.tags.create")->withInput($request->all())->with(['success' => 'تم اضافة الماركة']);




        DB::rollback();
        return redirect()->route('admin.brands.create')->with(['error' => 'حاول مرة اخرى']);

    }

}
