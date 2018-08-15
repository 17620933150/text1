<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Role;

class RoleController extends Controller {
    //角色列表
    public function role_list() {
        return $this->fetch('admin_role_list');
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
}