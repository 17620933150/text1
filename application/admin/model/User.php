<?php
namespace app\admin\model;
use think\Model;

class User extends Model {
    //表的主键字段
    protected $pk = 'user_id';
    //事件戳自动写入
    protected $autoWriteTimestamp = true;
}