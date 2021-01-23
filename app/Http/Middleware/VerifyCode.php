<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class VerifyCode


{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::guard('web')->check()){// if he already registered and have account and must login
            if(is_null(Auth::user()->email_verified_at))
                return redirect(RouteServiceProvider::VERIFY);
        }

        return $next($request);
    }
}
