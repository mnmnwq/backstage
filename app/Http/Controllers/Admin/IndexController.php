<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Menu;
use App\Tools\Tools;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request,Tools $tools)
    {
        $menu = Menu::where(['pid'=>0])->orderBy('sort','desc')->get()->toArray();
        foreach ($menu as $k=>$v){
            $menu[$k]['child'] = Menu::where(['pid'=>$v['id']])->orderBy('sort','desc')->get()->toArray();
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
