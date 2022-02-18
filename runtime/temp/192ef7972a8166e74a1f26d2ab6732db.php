<?php /*a:1:{s:37:"C:\tp6_blog\app\view\index\index.html";i:1620814530;}*/ ?>

<!doctype html>
<html>
<head>
<meta charset="gb2312">
<title>博客首页-Cypher</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://tp6.blog.ca/static/frontstage/css/styles.css" rel="stylesheet">
<link href="http://tp6.blog.ca/static/frontstage/css/animation.css" rel="stylesheet">
<!-- 返回顶部调用 begin -->
<link href="http://tp6.blog.ca/static/frontstage/css/lrtk.css" rel="stylesheet" />
<script type="text/javascript" src="http://tp6.blog.ca/static/frontstage/js/jquery.js"></script>
<script type="text/javascript" src="http://tp6.blog.ca/static/frontstage/js/js.js"></script>
<!-- 返回顶部调用 end-->
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
</head>
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
  <div class="info">
    <figure> <img src="http://tp6.blog.ca/static/frontstage/images/art.jpg"  alt="Panama Hat">
      <figcaption><strong>新网站，基于thinkphp6开发</strong>新网站，很多功能还没添加，敬请期待 </figcaption>
    </figure>
    <div class="card">
      <h1>我的名片</h1>
      <p>网名：Cypher</p>
      <p>职业：学生兼初级Web开发</p>
      <p>电话：13455166680</p>
      <p>Email：obazxl@gmail.com</p>
      <ul class="linkmore">
        <li><a href="/" class="talk" title="给我留言"></a></li>
        <li><a href="/" class="address" title="联系地址"></a></li>
        <li><a href="/" class="email" title="给我写信"></a></li>
        <li><a href="/" class="photos" title="生活照片"></a></li>
        <li><a href="/" class="heart" title="关注我"></a></li>
      </ul>
    </div>
  </div>
  <!--info end-->
  <div class="blank"></div>
  <div class="blogs">
    <ul class="bloglist">
      <?php foreach($article as $v): ?>
        <li>
          <div class="arrow_box">
            <div class="ti"></div>
            <!--三角形-->
            <div class="ci"></div>
            <!--圆形-->
            <h2 class="title"><a href="/index/article?article_id=<?php echo htmlentities($v['article_id']); ?>"><?php echo htmlentities($v['article_title']); ?></a></h2>
            <ul class="textinfo">
              <a href="/index/article?article_id=<?php echo htmlentities($v['article_id']); ?>"><img src="http://tp6.blog.ca/storage/<?php echo htmlentities($v['article_img']); ?>"></a>
              <p> <?php echo htmlentities($v['article_title']); ?></p>
            </ul>
            <ul class="details">
              <li class="likes"><a href="#"><?php echo htmlentities($v['article_good']); ?></a></li>
              <li class="comments"><a href="#">34</a></li>
              <li class="icon-time"><a href="#"><?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($v['article_time'])? strtotime($v['article_time']) : $v['article_time'])); ?></a></li>
            </ul>
          </div>
          <!--arrow_box end--> 
        </li>
      <?php endforeach; ?>
    </ul>
    <!--bloglist end-->
    <aside>
      <div class="tuijian">
        <h2>推荐文章</h2>
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
      <div class="search">
        <form class="searchform" method="get" action="#">
          <input type="text" name="s" value="Search" onfocus="this.value=''" onblur="this.value='Search'">
        </form>
      </div>
      <div class="viny">
        <dl>
          <dt class="art"><img src="http://tp6.blog.ca/static/frontstage/images/artwork.png" alt="专辑"></dt>
          <dd class="icon-song"><span></span>南方姑娘</dd>
          <dd class="icon-artist"><span></span>歌手：赵雷</dd>
          <dd class="icon-album"><span></span>所属专辑：《赵小雷》</dd>
          <dd class="icon-like"><span></span><a href="/">喜欢</a></dd>
          <dd class="music">
            <audio src="http://tp6.blog.ca/static/frontstage/images/nf.mp3" controls></audio>
          </dd>
        </dl>
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