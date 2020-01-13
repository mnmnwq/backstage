<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success($msg,$rote)
    {
        header('Refresh:3;url='.$_SERVER['HTTP_REFERER']);

    }

    public function error($msg = '')
    {
        header('Refresh:3;url='.$_SERVER['HTTP_REFERER']);
        echo "";
    }
}
