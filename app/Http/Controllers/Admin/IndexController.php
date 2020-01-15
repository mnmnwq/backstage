<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.index');
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
