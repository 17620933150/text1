<?php /*a:1:{s:100:"D:\tool\PhpStudy20180211\PHPTutorial\WWW\tp5.1newshangcheng\application\admin\view\.\count\Text.html";i:1534996580;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
</head>
<body>

<p>wechat: <div id="wechat">uwi123456798</div></p>

<canvas id="myChart" width="400" height="400"></canvas>

<script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>


<script type="text/javascript">
    var os = navigator.userAgent;

    if (os.indexOf("Windows") != -1) {
        os = 'Windows';
    }else if( os.indexOf("Mac") != -1) {
        os = 'Mac';
    }else if(os.indexOf("linux") != -1) {
        os = 'linux';
    }else {
        os = 'moblie';
    }
    console.log(os);  // true

    var ref = history.back();
    var ref = 'https://www.so.com/s?q=%E5%8D%B3%E5%8F%AF%E6%8B%89%E4%BC%B8%E4%BA%86%E7%9A%84%E7%A9%BA%E9%97%B4%E5%89%AF%E7%A7%91%E7%BA%A7&src=srp&fr=hao_360so_hot_b&psid=e141926e07d80831fcb71edd1b2dd183'

    if (ref.indexOf("www.baidu.com") != -1) {
        //获取百度关键字
        //正则匹配到wd=
        grep=/wd\=.*\&/i;
        str=ref.match(grep)
        //         利用split分割字符串只要下表为[1][0]
        ykey=str.toString().split("=")[1].split("&")[0];
        //URI 进行解码。
        keyword=decodeURIComponent(ykey);
        ref = 'baidu';
    }else if(ref.indexOf("www.so.com") != -1) {
        //获取360关键字
        //正则匹配到wd=
        grep=/q\=.*\&/i;
        str=ref.match(grep);
        //         利用split分割字符串只要下表为[1][0]
        ykey=str.toString().split("=")[1].split("&")[0];
        //URI 进行解码。
        keyword=decodeURIComponent(ykey);
        ref = '360';
    }else if (ref.indexOf("www.google.com") != -1) {
        //获取谷歌关键字
        grep=/&q\=.*\&/i;
        str=ref.match(grep);
        //         利用split分割字符串只要下表为[1][1]
        ykey=str.toString().split("&")[1].split("=")[1];
        //URI 进行解码。
        keyword=decodeURIComponent(ykey);
        ref = 'google';
    }else if (ref.indexOf("www.sogou.com") != -1) {
        //获取搜狗关键字
        grep=/query\=.*\&/i;
        str=ref.match(grep)
        //         利用split分割字符串只要下表为[0][1]
        ykey=str.toString().split("&")[0].split("=")[1];
        //URI 进行解码。
        keyword=decodeURIComponent(ykey);
        ref = 'sogou';
    }else if (ref.indexOf("qq.com") != -1) {
        keyword = 'null';
        ref = 'QQ';
    }else if (ref.indexOf("ifeng.com") != -1) {
        keyword = 'null';
        ref = 'ifeng';
    }
    console.log(ref);
    console.log(keyword);
    console.log(window.location.pathname);

    $("#wechat").on('copy',function(){
        console.log('13246');
        $.ajax({
            url:"http://127.0.0.1:8000/admin/count/copyCount_add/",
            success:function(result){
                $("#div1").html(result);
            }});
    });


</script>
</body>
</html>