<?php /*a:1:{s:38:"C:\tp6_blog\app\view\admins\login.html";i:1619944623;}*/ ?>
<!--这个文件是前端的视图文件，是可视化的模板，
都放在app文件夹的view里面，文件夹的名称对应的是controller文件的文件名
文件名对应的是controller文件里面的function的名称-->
<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>博客管理系统</title>
<link rel="stylesheet" type="text/css" href="http://tp6.blog.ca/static/admin/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="http://tp6.blog.ca/static/admin/css/style.css">
<link rel="stylesheet" type="text/css" href="http://tp6.blog.ca/static/admin/css/login.css">
<link rel="apple-touch-icon-precomposed" href="http://tp6.blog.ca/static/admin/images/icon/icon.png">
<link rel="shortcut icon" href="http://tp6.blog.ca/static/admin/images/icon/favicon.ico">
<script src="http://tp6.blog.ca/static/admin/js/jquery-2.1.4.min.js"></script>
<!--[if gte IE 9]>
  <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="js/html5shiv.min.js" type="text/javascript"></script>
  <script src="js/respond.min.js" type="text/javascript"></script>
  <script src="js/selectivizr-min.js" type="text/javascript"></script>
<![endif]-->
<!--[if lt IE 9]>
  <script>window.location.href='upgrade-browser.html';</script>
<![endif]-->
</head>

<body class="user-select">
<div class="container">
    <div class="siteIcon"><img src="http://tp6.blog.ca/static/admin/images/icon/icon.png" alt="" data-toggle="tooltip" data-placement="top" title="博客管理系统" draggable="false" /></div>
    <div class="form-signin">
        <h2 class="form-signin-heading">管理员登录</h2>
        <label for="userName" class="sr-only">用户名</label>
        <input type="text" id="userName" name="username" class="form-control" placeholder="请输入用户名" required autofocus autocomplete="off" maxlength="18">
        <label for="userPwd" class="sr-only">密码</label>
        <input type="password" id="userPwd" name="userpwd" class="form-control" placeholder="请输入密码" required autocomplete="off" maxlength="18">
        <button class="btn btn-lg btn-primary btn-block" type="button" id="signinSubmit">登录</button>
    </div>
    <div class="footer">
        <p><a href="index.html" data-toggle="tooltip" data-placement="left" title="不知道自己在哪?">回到后台 →</a></p>
    </div>
</div>

<script src="http://tp6.blog.ca/static/admin/js/bootstrap.min.js"></script>

<script>
/*
$('[data-toggle="tooltip"]').tooltip();
window.oncontextmenu = function(){
	//return false;
};
*/
$('.siteIcon img').click(function(){
	window.location.reload();
});
$('#signinSubmit').click(function(){
    var name = $('#userName').val();
    var pwd = $('#userPwd').val();
	if(name.length < 4){
		alert('用户名长度不能小于4');
	}else if(pwd.length < 6){
		alert('密码长度不能小于6');
	}else{
		//执行登录代码
        $.ajax({
            type:'POST',
            url:'',
            data:{
                'name':name,
                'pwd':pwd
            },
            success:function(data){
                console.log(data);
                if (data=='管理员不存在！'){
                    alert(data);
                }
                else if (data=='用户名或是密码不正确'){
                    alert(data);
                }
                else{
                    alert(data);
                    $(window.location.href='/Admins/index')
                }
            }
        })
	}
});
</script>
</body>
</html>
