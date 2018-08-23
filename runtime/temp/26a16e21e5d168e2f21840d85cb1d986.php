<?php /*a:1:{s:108:"D:\tool\PhpStudy20180211\PHPTutorial\WWW\tp5.1newshangcheng\application\admin\view\count\copyCount_list.html";i:1534994410;}*/ ?>
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
<h2 class="text-center">复制详情</h2>
<div>
	<table class="table table-bordered table-hover table-striped " style="margin: 0px 15px;">
		<thead>
		<tr>
			<th>ID</th>
			<th>域名</th>
			<th><a href="<?php echo url('/admin/count/count_data/').'?domain='.$domain.'&word=keyword'; ?>">关键字</a></th>
			<th><a href="<?php echo url('/admin/count/count_data/').'?domain='.$domain.'&word=os'; ?>">用户设备</a></th>
			<th><a href="<?php echo url('/admin/count/count_data/').'?domain='.$domain.'&word=ref'; ?>">搜索平台</a></th>
			<th>复制时间</th>
		</tr>
		</thead>
		<tbody>
		<?php if(is_array($conuts) || $conuts instanceof \think\Collection || $conuts instanceof \think\Paginator): if( count($conuts)==0 ) : echo "" ;else: foreach($conuts as $key=>$conut): ?>
		<tr>
			<td><?php echo htmlentities($key+1); ?></td>
			<td><?php echo htmlentities($conut['domain']); ?></td>
			<td><?php echo htmlentities($conut['keyword']); ?></td>
			<td><?php echo htmlentities($conut['os']); ?></td>
			<td><?php echo htmlentities($conut['ref']); ?></td>
			<td><?php echo date('Y-m-d H:i:s',$conut['create_time']); ?> </td>
		</tr>
		<?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
</div>


</body>

<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</html>