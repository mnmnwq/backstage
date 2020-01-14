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
        Route::post('/do_login', 'LoginController@do_login'); // 执行登陆
        Route::middleware(['admin.login'])->group(function () {
            Route::get('/', 'IndexController@index');
            Route::get('/role','RoleController@index'); //角色管理

        });
    });
});

