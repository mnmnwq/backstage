<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Mews\Captcha\Facades\Captcha;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        //return view('admin.login');
        return view('admin.login_test');
    }

    public function do_login(Request $request)
    {
        $req = $request->all();
        $ver_result = Captcha::check($req['vercode']);
        if(!$ver_result){
            $this->error();
        }

    }
}
