<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Menu;
use Illuminate\Http\Request;
use App\Tools\Tools;

class MenuController extends Controller
{
    /**
     * 菜单主页
     */
    public function index(Tools $tools)
    {
        $menu_info = Menu::orderBy('sort','desc')->get()->toArray();
        $menu = $tools->cateTree($menu_info);

        return view('admin.menu.index',['menu'=>$menu]);
    }

    public function up_menu(Request $request)
    {
        $req = $request->all();
        $menu_list = Menu::where(['pid'=>0])->get()->toArray();
        $menu_info = Menu::where(['id'=>$req['id']])->first();
        return view('admin.menu.update',['menu_info'=>$menu_info,'menu_list'=>$menu_list]);
    }

    public function do_up_menu(Request $request)
    {
        $req = $request->all();
        $result = Menu::where(['id'=>$req['id']])->update([
            'menu_name'=>$req['menu_name'],
            'menu_route'=>$req['menu_route']
        ]);
        if($result){
            $this->success('操作成功','admin/menu');
        }else{
            $this->error('操作失败');
        }
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

    /**
     * 删除菜单
     */
    public function del_menu(Request $request)
    {
        $req = $request->all();
        $pid = Menu::where(['id'=>$req['id']])->value('pid');
        if($pid != 0){
            $result = Menu::where(['id'=>$req['id']])->delete();
        }elseif($pid == 0){
            $pid_info = Menu::where(['pid'=>$req['id']])->get()->toArray();
            if(empty($pid_info)){
                $result = Menu::where(['id'=>$req['id']])->delete();
            }else{
                $result = false;
            }
        }else{
            $result =false;
        }

        if($result){
            $this->success('操作成功','admin/menu');
        }else{
            $this->error('操作失败');
        }
    }

    /**
     * 菜单排序
     * @param Request $request
     */
    public function menu_sort(Request $request)
    {
        $req = $request->all();
        $result = Menu::where(['id'=>$req['id']])->update(['sort'=>$req['sort']]);
        if($result){
            $this->ajaxReturn(['errno'=>0,'msg'=>'ok']);
        }else{
            $this->ajaxReturn(['errno'=>403,'msg'=>'操作失败']);
        }
    }
}
