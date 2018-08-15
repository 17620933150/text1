<?php
namespace app\admin\controller;
use app\admin\model\Auth;
use think\Controller;
use think\Db;

class AuthController extends Controller {
    //权限展示
    public function auth_list() {
        //实例化auth模型 取出数据,分配到模板
        $authModel = model('Auth');
        $sql = 'select t1.*,t2.auth_name p_name from sh_auth t1 left join sh_auth t2 on t1.pid=t2.auth_id';
        $authdata = $authModel->query($sql);
        return $this->fetch('admin_auth_list',['auths'=>$authdata]);
    }
    //权限添加
    public function auth_add() {
        //判断是否post请求
        if (request()->isPost()) {
            //接收post数据
            $postData = input('post.');
            //验证器验证,如果是顶级权限则是pid=0,验证onlyAuthName
            if ($postData['pid']==0) {
                $result = $this->validate($postData,"Auth.onlyAuthName",[],true);
            }else{
                $result = $this->validate($postData,"Auth.add",[],true);
            }
            //如果验证失败
            if ($result !== true) {
                $this->error(implode(',',$result));
            }
            //判断入库是否成功
            $authModel = model('Auth');
            if ($authModel->save($postData)){
                return ["msg"=>"添加成功！", "status"=>true];
            }else{
                return ["msg"=>"添加失败！", "status"=>true];
            }
        }

        //获取所有的权限分配到模板中
        $authModel = model('Auth');
        $auths = $authModel->getSonsAuth($authModel->select());
        return $this->fetch('admin_auth_add',['auths'=>$auths]);
    }

    //权限编辑
    public function auth_upd() {
        //判断是否post请求
        if (request()->isPost()) {
            //接收post数据
            $postData = input('post.');
            //验证器验证,如果是顶级权限则是pid=0,验证onlyAuthName
            if ($postData['pid']==0) {
                $result = $this->validate($postData,"Auth.onlyAuthName",[],true);
            }else{
                $result = $this->validate($postData,"Auth.upd",[],true);
            }
            //如果验证失败
            if ($result !== true) {
                $this->error(implode(',',$result));
            }
            //判断入库是否成功
            $authModel = model('Auth');
            if ($authModel->update($postData)){
                return ["msg"=>"编辑成功！", "status"=>true];
            }else{
                return ["msg"=>"编辑失败！", "status"=>true];
            }
        }


        //获取当前权限id的数据回显到页面上
        $auth_id = input('id');
        $auth = Auth::find($auth_id);
        //取出所有的无限极分类权限
        $authModel = model("Auth");
        $auths = $authModel->getSonsAuth($authModel->select());
        return $this->fetch('admin_auth_upd',['auth'=>$auth,'auths'=>$auths]);
    }

}