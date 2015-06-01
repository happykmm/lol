<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
   <title>lisandro press 编辑后台</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="<?php echo base_url('public/css/bootstrap.min.css') ?>" rel="stylesheet">
   <script src="<?php echo base_url('public/js/jquery-2.1.1.min.js') ?>"></script>
   <script src="<?php echo base_url('public/js/bootstrap.min.js') ?>"></script>
   <link href="<?php echo base_url('public/css/admin.css') ?>" rel="stylesheet">
   <script src="<?php echo base_url('public/js/admin.js') ?>"></script>
   <link href="<?php echo base_url('public/css/admin-edit.css') ?>" rel="stylesheet">
   <script src="<?php echo base_url('public/js/admin-edit.js') ?>"></script>
   <script src="<?php echo base_url('public/ckeditor/ckeditor.js') ?> "></script>
</head>
<body>

<!-- Hidden data -->
<input type="hidden" id="url_admin" value="<?php echo base_url('index.php/admin/') ?>" /> 
<input type="hidden" id="post_parent" value="<?php echo $article_item['ID'] ?>" />
<input type="hidden" id="post_category" value="<?php echo $article_item['post_category'] ?>" />

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
         <li><a href="<?php echo base_url('index.php/front/home') ?>">参赛作品</a></li>
         <li class="active"><a href="<?php echo base_url('index.php/admin/artlist') ?>">我要投稿</a></li>
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

<nav id="left" class="navbar navbar-inverse" role="navigation">
   <ul class="nav nav-pills nav-stacked">
      <li id="btnArtList"><a href="<?php echo base_url('index.php/admin/artlist') ?>">所有文章</a></li>
      <li id="btnNewArt" class="active"><a href="<?php echo base_url('index.php/admin/newart') ?>">编辑文章</a></li>
   </ul>
</nav>
<div id="rightwrap">
   <div id="edit">
      <h3>编辑文章</h3>
      <div class="btn-group">
         <button type="button" id="btnCate" class="btn btn-default">选择分类</button>
         <button type="button" class="btn btn-default dropdown-toggle" 
            data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">切换下拉菜单</span>
         </button>
         <ul class="dropdown-menu" role="menu">
            <li><a id="aCate1" href="#">分类一</a></li>
            <li><a id="aCate2" href="#">分类二</a></li>
            <li><a id="aCate3" href="#">分类三</a></li>
         </ul>
      </div>
      <button type="button" id="btnDraft" class="btn btn-default">保存草稿</button>
      <button type="button" id="btnPreview" class="btn btn-default">预览</button>
      <button type="button" id="btnPublish" class="btn btn-primary">发布</button>
      <h3></h3>
      <div class="input-group">
         <span class="input-group-addon">标题</span>
         <input type="text" id="txtTitle" class="form-control" value="<?php echo $article_item['post_title'] ?>">
      </div>
      <h3></h3>
      <textarea name="editor1" id="editor1" rows="10" cols="80"><?php echo $article_item['post_content'] ?> </textarea>
      <script>
         CKEDITOR.replace( 'editor1' );
         CKEDITOR.config.height = 500;
      </script>
   </div>
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
            发布成功！
         </div>
         <div class="modal-footer">
            <button id="btnToAdmin" type="button" class="btn btn-primary">
               返回控制台
            </button>
         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal -->
   </div> <!-- Mymodal -->
</div> <!--The end of rightwrap-->
</body>
</html>

