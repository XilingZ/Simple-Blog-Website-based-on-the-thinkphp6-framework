<?php /*a:1:{s:36:"C:\tp6_blog\app\view\index\list.html";i:1620814524;}*/ ?>
<!doctype html>
<html>
<head>
<meta charset="gb2312">
<title>博客列表-Cypher</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://tp6.blog.ca/static/frontstage/css/styles.css" rel="stylesheet">
<link href="http://tp6.blog.ca/static/frontstage/css/view.css" rel="stylesheet">
<!-- 返回顶部调用 begin -->
<link href="http://tp6.blog.ca/static/frontstage/css/lrtk.css" rel="stylesheet" />
<script type="text/javascript" src="http://tp6.blog.ca/static/frontstage/js/jquery.js"></script>
<script type="text/javascript" src="http://tp6.blog.ca/static/frontstage/js/js.js"></script>
<!-- 返回顶部调用 end-->
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
</head>
<style>
.pagination{display:inline-block;padding-left:0;margin:20px 0;border-radius:4px}.pagination>li{display:inline}.pagination>li>a,.pagination>li>span{position:relative;float:left;padding:6px 12px;margin-left:-1px;line-height:1.42857143;color:#337ab7;text-decoration:none;background-color:#fff;border:1px solid #ddd}.pagination>li:first-child>a,.pagination>li:first-child>span{margin-left:0;border-top-left-radius:4px;border-bottom-left-radius:4px}.pagination>li:last-child>a,.pagination>li:last-child>span{border-top-right-radius:4px;border-bottom-right-radius:4px}.pagination>li>a:focus,.pagination>li>a:hover,.pagination>li>span:focus,.pagination>li>span:hover{z-index:3;color:#23527c;background-color:#eee;border-color:#ddd}.pagination>.active>a,.pagination>.active>a:focus,.pagination>.active>a:hover,.pagination>.active>span,.pagination>.active>span:focus,.pagination>.active>span:hover{z-index:2;color:#fff;cursor:default;background-color:#337ab7;border-color:#337ab7}.pagination>.disabled>a,.pagination>.disabled>a:focus,.pagination>.disabled>a:hover,.pagination>.disabled>span,.pagination>.disabled>span:focus,.pagination>.disabled>span:hover{color:#777;cursor:not-allowed;background-color:#fff;border-color:#ddd}.pagination-lg>li>a,.pagination-lg>li>span{padding:10px 16px;font-size:18px;line-height:1.3333333}.pagination-lg>li:first-child>a,.pagination-lg>li:first-child>span{border-top-left-radius:6px;border-bottom-left-radius:6px}.pagination-lg>li:last-child>a,.pagination-lg>li:last-child>span{border-top-right-radius:6px;border-bottom-right-radius:6px}.pagination-sm>li>a,.pagination-sm>li>span{padding:5px 10px;font-size:12px;line-height:1.5}.pagination-sm>li:first-child>a,.pagination-sm>li:first-child>span{border-top-left-radius:3px;border-bottom-left-radius:3px}.pagination-sm>li:last-child>a,.pagination-sm>li:last-child>span{border-top-right-radius:3px;border-bottom-right-radius:3px}
</style>
<body>
<header>
  <nav id="nav">
    <ul>
      <li><a href="/" >网站首页</a></li>
      <?php foreach($category as $v): ?>
        <li><a href="/index/list?cate_id=<?php echo htmlentities($v['cate_id']); ?>&page=1" title="<?php echo htmlentities($v['cate_name']); ?>"><?php echo htmlentities($v['cate_name']); ?></a></li>
      <?php endforeach; ?>
    </ul>
    <script src="http://tp6.blog.ca/static/frontstage/js/silder.js"></script><!--获取当前页导航 高亮显示标题--> 
  </nav>
</header>
<!--header end-->
<div id="mainbody">
  <div class="blogs">
    <div class="newlist">
      <h2>您当前的位置：
        <a href="/index.html">首页</a> 
        <a href="/index/list?cate_id=<?php echo htmlentities($one_cate['cate_id']); ?>"><?php echo htmlentities($one_cate['cate_name']); ?></a>
      </h2>
      <ul>
        <?php foreach($cate_article as $v): ?>
          <p class="ptit"><b><a href="/index/article?article_id=<?php echo htmlentities($v['article_id']); ?>"> <?php echo htmlentities($v['article_title']); ?> </a></b></p>
          <p class="ptime">发布时间：<?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($v['article_time'])? strtotime($v['article_time']) : $v['article_time'])); ?> 作者：<?php echo htmlentities($v['article_writer']); ?>  分类：<?php echo htmlentities($one_cate['cate_name']); ?> </p>
          <a href="/index/article?article_id=<?php echo htmlentities($v['article_id']); ?>"><img src="http://tp6.blog.ca/storage/<?php echo htmlentities($v['article_img']); ?>" class="imgdow"></a> 
          <p class="pcon"><?php echo mb_substr($v['article_content'],0,120); ?></p>
          <p class="pcon"><a href="/index/article?article_id=<?php echo htmlentities($v['article_id']); ?>">更多内容</a></p>
          <div class="line"></div>
        <?php endforeach; ?>
      </ul>
      <div class="row">
        <ul class="pagination">
          <li><a href="?cate_id=<?php echo htmlentities($one_cate['cate_id']); ?>&page=<?php echo htmlentities($pre_page); ?>">上一页</a></li>
          <li><a href="?cate_id=<?php echo htmlentities($one_cate['cate_id']); ?>&page=<?php echo htmlentities($next_page); ?>">下一页</a></li>
          <li>当前第<?php echo htmlentities($page); ?>页</li>
          <li>总共有<?php echo htmlentities($total); ?>页</li>
        </ul>
      </div>
    </div>
    <!--bloglist end-->
    <aside>
      <!--搜索框
      <div class="search">
        <form class="searchform" method="get" action="#">
          <input type="text" name="s" value="Search" onfocus="this.value=''" onblur="this.value='Search'">
        </form>
      </div>
      -->
      <div class="tuijian">
        <h2>栏目更新</h2>
        <ol>
          <?php foreach($ten as $v): ?>
            <li><a href="/index/article?article_id=<?php echo htmlentities($v['article_id']); ?>"><?php echo htmlentities($v['article_title']); ?></a></li>
          <?php endforeach; ?>
        </ol>
      </div>
      <div class="toppic">
        <h2>图文并茂</h2>
        <ul>
          <?php foreach($three as $v): ?>
            <li><a href="/index/article?article_id=<?php echo htmlentities($v['article_id']); ?>"><img src="http://tp6.blog.ca/storage/<?php echo htmlentities($v['article_img']); ?>"><?php echo htmlentities($v['article_title']); ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <!--
      <div class="clicks">
        <h2>热门点击</h2>
        <ol>
          <li><span><a href="/">慢生活</a></span><a href="/">有一种思念，是淡淡的幸福,一个心情一行文字</a></li>
          <li><span><a href="/">爱情美文</a></span><a href="/">励志人生-要做一个潇洒的女人</a></li>
          <li><span><a href="/">慢生活</a></span><a href="/">女孩都有浪漫的小情怀——浪漫的求婚词</a></li>
          <li><span><a href="/">博客模板</a></span><a href="/">Green绿色小清新的夏天-个人博客模板</a></li>
          <li><span><a href="/">女生个人博客</a></span><a href="/">女生清新个人博客网站模板</a></li>
          <li><span><a href="/">Wedding</a></span><a href="/">Wedding-婚礼主题、情人节网站模板</a></li>
          <li><span><a href="/">三栏布局</a></span><a href="/">Column 三栏布局 个人网站模板</a></li>
          <li><span><a href="/">个人网站模板</a></span><a href="/">时间煮雨-个人网站模板</a></li>
          <li><span><a href="/">古典风格</a></span><a href="/">花气袭人是酒香—个人网站模板</a></li>
        </ol>
      </div>
      -->
    </aside>
  </div>
  <!--blogs end--> 
