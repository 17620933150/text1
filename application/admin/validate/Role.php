<?php
namespace app\admin\validate;
use think\Validate;

class Role extends Validate {
    //验证规则
    protected $rule = [
        'role_name' => 'require|unique:role',
        'role_rema' => 'require',
    ];
    //验证不通过的提示信息
    protected $message = [
        'auth_name.require' => '角色名称必填',
        'auth_name.unique'  => '角色名称重复',
        'role_rema.require' => '角色介绍必填',

    ];
    //验证场景
    protected $scene = [
        //场景名 => [元素=>规则1|规则2]
        //场景名 => [元素] 表示验证所有的规则
        'add' => ['role_name','role_rema'],
        'upd' => ['role_name','role_rema']
    ];

}