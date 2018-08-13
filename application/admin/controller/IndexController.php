<?php

namespace app\admin\controller;
use think\Controller;
use think\facade\Config;

class IndexController extends Controller {
    //后台首页
    public function index_list() {

        return $this->fetch('index');
    }
}
