<?php /*a:1:{s:106:"D:\tool\PhpStudy20180211\PHPTutorial\WWW\tp5.1newshangcheng\application\admin\view\count\conut_domain.html";i:1535017521;}*/ ?>
﻿<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>复制域名列表</title>
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
			<th>复制次数</th>
		</tr>
		</thead>
		<tbody>
		<?php if(is_array($conuts) || $conuts instanceof \think\Collection || $conuts instanceof \think\Paginator): if( count($conuts)==0 ) : echo "" ;else: foreach($conuts as $key=>$conut): ?>
		<tr>
			<td><?php echo htmlentities($key+1); ?></td>
			<td><a href="<?php echo url('/admin/count/copyCount_list/').'?domain='.$conut['domain']; ?>"><?php echo htmlentities($conut['domain']); ?></a></td>
			<td><?php echo htmlentities($conut['count']); ?></td>
		</tr>
		<?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>

	<button type="button" class="btn btn-primary btn-lg btn-block" id="t1">加载更多</button>
</div>


</body>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
	$('#t1').on('click',function () {
		console.log(123);
    })
</script>

</html>