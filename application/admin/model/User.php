<?php
namespace app\admin\model;
use think\Model;
use app\admin\model\Role;

class User extends Model {
    //表的主键字段
    protected $pk = 'user_id';
    //事件戳自动写入
    protected $autoWriteTimestamp = true;

    //检出用户名和密码是否匹配
    public function checkUser($username,$password) {
        $where = [
            'username' => $username,
            'password' => md5($password.config('password_salt')),
        ];
        $userInfo = $this->where($where)->find();
        $roleModel = model("Role");
        $roleInfo = $roleModel->where('role_id',$userInfo['role_id'])->value('role_name');
        if ($userInfo) {
            //用户名和密码匹配,把用户的信息写入到session中去
            session('user_id',$userInfo['user_id']);
            session('username',$userInfo['username']);
            session('role_name',$roleInfo);
            //通过用户的角色role_id,把当前用户的权限写入到session中去
            $this->getAuthWriteSession($userInfo['role_id']);
            return true;
        }else{
            return false;
        }

    }

    function getAuthWriteSession($role_id) {
        //获取角色表中的auth_ids_list字段的值
        $auth_ids_list = Role::where('role_id','=',$role_id)->value('auth_ids_list');
        //如果是超级管理员 $auth_ids_list == *
        if ($auth_ids_list == '*') {
            //超级管理员拥有权限表所有数据
            $oldAuths = Auth::select()->toArray();
        }else{
            //如果是非超级管理员只能取出已有的权限 $auth_ids_list ==
            $oldAuths = Auth::where('auth_id','in',$auth_ids_list)->select()->toArray();
        }
        //两个技巧取出数据
        //每个数字的auth_id为二维数组的下表
        $auths = [];
        foreach ($oldAuths as $v) {
            $auths[$v['auth_id']] = $v;
        }
        //通过pid进行分组
        $children = [];
        foreach ($oldAuths as $vv) {
            $children[$vv['pid']][] = $vv['auth_id'];
        }
        //写入到session中去
        session('auths',$auths);
        session('children',$children);

        //写入管理员可访问的权限到session中去,用于后面的防
        if ($auth_ids_list == '*' ) {
            //超级管理员
            session('visitorAuth','*');
        }else{
            //非超级管理员 [auth/add,auth/index,]
            $visitorAuth = [];
            foreach ($oldAuths as $v) {
                $visitorAuth[] = strtolower($v['auth_c'].'/'.$v['auth_a']);
            }
            session('visitorAuth',$visitorAuth);
        }
    }


}