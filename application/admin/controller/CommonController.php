<?php
namespace app\admin\controller;
use think\Controller;

class CommonController extends Controller {
    public function initialize() {
        if (!session('user_id')) {
            //没有session,提示用户登录
            $this->error('请先登录!',url('/admin/login/'));
        }else{
            //权限翻墙
            //获取session中的权限
            $visitorAuth = session('visitorAuth');
            //拼接获取到当前访问的控制器名和方法名,,转为小写
            $new_ca = strtolower(request()->controller().'/'.request()->action());
            //判断访问的权限是否在session所记录的权限中存在
            //  超级管理员 不做权限控制,直接放行,或访问index控制器也放行
            if ($visitorAuth=='*'|| strtolower(request()->controller())=='index'){
                return;
            }
            //非超级管理员 ,判断访问的权限是否在session所记录的权限中存在
            if (!in_array($new_ca,$visitorAuth)){
                exit('访问错误');
            }

        }
    }
}