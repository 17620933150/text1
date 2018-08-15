<?php
namespace app\admin\validate;
use think\Validate;

class User extends Validate {
    //验证规则
    protected $rule = [
        'username' => 'require|unique:user',
        'password' => 'require|min:4',
        'repassword' => 'require|confirm:password'
    ];
    //验证不通过的提示信息
    protected $message = [
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
    ];

}