<?php
namespace app\admin\controller;
use app\admin\model\Auth;
use think\Controller;
use app\admin\model\Role;
use think\Db;

class RoleController extends Controller {
    //角色列表
    public function role_list() {
        $sql = 'select t1.*,GROUP_CONCAT(t2.username) as all_username from sh_role t1  left join sh_user t2 ON  FIND_IN_SET(t2.role_id,t1.role_id) group by t1.role_id';
        $roles = Db::query($sql);
        return $this->fetch('admin_role_list',['roles'=>$roles]);
    }


    //角色添加
    public function role_add() {
        //判断是否post请求
        if (request()->isPost()) {
            //接收post数据
            $postData = input('post.');
            //验证器验证
            $result = $this->validate($postData,"Role.add",[],true);
            //如果验证失败
            if ($result !== true) {
                $this->error(implode(',',$result));
            }
            //判断入库是否成功
            $authModel = model('Role');
            if ($authModel->save($postData)){
                return ["msg"=>"添加成功！", "status"=>true];
            }else{
                return ["msg"=>"添加失败！", "status"=>true];
            }
        }

        $authModel = model("Auth");
        $oldauths = $authModel->select()->toArray();

        //以auth_id作为$auths的二维数组下标
        $auths = [];
        foreach ($oldauths as $v ) {
            $auths[$v['auth_id']] = $v;
        }
        //把所有的权限以pid进行分组
        $children = [];
        foreach ($oldauths as $vv) {
            $children[$vv['pid']][] = $vv['auth_id'];
        }
        return $this->fetch('admin_role_add',['children'=>$children,'auths'=>$auths]);
    }

    public function role_upd() {
        $role_id = input('id');
        $oldauths = Auth::select()->toArray();
        //以auth_id作为$auths的二维数组下标
        $auths = [];
        foreach ($oldauths as $v ) {
            $auths[$v['auth_id']] = $v;
        }
        //把所有的权限以pid进行分组
        $children = [];
        foreach ($oldauths as $vv) {
            $children[$vv['pid']][] = $vv['auth_id'];
        }
        // 取出当前角色已有的权限
        $role = Role::find();
        return $this->fetch('admin_role_upd',['children'=>$children,'auths'=>$auths,'role'=>$role]);
    }

    //后台用户的删除
    public function role_del() {
        //接收数据
        $user_id = input('id');
        if (Role::destroy($user_id)) {
            return ["msg"=>"删除成功！", "status"=>true];
        }else{
            return ["msg"=>"删除失败！", "status"=>false];
        }
    }

}