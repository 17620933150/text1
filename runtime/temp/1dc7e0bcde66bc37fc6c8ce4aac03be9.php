<?php /*a:1:{s:109:"D:\tool\PhpStudy20180211\PHPTutorial\WWW\tp5.1newshangcheng\application\admin\view\count\copyWechat_list.html";i:1535359245;}*/ ?>
﻿<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>复制统计</title>
	<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h2 class="text-center">微信号数据</h2>
<div>
	<div style="text-align: right;margin: 10px 50px;">
		<span class="glyphicon glyphicon-menu-left btn btn-default" style="float: left;" onClick="javascript :history.back(-1);"></span>
		<a class="btn btn-default">导出表格</a>
	</div>

	<table class="table table-bordered table-hover table-striped " style="margin: 0px 15px;">
		<thead>
		<tr>
			<th>ID</th>
			<th>域名</th>
			<th>用户复制的微信号</th>
			<th>复制次数</th>
		</tr>
		</thead>
		<tbody>
		<?php if(is_array($conuts) || $conuts instanceof \think\Collection || $conuts instanceof \think\Paginator): if( count($conuts)==0 ) : echo "" ;else: foreach($conuts as $key=>$conut): ?>
		<tr>
			<td><?php echo htmlentities($key+1); ?></td>
			<td><?php echo htmlentities($conut['domain']); ?></td>
			<td><?php echo htmlentities($conut['wechat']); ?></td>
			<td><?php echo htmlentities($conut['wechats']); ?></td>
		</tr>
		<?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
</div>
</body>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<script>
    // 使用outerHTML属性获取整个table元素的HTML代码（包括<table>标签），然后包装成一个完整的HTML文档，设置charset为urf-8以防止中文乱码
    var html = "<html><head><meta charset='utf-8' /></head><body>" + document.getElementsByTagName("table")[0].outerHTML + "</body></html>";
    // 实例化一个Blob对象，其构造函数的第一个参数是包含文件内容的数组，第二个参数是包含文件类型属性的对象
    var blob = new Blob([html], { type: "application/vnd.ms-excel" });
    var a = document.getElementsByTagName("a")[0];
    // 利用URL.createObjectURL()方法为a元素生成blob URL
    a.href = URL.createObjectURL(blob);
    // 设置文件名
    a.download = "微信号数据.xlsx";
</script>
</body>

</html>