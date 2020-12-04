<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Services\SMSGateways\VictoryLinkSMS;
use App\Http\Services\SMSServices;
use App\Http\Services\VerificationServices;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::VERIFY;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $verification_services;
    public function __construct(VerificationServices $verification_services)
    {
        $this->middleware('guest');
        $this->verification_services=$verification_services;

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        try {

       DB::beginTransaction();
        $verification=[];
        $user= User::create([
            'name' => $data['name'],
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password']),
        ]);
        $verification['user_id']=$user->id;
        // send otp  sms code
        // set create new code
     $verificationCode=   $this->verification_services->setVerificationCode($verification);
      $message=  $this->verification_services->getSMSVerifyMessageByAppName($verificationCode->code);
        //save this code in new table
            //done
        //send to mobile number
     #  app(VictoryLinkSMS::class)->sendSms($user->mobile,$message);
            DB::commit();
            return $user;

        }catch (\Exception $ex){
              DB::rollBack();
        }
    }



}
