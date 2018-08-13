<?php
namespace app\admin\controller;
use think\Controller;

class TongjiController extends Controller {

    public function add() {
        var_dump(123);
        $date = input('post.');
        $php_json = json_encode($date);
        return $php_json;
    }

}