<?php
namespace app\admin\controller;
use think\Controller;

class CountController extends Controller {

    public function conut_data() {
        return $this->fetch('conut_data');
    }

    public function count_domain() {
        $conutModel = model('Conut');
        $sql = 'select domain,count(*) as count from sh_conut group by domain having count>1';
        $conuts = $conutModel->query($sql);
        return $this->fetch('conut_domain',['conuts'=>$conuts]);
    }

    public function copyCount_list() {
        $conutModel = model('Conut');
        $domain = input('domain');
        $sql = "select * from sh_conut where domain='$domain'";
        $conuts = $conutModel->query($sql);
        return $this->fetch('copyCount_list',['conuts'=>$conuts]);
    }

    //网站复制次数统计方法
    public function copyCount_add() {

        //同源策略
        header("Access-Control-Allow-Origin: http://local.text1.com");
        //判断是否是post请求
        if (request()->isPost()) {
            $countModel = model('Conut');
            //接收post数据
            $counter = input('post.');
            //编辑update或加入库save
            if ($countModel->allowField(true)->save($counter)) {
                return '{msg: "统计成功！", status: true}';
            }else{
                return '{msg: "统计失败！", status: false}';
            }
        }
    }

}



?>