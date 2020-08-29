<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

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

    public function updateShippingMethods(Reqeust $request,$id){

    }
}
