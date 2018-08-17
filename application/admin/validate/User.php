<?php
namespace app\admin\validate;
use think\Validate;

class User extends Validate {
    //验证规则
    protected $rule = [
        'captcha'=>'require|captcha',
        'username' => 'require|unique:user',
        'password' => 'require|min:4',
        'repassword' => 'require|confirm:password',

    ];
    //验证不通过的提示信息
    protected $message = [
        'captcha.require' => '验证码未填',
        'captcha.captcha' => '验证码错误',
        'username.require' => '用户名称必填',
        'username.unique'  => '用户名称重复',
        'password.require' => '密码必填',
        'password.min' => '密码小于4位',
        'repassword.require' => '请输入确认密码',
        'repassword.confirm' => '两次密码不一致'

    ];
    //验证场景
    protected $scene = [
        //场景名 => [元素=>规则1|规则2]
        //场景名 => [元素] 表示验证所有的规则
        'add' => ['username','password','repassword'],
        'onlyUsername' => ['username'],
        'UsernamePassword' =>['username','password','repassword'],
        'login' => ['username'=>"require",'password','captcha'],
    ];

}