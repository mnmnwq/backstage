<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Role;

class RoleController extends Controller
{
    /**
     * 角色管理
     */
    public function index()
    {
        $role_info = Role::all()->toArray();
        return view('admin.role.index',['role_info'=>$role_info]);
    }

    /**
     * 增加角色
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add_role()
    {
        return view('admin.role.add');
    }

    /**
     * 执行增加角色
     */
    public function do_add_role(Request $request)
    {
        $req = $request->all();
        $result = Role::insert([
            'role_name'=>$req['role_name']
        ]);
        if($result){
            $this->success('操作成功','admin/role');
        }else{
            $this->error('操作失败');
        }
    }
}
