<?php
namespace app\admin\model;
use think\Model;

class Auth extends Model {
    //表的主键字段
    protected $pk = 'auth_id';
    //事件戳自动写入
    protected $autoWriteTimestamp = true;

    //父级递归
    public function getSonsAuth($data,$pid=0,$level=1) {
        static $result = [];
        foreach ($data as $k=>$v) {
            if ($v['pid'] == $pid) {
                $v['level'] = $level;
                $result[] = $v;
                //移除判断过的元素
                unset($data[$k]);
                //递归调用
                $this->getSonsAuth($data,$v['auth_id'],$level+1);
            }
        }
        //返回递归后的结果
        return $result;

    }

}