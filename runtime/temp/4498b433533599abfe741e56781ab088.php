<?php /*a:1:{s:43:"C:\tp6_blog\app\view\admins\admin_edit.html";i:1619944586;}*/ ?>
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
<link rel="stylesheet" type="text/css" href="http://tp6.blog.ca/static/admin/css/font-awesome.min.css">
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
<section class="container-fluid">
  <header>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">切换导航</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="/">Cypher</a> </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="">消息 <span class="badge">1</span></a></li>
            <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">admin <span class="caret"></span></a>
              <ul class="dropdown-menu dropdown-menu-left">
                <li><a title="查看或修改个人信息" data-toggle="modal" data-target="#seeUserInfo">个人信息</a></li>
                <li><a title="查看您的登录记录" data-toggle="modal" data-target="#seeUserLoginlog">登录记录</a></li>
              </ul>
            </li>
            <li><a href="login.html" onClick="if(!confirm('是否确认退出？'))return false;">退出登录</a></li>
            <li><a data-toggle="modal" data-target="#WeChat">帮助</a></li>
          </ul>
          <form action="" method="post" class="navbar-form navbar-right" role="search">
            <div class="input-group">
              <input type="text" class="form-control" autocomplete="off" placeholder="键入关键字搜索" maxlength="15">
              <span class="input-group-btn">
              <button class="btn btn-default" type="submit">搜索</button>
              </span> </div>
          </form>
        </div>
      </div>
    </nav>
  </header>
  <div class="row">
    <aside class="col-sm-3 col-md-2 col-lg-2 sidebar">
      <ul class="nav nav-sidebar">
        <li><a href="index.html">报告</a></li>
      </ul>
      <ul class="nav nav-sidebar">
        <li><a href="article.html">文章</a></li>
        <li><a href="notice.html">公告</a></li>
        <li><a href="comment.html">评论</a></li>
        <li><a data-toggle="tooltip" data-placement="top" title="网站暂无留言功能">留言</a></li>
      </ul>
      <ul class="nav nav-sidebar">
        <li><a href="category.html">栏目</a></li>
        <li><a class="dropdown-toggle" id="otherMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">其他</a>
          <ul class="dropdown-menu" aria-labelledby="otherMenu">
            <li><a href="flink.html">友情链接</a></li>
            <li><a href="loginlog.html">访问记录</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav nav-sidebar">
        <li class="active"><a class="dropdown-toggle" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">用户</a>
          <ul class="dropdown-menu" aria-labelledby="userMenu">
            <li><a href="#">管理用户组</a></li>
            <li><a href="admin_list.html">管理用户</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="loginlog.html">管理登录日志</a></li>
          </ul>
        </li>
        <li><a class="dropdown-toggle" id="settingMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">设置</a>
          <ul class="dropdown-menu" aria-labelledby="settingMenu">
            <li><a href="setting.html">基本设置</a></li>
            <li><a href="readset.html">用户设置</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">安全配置</a></li>
            <li role="separator" class="divider"></li>
            <li class="disabled"><a>扩展菜单</a></li>
          </ul>
        </li>
      </ul>
    </aside>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
      <h1 class="page-header">修改密码</h1>
      <div class="modal-body">
        <table class="table" style="margin-bottom:0px;">
          <thead>
            <tr> </tr>
          </thead>
          <tbody>
            <tr>
              <td wdith="10%">用户名:</td>
              <td width="90%"><?php echo htmlentities($admin_info['admin_name']); ?><input type="hidden" id="adminid" class="form-control" value="<?php echo htmlentities($admin_info['admin_id']); ?>" autocomplete="off" /></td>
            </tr>
            <tr>
              <td wdith="10%">原密码:</td>
              <td width="90%"><input type="password" id="oldpwd" class="form-control"  autocomplete="off" /></td>
            </tr>
            <tr>
              <td wdith="10%">新密码:</td>
              <td width="90%"><input type="password" id="newpwd" class="form-control"  autocomplete="off" /></td>
            </tr>
          </tbody>
          <tfoot>
            <tr></tr>
          </tfoot>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" id="editAdmin" class="btn btn-primary">提交</button>
      </div>
    </div>
  </div>
</section>

<script src="http://tp6.blog.ca/static/admin/js/bootstrap.min.js"></script> 
<script src="http://tp6.blog.ca/static/admin/js/admin-scripts.js"></script>

<script>
  $('#editAdmin').click(function(){
    var id = $('#adminid').val();
    var oldpwd = $('#oldpwd').val();
    var newpwd = $('#newpwd').val();
    if (oldpwd.length<6){
      alert('原始密码不能小于六位');
    }
    else if(newpwd.length<6){
      alert('新密码不能小于六位');
    }
    else{
      $.ajax({
        type:'POST',
        url:'',
        data:{
          'id':id,
          'oldpwd':oldpwd,
          'newpwd':newpwd
        },
        success:function(data){
          if(data == '原始密码不正确'){
            alert('原始密码不正确');
          }
          else if(data == '修改密码成功'){
            alert('修改密码成功')
            $(window.location.href = 'admin_list.html');
          }
        }
      })
    }
  })
</script>