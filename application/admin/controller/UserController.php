<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Role;
use app\admin\model\User;
use think\Db;

class UserController extends Controller {
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

}