<?php
namespace app\admin\controller;
use think\Controller;

class UserController extends Controller {
    //后台用户的展示
    public function  user_list() {
        //加载用户展示视图
        return $this->fetch('admin_user_list');
    }

    //后台用户的添加
    public function user_add() {
        //判断是否是post请求
        if (request()->isPost()) {
            $userModel = new User();
            //接收post数据
            $postData = input('post.');
            //验证器验证
            $result = $this->validate($postData,'User.add',[],true);
            if ($result!==true) {
                $this->error( implode(',',$result) );
            }
            //编辑update或加入库save
            //给密码password字段加密
            $postData['password'] = mb5($postData['password'],config('password_salt'));
            if ($userModel->allowField(true)->save($postData)) {
                $this->success('入库成功',url('/admin/user/user_list'));
            }else{
                $this->error('入库失败');
            }
        }
        //加载用户添加视图
        return $this->fetch('admin_user_add');
    }

}