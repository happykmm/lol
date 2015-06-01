<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
   <title>英雄史诗创作大赛</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="<?php echo base_url('public/css/bootstrap.min.css') ?>" rel="stylesheet">
   <script src="<?php echo base_url('public/js/jquery-2.1.1.min.js') ?>"></script>
   <script src="<?php echo base_url('public/js/bootstrap.min.js') ?>"></script>
   <link href="<?php echo base_url('public/css/front-newart.css') ?>" rel="stylesheet">
   <script src="<?php echo base_url('public/js/front-newart.js') ?>"></script>
   <script src="<?php echo base_url('public/ckeditor/ckeditor.js') ?> "></script>
   <script src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="101167470" 
data-redirecturi="<?php echo base_url('loginsucc.php') ?>" charset="utf-8"></script>
</head>
<body>
<!-- Hidden data -->
<input type="hidden" id="base_url" value="<?php echo base_url() ?>"> 

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
       <a class="navbar-brand" href="<?php echo base_url('index.php/front/newart') ?>">英雄史诗创作大赛</a>
     </div>
     <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px; ">
       <ul class="nav navbar-nav">
         <li><a href="<?php echo base_url('index.php/front/newart') ?>">&nbsp;主&nbsp;页&nbsp;</a></li>
         <li><a href="<?php echo base_url('index.php/front/newart') ?>">参赛作品</a></li>
         <li class="active"><a href="<?php echo base_url('index.php/front/newart') ?>">我要投稿</a></li>
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



<div id="pgwrap">
  <div class="col-md-1"></div>
  <div class="col-md-3">
    <h3>账号登陆</h3>
    <p><span id="qqLoginBtn"></span></p>
    <div id="QCwrap" class="thumbnail" style="display:none">
      <img id="QCfigure" src="" alt="">
      <p id="QCnickname" align="center">欢迎 </p>
      <div class="text-center">
        <a href="#" id="QClogout" class="btn btn-default" role="button">注销登陆</a>
      </div>
    </div>
    <p></p>
    <h3>作者信息</h3>
    <p></p>
    <div class="input-group">
       <span class="input-group-addon">笔名</span>
       <input type="text" id="user_penname" class="form-control">
    </div>
    <p></p>
    <div class="input-group">
       <span class="input-group-addon">姓名</span>
       <input type="text" id="user_realname" class="form-control">
    </div>
    <p></p>
    <div class="input-group">
       <span class="input-group-addon">手机</span>
       <input type="text" id="user_phone" class="form-control">
    </div>
    <p></p>
    <div class="input-group">
       <span class="input-group-addon">邮箱</span>
       <input type="text" id="user_email" class="form-control">
    </div>
    <p></p>
    <button type="button" id="btnPublish" class="btn btn-primary">提交</button>
    <p></p>
  </div>
  <div class="col-md-7">
    <div id="edit">
      <div class="input-group">
         <span class="input-group-addon">标题</span>
         <input type="text" id="txtTitle" class="form-control">
      </div>
      <h3></h3>
      <textarea name="editor1" id="editor1" rows="10" cols="80" style="width:100%; resize:none"></textarea>
      <script type="text/javascript">
          CKEDITOR.replace( 'editor1' );
          CKEDITOR.config.height = 420;
      </script>
    </div>
  </div>
  <div class="col-md-1"></div>

  <div id="msgwrap">
  </div>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
  aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header">
          <button type="button" class="close" 
             data-dismiss="modal" aria-hidden="true">
                &times;
          </button>
          <h4 class="modal-title" id="myModalLabel">
             提示信息
          </h4>
       </div>
       <div class="modal-body">
          <p>您的参赛作品已经提交成功！</p>
          <p>再次编辑此页面可以修改作品。</p>
       </div>
       <div class="modal-footer">
          <button id="btnToAdmin" type="button" class="btn btn-primary">
             返回
          </button>
       </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal -->
  </div> <!-- Mymodal -->
</div> <!--The end of pgwrap-->
</body>
</html>

