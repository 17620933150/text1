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

    Route::get('ssl', 'admin/public/ssl');

    Route::rule('login', 'admin/public/login');         //后台登录路由
    Route::rule('verify', 'admin/public/verify');         //后台登录验证码
    Route::rule('logout', 'admin/public/logout');       //后台退出路由

    Route::get('index', 'admin/index/index_list');           //后台首页
    Route::get('welcome', 'admin/index/welcome');           //后台首页

    Route::get('user/user_list', 'admin/user/user_list');    //后台用户列表
    Route::rule('user/user_add', 'admin/user/user_add');     //后台用户添加
    Route::rule('user/user_upd/:id', 'admin/user/user_upd'); //后台用户编辑
    Route::rule('user/user_del/:id', 'admin/user/user_del'); //后台用户删除

    Route::get('auth/auth_list', 'admin/auth/auth_list');    //后台权限列表
    Route::rule('auth/auth_add', 'admin/auth/auth_add');     //后台权限添加
    Route::rule('auth/auth_upd/:id', 'admin/auth/auth_upd'); //后台权限编辑
    Route::rule('auth/auth_del/:id', 'admin/auth/auth_del'); //后台权限删除

    Route::get('role/role_list', 'admin/role/role_list');    //后台权限列表
    Route::rule('role/role_add', 'admin/role/role_add');     //后台权限添加
    Route::rule('role/role_upd/:id', 'admin/role/role_upd'); //后台权限编辑
    Route::rule('role/role_del/:id', 'admin/role/role_del'); //后台权限删除

    Route::post('count/copyCount_add', 'admin/count/copyCount_add'); //copy事件
    Route::rule('count/count_domain', 'admin/count/count_domain'); //copy事件域名列表
    Route::get('count/copyCount_list', 'admin/count/copyCount_list'); //copy事件详情列表
    Route::get('count/count_data', 'admin/count/conut_data'); //copy事件列表柱形图

});
