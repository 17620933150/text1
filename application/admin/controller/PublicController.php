<?php
namespace app\admin\controller;
use think\Controller;
use think\captcha\Captcha;
use app\admin\model\User;
use think\Model;

class PublicController extends Controller{

    //后台登录方法
    public function login() {
        //判断是否是post请求
        if (request()->isPost()) {
            //接收post数据
            $postData = input('post.');
            //验证器验证
            $result = $this->validate($postData,'User.login',[],true);
            if ($result!==true) {
                $this->error( implode(',',$result) );
            }
            //编辑update或加入库save
            $userModel = model('User');
            if ($userModel->checkUser($postData['username'],$postData['password'])) {
                //登录成功,到后台首页去
                $this->redirect("/admin/index");
            }else{
                $this->error("用户名或密码错误");
            }
        }
        //get输出模板
        return $this->fetch('login');
    }

    //验证码
    public function verify() {
        //实例化验证码类
        $captcha = new Captcha();
        //验证码字体大小(px)
        $captcha->fontSize = 20;
        //验证码位数
        $captcha->length   = 4;
        //验证码图片高度，设置为0为自动计算
        $captcha->imageH = 35;
        //验证码图片宽度，设置为0为自动计算
        $captcha->imageW = 130;
        //是否画混淆曲线
        $captcha->useCurve = false;

        return $captcha->entry();
    }

    public function logout() {
        //清楚登录成功保存的session信息
        session('user_id',null);
        session('username',null);
        session('role_name',null);
        //重定向到登录页
        $this->redirect("/admin/login/");
    }

    public function ssl() {
        return $this->fetch('count/Text');
    }

}