</div>
<!--mainbody end-->
<footer>
  <div class="footer-mid">
    <div class="links">
      <h2>友情链接</h2>
      <ul>
        <li><a href="/">Cypher个人博客</a></li>
      </ul>
    </div>
    <div class="visitors">
      <h2>最新评论</h2>
      <!--
      <dl>
        <dt><img src="http://tp6.blog.ca/static/frontstage/images/s8.jpg">
        <dt>
        <dd>DanceSmile
          <time>49分钟前</time>
        </dd>
        <dd>在 <a href="http://www.yangqq.com/jstt/bj/2013-07-28/530.html" class="title">如果要学习web前端开发，需要学习什么？ </a>中评论：</dd>
        <dd>文章非常详细，我很喜欢.前端的工程师很少，我记得几年前yahoo花高薪招聘前端也招不到</dd>
      </dl>
      -->
    </div>
    <section class="flickr">
      <h2>摄影作品</h2>
      <ul>
        <li><a href="/"><img src="http://tp6.blog.ca/static/frontstage/images/01.jpg"></a></li>
        <li><a href="/"><img src="http://tp6.blog.ca/static/frontstage/images/02.jpg"></a></li>
        <li><a href="/"><img src="http://tp6.blog.ca/static/frontstage/images/03.jpg"></a></li>
        <li><a href="/"><img src="http://tp6.blog.ca/static/frontstage/images/04.jpg"></a></li>
        <li><a href="/"><img src="http://tp6.blog.ca/static/frontstage/images/05.jpg"></a></li>
        <li><a href="/"><img src="http://tp6.blog.ca/static/frontstage/images/06.jpg"></a></li>
        <li><a href="/"><img src="http://tp6.blog.ca/static/frontstage/images/07.jpg"></a></li>
        <li><a href="/"><img src="http://tp6.blog.ca/static/frontstage/images/08.jpg"></a></li>
        <li><a href="/"><img src="http://tp6.blog.ca/static/frontstage/images/09.jpg"></a></li>
      </ul>
    </section>
  </div>
  <div class="footer-bottom">
    <p>Copyright 2021 Design by <a href="https://www.xiling.ca">Cypher</a></p>
  </div>
</footer>
<!-- jQuery仿腾讯回顶部和建议 代码开始 -->
<div id="tbox"> <a id="togbook" href="/e/tool/gbook/?bid=1"></a> <a id="gotop" href="javascript:void(0)"></a> </div>
<!-- 代码结束 -->
</body>
</html>