<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\ShippingRequest;
use db;
class SettingsController extends Controller
{

    public function editShippingMethods($type){
        if($type=='free')
       $shippingMethod= Setting::where('key','free_shipping_label')->first();
       elseif($type=='local')
       $shippingMethod= Setting::where('key','local_label')->first();
       elseif($type=='outer')
       $shippingMethod= Setting::where('key','outer_label')->first();
//return $shippingMethod;
       return view('dashbord.settings.shippingMethod',compact('shippingMethod'));

    }

    public function updateShippingMethods(ShippingRequest $request,$id){
        try{
            DB::beginTransaction();
            $shipping=Setting::find($id);
        $shipping->update(['plain_value'=>$request->plain_value]);
                $shipping->value=$request->name;// حيروح يعدل ديفولت عندك
        $shipping->save();
        DB::commit();

        return redirect()->back()->with(['success'=>'تم التعديل ربنجاح']);
        }catch(Exception $qq){
         DB::rollback();
         return redirect()->back()->with(['error'=>'هناك  خطا  ما']);
        }

    }
}
