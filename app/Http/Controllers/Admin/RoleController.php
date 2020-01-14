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
        return view('admin.role.index');
    }

    public function add_role()
    {
        return view();
    }
}
