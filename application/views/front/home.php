 <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
   <title>lisandro press 编辑后台</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="<?php echo base_url('public/css/bootstrap.min.css') ?>" rel="stylesheet">
   <script src="<?php echo base_url('public/js/jquery-2.1.1.min.js') ?>"></script>
   <script src="<?php echo base_url('public/js/bootstrap.min.js') ?>"></script>
   <link href="<?php echo base_url('public/css/front.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('public/css/front-home.css') ?>" rel="stylesheet">
</head>
<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
   <div class="container">
     <div class="navbar-header">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>
       <a class="navbar-brand" href="<?php echo base_url('index.php/front/home') ?>">英雄史诗创作大赛</a>
     </div>
     <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px; ">
       <ul class="nav navbar-nav">
         <li class="active"><a href="<?php echo base_url('index.php/front/home') ?>">&nbsp;主&nbsp;页&nbsp;</a></li>
         <li><a href="<?php echo base_url('index.php/front/artlist') ?>">参赛作品</a></li>
         <li><a href="<?php echo base_url('index.php/front/newart') ?>">我要投稿</a></li>
         <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown">关于我们 <span class="caret"></span></a>
           <ul class="dropdown-menu" role="menu">
             <li><a href="#">浙江大学腾讯俱乐部</a></li>
             <li><a href="#">浙江大学星空文学社</a></li>
           </ul>
         </li>
       </ul>
     </div><!--/.nav-collapse -->
   </div>
</nav>

<div id="bgwrap">
<div id="bgimg" style="background-image: url(<?php echo base_url('public/img/front-bg.jpg') ?>)"></div>
</div>
<div id="pgwrap">
	<div id="headwrap">
		
	</div>
	<div id="mainwrap">
      <h3>我是主页</h3>
      <p>我是主页  我就是我</p>
		
	</div><!--The end of mainwrap-->
	<div id="footwrap">
		
	</div>
</div><!--The end of pgwrap-->
</body>
</html>

