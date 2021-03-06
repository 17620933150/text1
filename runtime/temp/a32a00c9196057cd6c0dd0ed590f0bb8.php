<?php /*a:1:{s:108:"D:\tool\PhpStudy20180211\PHPTutorial\WWW\tp5.1newshangcheng\application\admin\view\user\admin_user_list.html";i:1535357612;}*/ ?>
﻿<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="Bookmark" href="/favicon.ico">
    <link rel="Shortcut Icon" href="/favicon.ico"/>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?php echo config('admin_static'); ?>/lib/html5shiv.js"></script>
    <script type="text/javascript" src="<?php echo config('admin_static'); ?>/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo config('admin_static'); ?>/static/h-ui/css/H-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo config('admin_static'); ?>/static/h-ui.admin/css/H-ui.admin.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo config('admin_static'); ?>/lib/Hui-iconfont/1.0.8/iconfont.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo config('admin_static'); ?>/static/h-ui.admin/skin/default/skin.css"
          id="skin"/>
    <link rel="stylesheet" type="text/css" href="<?php echo config('admin_static'); ?>/static/h-ui.admin/css/style.css"/>
    <!--[if IE 6]>
    <script type="text/javascript" src="<?php echo config('admin_static'); ?>/lib/DD_belatedPNG_0.0.8a-min.js"></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>管理员列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> <input type="button" name="back" value="管理员管理" onclick="JavaScript:history.back(-1);"/> <span
        class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px"
                                               href="javascript:location.replace(location.href);" title="刷新"><i
        class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="text-c"> 日期范围：
        <input type="text" class="input-text" style="width:250px" placeholder="输入管理员名称" id="" name="">
        <button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"><span class="l"><a href="javascript:;" onclick="datadel()"
                                                               class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a
            href="javascript:;" onclick="admin_add('添加管理员','admin-add.html','800','500')"
            class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a></span> <span
            class="r">共有数据：<strong>54</strong> 条</span></div>
    <table class="table table-border table-bordered table-bg">
        <thead>
        <tr>
            <th scope="col" colspan="9">员工列表</th>
        </tr>
        <tr class="text-c">
            <th width="25"><input type="checkbox" name="" value=""></th>
            <th width="40">ID</th>
            <th width="150">登录名</th>
            <th width="90">手机</th>
            <th width="150">邮箱</th>
            <th>角色</th>
            <th width="130">加入时间</th>
            <th width="100">是否已启用</th>
            <th width="100">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($users) || $users instanceof \think\Collection || $users instanceof \think\Paginator): if( count($users)==0 ) : echo "" ;else: foreach($users as $key=>$user): ?>
        <tr class="text-c">
            <td><input type="checkbox" value="<?php echo htmlentities($user['user_id']); ?>" name=""></td>
            <td><?php echo htmlentities($user['user_id']); ?></td>
            <td><?php echo htmlentities($user['username']); ?></td>
            <td><?php echo htmlentities($user['phone']); ?></td>
            <td><?php echo htmlentities($user['email']); ?></td>
            <td><?php echo htmlentities($user['role_name']); ?></td>
            <td><?php echo htmlentities($user['create_time']); ?></td>
            <td class="td-status"><span class="label label-success radius"><?php echo $user['status']=='1' ? '已启用' : '已停用'; ?></span>
            </td>
            <td class="td-manage">
                <a style="text-decoration:none" onClick="admin_stop(this,'10001')" href="javascript:;" title="停用"><i
                        class="Hui-iconfont">&#xe631;</i></a>
                <a title="编辑" href="javascript:;" onclick="admin_edit('管理员编辑','<?php echo url('/admin/user/user_upd/').$user['user_id']; ?>','1','1200','800')"
                   class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                <a title="删除" href="javascript:;" onclick="admin_del(this,'<?php echo htmlentities($user['user_id']); ?>')" class="ml-5"
                   style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="<?php echo config('admin_static'); ?>/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo config('admin_static'); ?>/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="<?php echo config('admin_static'); ?>/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="<?php echo config('admin_static'); ?>/static/h-ui.admin/js/H-ui.admin.js"></script>
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="<?php echo config('admin_static'); ?>/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="<?php echo config('admin_static'); ?>/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo config('admin_static'); ?>/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
    /*
        参数解释：
        title	标题
        url		请求的url
        id		需要操作的数据id
        w		弹出层宽度（缺省调默认值）
        h		弹出层高度（缺省调默认值）
    */
    /*管理员-增加*/
    function admin_add(title, url, w, h) {
        url = "<?php echo url('/admin/user/user_add/'); ?>";
        w = '1000';
        h = '800';
        layer_show(title, url, w, h);
    }

    /*管理员-删除*/
    function admin_del(obj, id) {
        layer.confirm('确认要删除吗？', function (index) {
            $.ajax({
                type: 'POST',
                url: "<?php echo url('/admin/user/user_del/'); ?>"+id,
                dataType: 'json',
                data: {
                    "_method": "delete",
                    "_token": "{{ csrf_token() }}",
                },
                success:function(data){
                    if (data.status) {
                        $(obj).parents("tr").remove();
                        layer.msg(data.msg,{icon:1,time:1000},function () {
                            //刷新当前layer窗口的父级窗口
                            parent.window.location.reload();
                        });
                    }else{
                        layer.msg(data.msg,{icon:1,time:1000},function () {
                            //刷新当前layer窗口的父级窗口
                            parent.window.location.reload();
                        });
                    }

                },
                error:function(data) {
                    console.log(data.msg);
                },
            });
        });
    }

    /*管理员-编辑*/
    function admin_edit(title, url, id, w, h) {
        layer_show(title, url, w, h);
    }

    /*管理员-停用*/
    function admin_stop(obj, id) {
        layer.confirm('确认要停用吗？', function (index) {
            //此处请求后台程序，下方是成功后的前台处理……

            $(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,id)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
            $(obj).remove();
            layer.msg('已停用!', {icon: 5, time: 1000});
        });
    }

    /*管理员-启用*/
    function admin_start(obj, id) {
        layer.confirm('确认要启用吗？', function (index) {
            //此处请求后台程序，下方是成功后的前台处理……
            $(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,id)" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
            $(obj).remove();
            layer.msg('已启用!', {icon: 6, time: 1000});
        });
    }
</script>
</body>
</html>