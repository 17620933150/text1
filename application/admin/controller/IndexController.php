<?php

namespace app\admin\controller;
use think\Controller;

class IndexController extends CommonController {
    //后台首页
    public function index_list() {
        return $this->fetch('index');
    }
    //后台首页
    public function welcome() {
        return $this->fetch('welcome');
    }

}
