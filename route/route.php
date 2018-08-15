<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//引入路由文件
use think\facade\Route;

Route::rule('tongji', 'admin/Tongji/add');

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});
//
//Route::get('hello/:name', 'index/hello');
//
//return [
//
//];


//后台admin首页分组路由
Route::group('admin',function() {
    //后台首页
    Route::get('index', 'admin/index/index_list');
    Route::get('user/list', 'admin/user/user_list');//后台用户列表
    Route::rule('user/add', 'admin/user/user_add');//后台用户添加

    Route::get('auth/list', 'admin/auth/auth_list');//后台权限列表
    Route::rule('auth/add', 'admin/auth/auth_add');//后台权限添加
    Route::rule('auth/upd/:id', 'admin/auth/auth_upd');//后台权限编辑

});
