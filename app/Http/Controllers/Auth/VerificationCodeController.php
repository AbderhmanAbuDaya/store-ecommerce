<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerifyCodeRequest;
use App\Http\Services\VerificationServices;
use App\Models\UserVerficationCode;
use App\Providers\RouteServiceProvider;
use http\Client\Curl\User;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Auth;

class VerificationCodeController extends Controller
{

    protected $redirectTo = RouteServiceProvider::PROFILE;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $verificationServices;
    public function __construct(VerificationServices $verificationServices)
    {
        $this->verificationServices=$verificationServices;

    }
    public function index(){
        return view('auth.verification');
    }
    public function verify(VerifyCodeRequest $request){
    $code=$request->code;
         if ($this->verificationServices->checkOTPCode($code))
         {
            return redirect()->route('profile');
         }
         return redirect()->route('get verify')->with(['error'=>'حاول مرة اخرى']);
    }

}
