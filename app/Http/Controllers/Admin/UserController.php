<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * 用户管理
     */
    public function index()
    {
        $user_info = User::get()->toArray();
        return view('admin.user.index',['user_info'=>$user_info]);
    }

    public function add_user()
    {
        return view('admin.user.add');
    }

    public function up_user(Request $request)
    {
        $req = $request->all();
        if($req['id'] == 1){
            $this->error('无法修改');
        }
        $user_info = User::where(['id'=>$req['id']])->first();
        return view('admin.user.update',['user_info'=>$user_info]);
    }

    public function do_up_user(Request $request)
    {
        $req = $request->all();
        if($req['id'] == 1){
            $this->error('无法修改');
        }
        $up_arr = [
            'username'=>$req['username'],
            'email'=>$req['email'],
            'tel'=>$req['tel'],
        ];
        if(!empty($req['password'])){
            $str_arr = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
            $salt_arr = array_rand($str_arr,4);
            $salt = '';
            foreach($salt_arr as $v){
                $salt .= $v;
            }
            $up_arr['password'] = md5($req['password'].$salt);
            $up_arr['salt'] = $salt;
        }
        $result = User::where(['id'=>$req['id']])->update($up_arr);
        if($result){
            $this->success('操作成功','admin/user');
        }else{
            $this->error('操作失败');
        }
    }

    public function do_add_user(Request $request)
    {
        $req = $request->all();
        $str_arr = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
        $salt_arr = array_rand($str_arr,4);
        $salt = '';
        foreach($salt_arr as $v){
            $salt .= $v;
        }
        $password = md5($req['password'].$salt);
        $result = User::insert([
            'username'=>$req['username'],
            'password'=>$password,
            'salt'=>$salt,
            'email'=>$req['email'],
            'tel'=>$req['tel'],
            'reg_time'=>time()
        ]);
        if($result){
            $this->success('操作成功','admin/user');
        }else{
            $this->error('操作失败');
        }
    }

    public function del_user(Request $request)
    {
        $req = $request->all();
        $result = User::where(['id'=>$req['id']])->delete();
        if($result){
            $this->success('操作成功','admin/user');
        }else{
            $this->error('操作失败');
        }
    }
}
