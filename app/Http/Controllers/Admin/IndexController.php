<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Menu;
use App\Model\RoleMenu;
use App\Model\UserRole;
use App\Tools\Tools;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request,Tools $tools)
    {
        $uid = $request->cookie('uid');
        if($uid != 1){
            $user_role = UserRole::where(['uid'=>$uid])->get()->toArray();
            $menu_arr = [];
            foreach($user_role as $v){
                $role_menu = RoleMenu::where(['role_id'=>$v['role_id']])->get()->toArray();
                foreach($role_menu as $vo){
                    $menu_arr[] = $vo['menu_id'];
                }
            }
            $p_info = Menu::whereIn('id',$menu_arr)->get()->toArray();
            $p_arr = [];
            foreach($p_info as $v){
                $p_arr[] = $v['pid'];
            }
            $p_arr = array_unique($p_arr);
            $menu = Menu::whereIn('id',$p_arr)->where(['pid'=>0])->orderBy('sort','desc')->get()->toArray();
            foreach ($menu as $k=>$v){
                $menu[$k]['child'] = Menu::where(['pid'=>$v['id']])->whereIn('id',$menu_arr)->orderBy('sort','desc')->get()->toArray();
            }
        }else{
            $menu = Menu::where(['pid'=>0])->orderBy('sort','desc')->get()->toArray();
            foreach ($menu as $k=>$v) {
                $menu[$k]['child'] = Menu::where(['pid' => $v['id']])->orderBy('sort', 'desc')->get()->toArray();
            }
        }

        return view('admin.index',['menu'=>$menu]);
    }

    /**
     * 内容主体区域
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function master()
    {
        return view('admin.master');
    }
}
