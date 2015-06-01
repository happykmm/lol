<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
	<title>用户登录</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo base_url('public/css/bootstrap.min.css') ?>" rel="stylesheet">
	<script src="<?php echo base_url('public/js/jquery-2.1.1.min.js') ?>"></script>
	<script src="<?php echo base_url('public/js/bootstrap.min.js') ?>"></script>
  <script src="<?php echo base_url('public/js/front-login.js') ?>"></script>
	<script src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="101167470" 
data-redirecturi="<?php echo base_url('loginsucc.php') ?>" charset="utf-8"></script>
</head>
<body>
<!-- Hidden data -->
<input type="hidden" id="url_admin" value="<?php echo base_url('index.php/admin') ?>" /> 
<div class="jumbotron masthead">
  <div class="container">
    <h1>英雄史诗 由你来写</h1>
    <h2>英雄联盟原创故事大赛，腾讯俱乐部携手星空文学社重磅来袭</h2>
  </div>
</div>
<div class="jumbotron">
  <h3>账号登陆</h3>
  <p><span id="qqLoginBtn"></span></p>
  <div id="QCwrap" class="thumbnail" style="display:none">
    <img id="QCfigure" src="" alt="">
    <p id="QCnickname" align="center">欢迎 </p>
    <div class="text-center">
      <a href="#" id="QClogout" class="btn btn-default" role="button">注销登陆</a>
    </div>
  </div>
</div>


</body>
</html>