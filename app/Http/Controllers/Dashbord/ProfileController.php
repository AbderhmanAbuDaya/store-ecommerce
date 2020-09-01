<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mockery\Generator\StringManipulation\Pass\Pass;
use mysql_xdevapi\Exception;

class ProfileController extends Controller
{
    public function editProfile(){
        $admin=Admin::find(auth('admin')->user()->id);
        return view('Dashbord/profile/editProfile',compact('admin'));

    }
    public function updateProfile(EditProfileRequest  $request)
    {
        try {
            $admin = Admin::find(auth('admin')->user()->id);
            if($request->filled('password'))
                $request->merge(['password'=>bcrypt($request->passwprd)]);//عشان نشفر باس
       //  return  $request->password;
unset($request['id']);
            unset($request['password_confirmation']);
            //return $request;
            //بشيلهم من ريكوست عشان ما يعملي خطا

            $admin->update(
      //$request->only(['name','email'])

      $request->all()

           );
            $admin->save();
        return redirect()->back()->with(['success'=>'تم تعديل البيانات']);
      }catch (Exception $eq) {
            return redirect()->back()->with(['error'=>'لم يتم تعديل حاول مرة اخرى']);

                              }

    }

}
