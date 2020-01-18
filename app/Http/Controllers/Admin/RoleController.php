<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Tools\Tools;
use App\Model\Menu;
use App\Model\RoleMenu;
use App\Model\UserRole;
use Illuminate\Http\Request;
use App\Model\Role;
use Illuminate\Support\Facades\DB;

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

    public function role_power(Tools $tools,Request $request)
    {
        $req = $request->all();
        $menu_info = Menu::orderBy('sort','desc')->get()->toArray();
        $menu = $tools->cateTree($menu_info);
        return view('admin.role.role_power',['menu'=>$menu,'role_id'=>$req['id']]);
    }

    public function do_role_power(Request $request)
    {
        $req = $request->all();
        $insert = true;
        DB::beginTransaction();
        foreach($req['sel'] as $v){
            $result = RoleMenu::insert([
                'role_id'=>$req['role_id'],
                'menu_id'=>$v
            ]);
            if(!$result){
                $insert = false;
            }
        }
        if($insert){
            DB::commit();
            $this->success('操作成功','admin/role');
        }else{
            DB::rollBack();
            $this->error('操作失败');
        }
    }

    /**
     * 修改角色
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function up_role(Request $request)
    {
        $req = $request->all();
        $role_info = Role::where(['id'=>$req['id']])->first();
return view('admin.role.update',['role_info'=>$role_info]);
}

    /**
     * 执行修改角色
     */
    public function do_up_role(Request $request)
    {
        $req = $request->all();
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

    /**
     * 删除角色
     * @param Request $request
     */
    public function del_role(Request $request)
    {
        $req = $request->all();
        DB::beginTransaction();
        $result1 = Role::where(['id'=>$req['id']])->delete();
        $result2 = $result3 = true;
        $menu_info = RoleMenu::where(['role_id'=>$req['id']])->get()->toArray();
        $user_info = UserRole::where(['role_id'=>$req['id']])->get()->toArray();
        if(!empty($menu_info)){
            $result2 = RoleMenu::where(['role_id'=>$req['id']])->delete();
        }
        if($user_info){
            $result3 = UserRole::where(['role_id'=>$req['id']])->delete();
        }
        if($result1 && $result2 && $result3){
            DB::commit();
            $this->success('操作成功','admin/role');
        }else{
            DB::rollBack();
            $this->error('操作失败');
        }
    }
}
