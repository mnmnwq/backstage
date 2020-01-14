<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\User;
use Mews\Captcha\Facades\Captcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    /**
     * 执行登陆验证
     * @param Request $request
     */
    public function do_login(Request $request)
    {
        $req = $request->all();
        $ver_result = Captcha::check($req['vercode']);
        if(!$ver_result){
            $this->error('验证码错误');
        }
        $user_info = User::where(['username'=>$req['username']])->select(['salt','password','id'])->first();
        if(!$user_info){
            $this->error('登陆失败');
        }
        if($user_info['password'] != md5($req['password'].$user_info['salt'])){
            $this->error('登陆失败');
        }
        //登陆成功
        $token = md5($user_info['password'].rand(1000,9999));
        //把token写入缓存
        Cache::put('token:uid:'.$user_info['id'],$token);
        return redirect('admin')->cookie('uid',$user_info['id'],24 * 30 * 60)->cookie('token',$token,24 * 30 * 60);
    }

    public function logout(Request $request)
    {
        $uid = $request->cookie('uid');
        Cache::forget('token:uid:'.$uid);
        return redirect('admin/login')->cookie('uid','',24 * 30 * 60)->cookie('token','',24 * 30 * 60);
    }
}
