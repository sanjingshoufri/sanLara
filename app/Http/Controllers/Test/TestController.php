<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
        xhprof_enable();
        include_once "D:/phpstudy_pro/WWW/xhprof_lib/utils/xhprof_lib.php";
        include_once "D:/phpstudy_pro/WWW/xhprof_lib/utils/xhprof_runs.php";

        // 检测一个数据库的操作
        $users = DB::table('sign')->get();


        $xhprof_data = xhprof_disable();
        $xhprof_runs = new \XHProfRuns_Default();
        $run_id = $xhprof_runs->save_run($xhprof_data, 'xhprof');
        echo $run_id;
    }
}