<?php /*a:1:{s:107:"D:\tool\PhpStudy20180211\PHPTutorial\WWW\tp5.1newshangcheng\application\admin\view\auth\admin_auth_add.html";i:1534145226;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo config('admin_static'); ?>/lib/html5shiv.js"></script>
<script type="text/javascript" src="<?php echo config('admin_static'); ?>/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="<?php echo config('admin_static'); ?>/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo config('admin_static'); ?>/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="<?php echo config('admin_static'); ?>/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="<?php echo config('admin_static'); ?>/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="<?php echo config('admin_static'); ?>/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="<?php echo config('admin_static'); ?>/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>添加管理员 - 管理员管理 - H-ui.admin v3.1</title>
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>权限名称：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="auth_name" name="auth_name">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>父级权限：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="pid" size="1">
				<option value="0">顶级权限</option>
				<?php if(is_array($auths) || $auths instanceof \think\Collection || $auths instanceof \think\Paginator): if( count($auths)==0 ) : echo "" ;else: foreach($auths as $key=>$auth): ?>
					<option value="<?php echo htmlentities($auth['auth_id']); ?>"><?php echo str_repeat('&nbsp;',$auth['level']*3); ?><?php echo htmlentities($auth['auth_name']); ?></option>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
			</span>
		</div>
	</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>控制器名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="auth_c" name="auth_c">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>方法名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="auth_a" name="auth_a">
			</div>
		</div>
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去--> 
<script type="text/javascript" src="<?php echo config('admin_static'); ?>/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo config('admin_static'); ?>/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="<?php echo config('admin_static'); ?>/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="<?php echo config('admin_static'); ?>/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="<?php echo config('admin_static'); ?>/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="<?php echo config('admin_static'); ?>/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="<?php echo config('admin_static'); ?>/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script>
	//给name=pid的select元素绑定change事件
</script>

<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
		//验证插件
	$("#form-admin-add").validate({
		// rules:{
        //     username:{
		// 		required:true,
		// 		minlength:4,
		// 		maxlength:16
		// 	},
		// 	password:{
		// 		required:true,
		// 	},
        //     repassword:{
		// 		required:true,
		// 		equalTo: "#password"
		// 	},
		// 	sex:{
		// 		required:true,
		// 	},
		// 	phone:{
		// 		required:true,
		// 		isPhone:true,
		// 	},
		// 	email:{
		// 		required:true,
		// 		email:true,
		// 	},
		// 	adminRole:{
		// 		required:true,
		// 	},
		// },
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit({
				type: 'post',
				url: "" ,
				success: function(date){
				    if (date.msg == "{'1'}") {
                        layer.msg(date.msg,{icon:1,time:1000});
					}else{
                        layer.msg(date.msg,{icon:1,time:1000});
					}
				},
                error: function(XmlHttpRequest, textStatus, errorThrown){
					layer.msg('error!',{icon:1,time:1000});
				}
			});
			var index = parent.layer.getFrameIndex(window.name);
			parent.$('.btn-refresh').click();
			parent.layer.close(index);
		}
	});
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>