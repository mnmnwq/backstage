<?php

namespace App\Http\Middleware;

use App\Model\Menu;
use App\Model\RoleMenu;
use App\Model\UserRole;
use Closure;

class Permission
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
        $uid = $request->cookie('uid');
        if($uid != 1){
            $route_arr = [];
            $user_role = UserRole::where(['uid'=>$uid])->get()->toArray();
            $menu_arr = [];
            foreach($user_role as $v){
                $role_menu = RoleMenu::where(['role_id'=>$v['role_id']])->get()->toArray();
                foreach($role_menu as $vo){
                    $menu_arr[] = $vo['menu_id'];
                }
            }
            $menu_info = Menu::whereIn('id',$menu_arr)->get()->toArray();
            foreach($menu_info as $v){
                $route_arr[] = $v['menu_route'];
            }
            $route_arr = array_unique($route_arr);
            $url = $_SERVER['REQUEST_URI'];
            $url = trim($url,'/');
            if(!in_array($url,$route_arr)){
                return redirect('admin/index');
            }
        }
        return $next($request);
    }
}
