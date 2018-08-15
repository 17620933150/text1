<?php
namespace app\admin\model;
use think\Model;

class Role extends Model {
    //表的主键字段
    protected $pk = 'role_id';
    //事件戳自动写入
    protected $autoWriteTimestamp = true;


    protected static function init()
    {
        //入库之前的的事件
        Role::event('before_insert',function ($role){
            //把权限数组形式变为字符串进行入库
            //防止没有分贝权限auth_ids_list属性报错,所以isset判断下
            if (isset($role['auth_ids_list'])) {
                $role['auth_ids_list'] = implode(',',$role['auth_ids_list']);
            }
        });
    }
}
?>