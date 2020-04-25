<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
    	xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);

        // 检测一个数据库的操作
        new               


		$info = xhprof_disable();
        print_r($info);
    }
}
