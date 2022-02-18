<?php /*a:1:{s:39:"C:\tp6_blog\app\view\index\article.html";i:1620814537;}*/ ?>

<!doctype html>
<html>
<head>
<meta charset="gb2312">
<title>文章详情-Cypher</title>
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
<body>
<header>
  <nav id="nav">
    <ul>
      <li><a href="/index.html" >网站首页</a></li>
      <?php foreach($category as $v): ?>
        <li><a href="/index/list?cate_id=<?php echo htmlentities($v['cate_id']); ?>&page=1" title="<?php echo htmlentities($v['cate_name']); ?>"><?php echo htmlentities($v['cate_name']); ?></a></li>
      <?php endforeach; ?>
    </ul>
    <script src="js/silder.js"></script><!--获取当前页导航 高亮显示标题--> 
  </nav>
</header>
<!--header end-->
<div id="mainbody">
  <div class="blogs">
    <div id="index_view">
      <h2 class="t_nav"><a href="/">网站首页</a>
        <?php foreach($category as $v): if($v['cate_id'] == $article['cate_id']): ?>
            <a href="/index/list?cate_id=<?php echo htmlentities($v['cate_id']); ?>"><?php echo htmlentities($v['cate_name']); ?></a>
          <?php endif; ?>
        <?php endforeach; ?>
      </h2>
      <h1 class="c_titile"><?php echo htmlentities($article['article_title']); ?></h1>
      <p class="box">发布时间：<?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($article['article_time'])? strtotime($article['article_time']) : $article['article_time'])); ?><span>编辑：<?php echo htmlentities($article['article_writer']); ?></span>阅读（<?php echo htmlentities($article['article_click']); ?>）</p>
      <ul>
        <?php echo $article['article_content']; ?>
      </ul>
      <div class="share"> 
        <!-- Baidu Button BEGIN -->
        <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare"> <span class="bds_more">分享到：</span> <a class="bds_qzone"></a> <a class="bds_tsina"></a> <a class="bds_tqq"></a> <a class="bds_renren"></a> <a class="bds_t163"></a> <a class="shareCount"></a> </div>
        <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script> 
        <script type="text/javascript" id="bdshell_js"></script> 
        <script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script> 
        <!-- Baidu Button END --> 
      </div>
      <!--
      <div class="otherlink">
        <h2>相关文章</h2>
        <ul>
          <li><a href="/newstalk/mood/2013-07-24/518.html" title="我希望我的爱情是这样的">我希望我的爱情是这样的有种情谊，不是爱情，也算不得友情有种情谊，不是爱情，也算不得友情</a></li>
          <li><a href="/newstalk/mood/2013-07-02/335.html" title="有种情谊，不是爱情，也算不得友情">有种情谊，不是爱情，也算不得友情有种情谊，不是爱情，也算不得友情有种情谊，不是爱情，也算不得友情</a></li>
          <li><a href="/newstalk/mood/2013-07-01/329.html" title="世上最美好的爱情">世上最美好的爱情</a></li>
          <li><a href="/news/read/2013-06-11/213.html" title="爱情没有永远，地老天荒也走不完">爱情没有永远，地老天荒也走不完</a></li>
          <li><a href="/news/s/2013-06-06/24.html" title="爱情的背叛者">爱情的背叛者</a></li>
        </ul>
      </div>
      -->
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