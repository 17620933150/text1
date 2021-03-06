<?php

namespace app\admin\controller;

use think\Controller;

class CountController extends CommonController
{
    //copy事件列表柱形图
    public function conut_data()
    {
        $domain = input('domain');
        $word = input('word');
        $conutModel = model('Conut');
        $sql = "select domain,$word,count(*) as count from sh_conut where domain='$domain' group by $word having count>1";
        $conuts = $conutModel->query($sql);
        if ($word == 'keyword') {
            $wordde = '关键词汇总';
        } else if ($word == 'os') {
            $wordde = '用户设备汇总';
        } else if ($word == 'ref') {
            $wordde = '用户搜索引擎汇总';
        }
        return $this->fetch('conut_data', ['conuts' => $conuts, 'word' => $word, 'domain' => $domain, 'wordde' => $wordde]);
    }

    //copy事件域名列表
    public function count_domain()
    {
        $conutModel = model('Conut');
        $sql = 'select GROUP_CONCAT(wechat) as wechats,domain,count(*) as domains from sh_conut group by domain having domains>1';
        $t1 = 'select t1.*,GROUP_CONCAT(t2.username) as all_username from sh_role t1  left join sh_user t2 ON  FIND_IN_SET(t2.role_id,t1.role_id) group by t1.role_id';
        $conuts = $conutModel->query($sql);
        return $this->fetch('conut_domain', ['conuts' => $conuts]);
    }

    //copy事件微信详情列表
    public function copyWechat_list()
    {
        $conutModel = model('Conut');
        $domain = input('domain');
        $sql = "select domain,wechat,count(*) as wechats from sh_conut where domain='$domain' group by wechat having wechats>0";
        $conuts = $conutModel->query($sql);
        return $this->fetch('copyWechat_list', ['conuts' => $conuts, 'domain' => $domain]);
    }

    //copy事件详情列表
    public function copyCount_list()
    {
        $conutModel = model('Conut');
        $domain = input('domain');
        $sql = "select * from sh_conut where domain='$domain'";
        $conuts = $conutModel->query($sql);
        return $this->fetch('copyCount_list', ['conuts' => $conuts, 'domain' => $domain]);
    }

    //网站复制次数统计方法
    public function copyCount_add()
    {

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
            } else {
                return '{msg: "统计失败！", status: false}';
            }
        }
    }

}


?>