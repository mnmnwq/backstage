<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\User;
use Illuminate\Support\Facades\Cache;

class AdminLogin
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
        $token = $request->cookie('token');
        $uid = $request->cookie('uid');
        if(Cache::has('token:uid:'.$uid)){
            $ver_token = Cache::get('token:uid:'.$uid);
            if($token != $ver_token){
                return redirect('admin/login');
            }
        }else{
            return redirect('admin/login');
        }
        return $next($request);
    }
}
