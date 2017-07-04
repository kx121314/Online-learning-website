<?php
/* Smarty version 3.1.30, created on 2017-07-04 21:38:30
  from "D:\phpStudy\WWW\mvc_smarty\tpl\front\read.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_595b9a560b1628_90573065',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d257e7382a5032d6cb19db30dfa9bb0dac42ece' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\mvc_smarty\\tpl\\front\\read.html',
      1 => 1497060734,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_595b9a560b1628_90573065 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'D:\\phpStudy\\WWW\\mvc_smarty\\framework\\libs\\view\\Smarty\\plugins\\modifier.date_format.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文章</title>
	<link rel="stylesheet" type="text/css" href="style/reset.css">
	<link rel="stylesheet" type="text/css" href="style/index.css">
	<style type="text/css" media="screen">
		article{
			position: relative;
			background-color: #fff;
			width: 60%;
			margin:0 auto;
			padding: 60px;
		}
		.art_header{
			margin-bottom: 30px;
		}
		article h3{
			text-align:center;
			margin-bottom: 10px;
		}
		article .author{
			margin-left: 600px;
		}
		article .pubtime{
			position: absolute;
			top: 30px;
			right: 80px;
		}
	</style>
</head>
<body>
	<header id="index_header">
		<h2><a href="index.php" title="">在线学习网</a></h2>
		<nav>
			<ul class="clearfix">
				<li><a href="index.php?controller=index&method=course_list" title="">课程</a></li>
				<li><a href="index.php?controller=index&method=article_list" title="" class="active">文章</a></li>
				<li><a href="" title=""></a></li>
			</ul>
		</nav>
		<div class="nav_right">
			<div class="inputout">
			<form action="index.php?controller=index&method=searchAll" method="post" accept-charset="utf-8">
				<input type="search" name="search" value="" placeholder="搜索全站">
				<span><input type="submit" name="" value=""></span>
			</form>
			</div>
			<?php if ($_smarty_tpl->tpl_vars['userName']->value != '') {?>
			<span><a href="index.php?controller=index&method=homepage&id=<?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
" title=""><?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
</a></span><a href="index.php?controller=index&method=logout" title="">退出</a>
			<?php } else { ?>
			<span><a href="index.php?controller=index&method=login" title="">登录/注册</a></span>
			<?php }?>
		</div>
	</header><!-- /header -->
	<article>
		<section class="art_header">
			<h3><?php echo $_smarty_tpl->tpl_vars['data']->value[0]['article_name'];?>
</h3>
			<span class="author"><?php echo $_smarty_tpl->tpl_vars['data']->value[0]['author'];?>
</span>
			<span class="pubtime"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value[0]['pubtime'],'%Y-%m-%d');?>
</span>
		</section>
		<section class="contnet">
			<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['content'];?>

		</section>
	</article>
	<footer>
		<div class="footer_main">
			<div class="footer_top">
 				<ul class="clearfix">
 					<li><a href="" title="">关于我们</a></li>
 					<li><a href="" title="">联系我们</a></li>
 					<li><a href="" title="">帮助中心</a></li>
 					<li><a href="" title="">内容招募</a></li>
 					<li><a href="" title="">意见反馈</a></li>
 				</ul>
			</div>
			<div class="footer_bottom">
				&copy 软件工程13-4 赵东雨
			</div>
		</div>
	</footer>
</body>
</html><?php }
}
