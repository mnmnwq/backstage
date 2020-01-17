<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//后台

Route::prefix('admin')->group(function () {
    Route::namespace('Admin')->group(function () {
        Route::get('/login', 'LoginController@login'); //登陆
        Route::get('/logout', 'LoginController@logout'); //登出
        Route::post('/do_login', 'LoginController@do_login'); // 执行登陆
        Route::middleware(['admin.login'])->group(function () {
            Route::get('/', 'IndexController@index');
            Route::get('/index', 'IndexController@master');

            Route::get('/role','RoleController@index'); //角色管理
            Route::get('add_role','RoleController@add_role'); //增加角色
            Route::post('do_add_role','RoleController@do_add_role'); //执行增加角色
            Route::get('up_role','RoleController@up_role'); //修改角色
            Route::get('do_up_role','RoleController@do_up_role'); //执行修改角色
            Route::get('del_role','RoleController@del_role'); //删除角色

            Route::get('user','UserController@index'); //用户管理
            Route::get('add_user','UserController@add_user'); //增加用户
            Route::post('do_add_user','UserController@do_add_user'); //执行增加用户
            Route::get('up_user','UserController@up_user'); //修改用户
            Route::post('do_up_user','UserController@do_up_user'); //执行修改用户
            Route::get('del_user','UserController@del_user'); //删除用户
            Route::get('role_user','UserController@role_user'); //分配角色


            Route::get('/menu','MenuController@index'); //菜单管理
            Route::get('/add_menu','MenuController@add_menu'); //增加菜单
            Route::get('/up_menu','MenuController@up_menu'); //修改菜单
            Route::post('/do_up_menu','MenuController@do_up_menu'); //执行修改菜单
            Route::get('/del_menu','MenuController@del_menu'); //删除菜单
            Route::post('/do_add_menu','MenuController@do_add_menu'); //执行增加菜单
            Route::post('/menu_sort','MenuController@menu_sort'); //修改菜单排序

        });
    });
});

