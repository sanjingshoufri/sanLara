<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index(Request $request)
    {
    	xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);

        $user_id = empty($request->input('user_id'))?100002:$request->input('user_id');

        // 检测一个数据库的操作       
        $user = DB::select('select * from es_user where user_id = ?', [$user_id]);

		$info = xhprof_disable();
        print_r($info);
        // print_r($user);
    }
}
