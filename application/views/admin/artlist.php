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
   <link href="<?php echo base_url('public/css/admin-artlist.css') ?>" rel="stylesheet">
   <script src="<?php echo base_url('public/js/admin-artlist.js') ?>"></script>
</head>
<body>
<!-- Hidden data -->
<input type="hidden" id="status" value="<?php echo $status ?>" />

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
      <li id="btnArtList" class="active"><a href="<?php echo base_url('index.php/admin/artlist') ?>">所有文章</a></li>
      <li id="btnNewArt" ><a href="<?php echo base_url('index.php/admin/newart') ?>">新建文章</a></li>
   </ul>
</nav>
<div id="rightwrap">
   <div id="artlist">
      <h3>文章列表</h3>
      <ol class="breadcrumb">
         <li><?php if($status==0) echo "全部"; 
                  else echo "<a href='".base_url('index.php/admin/artlist/0')."'>全部</a>" ?></li>
         <li><?php if($status==1) echo "已发布"; 
                  else echo "<a href='".base_url('index.php/admin/artlist/1')."'>已发布</a>" ?></li>
         <li><?php if($status==2) echo "草稿"; 
                  else echo "<a href='".base_url('index.php/admin/artlist/2')."'>草稿</a>" ?></li>
         <li><?php if($status==-1) echo "回收站"; 
                  else echo "<a href='".base_url('index.php/admin/artlist/-1')."'>回收站</a>" ?></li>
      </ol>
      <div class="btn-group">
         <button type="button" class="btn btn-default">批量操作</button>
         <button type="button" class="btn btn-default dropdown-toggle" 
            data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">切换下拉菜单</span>
         </button>
         <ul class="dropdown-menu" role="menu">
            <li><a href="#">删除</a></li>
         </ul>
      </div>
      <div class="btn-group">
         <button type="button" class="btn btn-default">所有分类</button>
         <button type="button" class="btn btn-default dropdown-toggle" 
            data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">切换下拉菜单</span>
         </button>
         <ul class="dropdown-menu" role="menu">
            <li><a href="#">分类一</a></li>
            <li><a href="#">分类二</a></li>
            <li><a href="#">分类三</a></li>
         </ul>
      </div>
      <div class="btn-group">
         <button type="button" class="btn btn-default">排序</button>
         <button type="button" class="btn btn-default dropdown-toggle" 
            data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only">切换下拉菜单</span>
         </button>
         <ul class="dropdown-menu" role="menu">
            <li><a href="#">时间倒序</a></li>
            <li><a href="#">时间顺序</a></li>
            <li><a href="#">标题顺序</a></li>
            <li><a href="#">标题倒序</a></li>
            <li><a href="#">作者顺序</a></li>
            <li><a href="#">作者倒序</a></li>
         </ul>
      </div>
      <h3> </h3>
      <table class="table table-striped ">
         <thead>
            <tr>
               <th><label><input type="checkbox" value=""></label></th>
               <th>标题</th>
               <th>分类</th>
               <th>作者</th>
               <th>修改时间</th>
               <th>操作</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($article as $article_item): ?>
            <tr>
               <td><label><input type="checkbox" value=""></label></td>
               <td> <?php echo $article_item['post_title'] ?> </td>
               <td> <?php echo $article_item['post_category'] ?></td>
               <td> <?php echo $article_item['post_author'] ?></td>
               <td> <?php echo $article_item['post_modified'] ?></td>
               <td> <?php if ($status == -1)
      echo "<a href='".base_url('index.php/admin/retrieve/'.$article_item['ID'])."'>恢复</a>";
   else {
      echo "<a href='".base_url('index.php/admin/edit/'.$article_item['ID'])."'>编辑</a>";
      echo " | ";
      echo "<a href='".base_url('index.php/admin/delete/'.$article_item['ID'])."'>删除</a>"; 
   }  ?>
               </td> 
            </tr>
            <?php endforeach ?>

         </tbody>
      </table>
   </div>
   </div> <!--The end of rightwrap-->
</body>
</html>