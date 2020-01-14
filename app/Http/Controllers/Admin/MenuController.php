<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Menu;
use Illuminate\Http\Request;
use App\Tools\Tools;

class MenuController extends Controller
{
    /**
     * 权限主页
     */
    public function index(Tools $tools)
    {
        $menu_info = Menu::all()->toArray();
        $menu = $tools->cateTree($menu_info);

        return view('admin.menu.index',['menu'=>$menu]);
    }

    /**
     *
     */
    public function add_menu()
    {
        $menu_list = Menu::where(['pid'=>0])->get()->toArray();

        return view('admin.menu.add',['menu_list'=>$menu_list]);
    }

    /**
     * 执行添加菜单
     * @param Request $request
     */
    public function do_add_menu(Request $request)
    {
        $req = $request->all();
        $result = Menu::insert([
            'pid'=>$req['pid'],
            'menu_name'=>$req['menu_name'],
            'menu_route'=>$req['menu_route']?$req['menu_route']:'',
        ]);
        if($result){
            $this->success('操作成功','admin/menu');
        }else{
            $this->error('操作失败');
        }
    }
}
