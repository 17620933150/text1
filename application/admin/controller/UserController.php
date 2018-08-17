<?php
namespace app\admin\controller;
use app\admin\model\Role;
use app\admin\model\User;
use think\Db;

class UserController extends CommonController {
    //后台用户的展示
    public function  user_list() {
        //获取数据
        $sql = 'select t1.*,t2.role_name from sh_user t1 left join sh_role t2 ON t1.role_id = t2.role_id';
        $users = Db::query($sql);
        //加载用户展示视图
        return $this->fetch('admin_user_list',['users'=>$users]);
    }

    //后台用户的添加
    public function user_add() {
        //判断是否是post请求
        if (request()->isPost()) {
            $userModel = model('User');
            //接收post数据
            $postData = input('post.');
            //验证器验证
            $result = $this->validate($postData,'User.add',[],true);
            if ($result!==true) {
                $this->error( implode(',',$result) );
            }
            //编辑update或加入库save
            //给密码password字段加密
            $postData['password'] = md5($postData['password'].config('password_salt'));
            if ($userModel->allowField(true)->save($postData)) {
                return ["msg"=>"添加成功！", "status"=>true];
            }else{
                return ["msg"=>"添加失败！", "status"=>false];
            }
        }
        //取出所有的角色数据
        $roles = Role::select();
        //加载用户添加视图
        return $this->fetch('admin_user_add',['roles'=>$roles]);
    }

    //后台用户的编辑
    public function user_upd() {
        //判断是否是post请求
        if (request()->isPost()) {
            $userModel = model('User');
            //接收post数据
            $postData = input('post.');
            //验证器验证
            $result = $this->validate($postData,'User.add',[],true);
            if ($result!==true) {
                $this->error( implode(',',$result) );
            }
            //编辑update或加入库save
            //给密码password字段加密
            $postData['password'] = md5($postData['password'].config('password_salt'));
            if ($userModel->allowField(true)->update($postData)) {
                return ["msg"=>"更新成功！", "status"=>true];
            }else{
                return ["msg"=>"更新失败！", "status"=>false];
            }
        }
        //获取数据 回显到页面上
        $user_id = input('id');
        $sql = 'select t1.*,t2.role_name from sh_user t1  left join sh_role t2 ON t1.role_id = t2.role_id where t1.user_id ='.$user_id;
        $users = Db::query($sql);
        $roles = Role::select();
        return $this->fetch('admin_user_upd',['users'=>$users,'roles'=>$roles]);
    }

    //后台用户的删除
    public function user_del() {
        //接收数据
        $user_id = input('id');
        if (User::destroy($user_id)) {
            return ["msg"=>"删除成功！", "status"=>true];
        }else{
            return ["msg"=>"删除失败！", "status"=>false];
        }
    }

}