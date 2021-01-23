<?php

namespace App\Http\Controllers\Dashbord;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;
class LoginController extends Controller
{
    public function getLogin(){
        return view('Dashbord.auth.login');
    }

    public function postLogin(AdminLoginRequest $request){
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
           // notify()->success('تم الدخول بنجاح  ');
            return redirect() -> route('admin.dashboard');
        }
       // notify()->error('خطا في البيانات  برجاء المجاولة مجدا ');
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
       // return back()->withInput($request->only('email'));


    }
    public function logout(Request $request)
    {
     $gurad= auth('admin');
     $gurad->logout();
        return redirect()->guest(route( 'admin.login' ));
    }
}
