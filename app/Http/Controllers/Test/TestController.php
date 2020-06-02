<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index(Request $request)
    {
        xhprof_enable();

        $user_id = empty($request->input('user_id'))?100002:$request->input('user_id');
        
        // 检测一个数据库的操作
        $users = DB::table('sign')->limit(5)->get();

        $xhprof_data = xhprof_disable();
        $xhprof_runs = new \XHProfRuns_Default();
        $run_id = $xhprof_runs->save_run($xhprof_data, 'xhprof');
        echo $run_id;
    }
}