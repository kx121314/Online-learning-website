<?php
/* Smarty version 3.1.30, created on 2017-06-10 13:46:53
  from "D:\phpStudy\WWW\mvc_smarty\tpl\front\search.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_593b87cd040c32_09584700',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f85872056c12d4067006f0e53715a5750eece94b' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\mvc_smarty\\tpl\\front\\search.html',
      1 => 1497060744,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593b87cd040c32_09584700 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>全站搜索</title>
	<link rel="stylesheet" type="text/css" href="style/reset.css">
	<link rel="stylesheet" type="text/css" href="style/index.css">
	<link rel="stylesheet" type="text/css" href="style/course_list.css">
	<style type="text/css" media="screen">
		.search_res{
			width: 150px;
			margin:20px auto;
		}
		.search_res h4{
			color: #000;
			font-size: 16px;
		}
	</style>
</head>
<body>
	<header id="index_header">
		<h2><a href="index.php" title="">在线学习网</a></h2>
		<nav>
			<ul class="clearfix">
				<li><a href="index.php?controller=index&method=course_list" title="" class="active">课程</a></li>
				<li><a href="index.php?controller=index&method=article_list" title="">文章</a></li>
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
	<div class="search_res">
		<h4>共搜索到<?php echo $_smarty_tpl->tpl_vars['num']->value[0];?>
门课程</h4>
	</div>
	<div class="display_course">
		<div class="courses_list clearfix">
			<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {?> 
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value) {
?>
			<div class="course">
				<a href="index.php?controller=index&method=course&id=<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
" title="" style="color: #000;">
					<div class="course_img" style="background: url(uploads/<?php echo $_smarty_tpl->tpl_vars['key']->value['albumPath'];?>
) no-repeat left top;background-size: 100% 215px;">
						
					</div>
					<div class="title_outer">
						<div class="course_title omit">
							<?php echo $_smarty_tpl->tpl_vars['key']->value['course_name'];?>

						</div>
						<div class="course_describe">
							<span>描述：</span><?php echo $_smarty_tpl->tpl_vars['key']->value['summary'];?>

						</div>
					</div>
				</a>
			</div>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			<?php }?>
		</div>
		<div class="pagenum">
 			<?php echo $_smarty_tpl->tpl_vars['pages']->value;?>

 		</div>
	</div>
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
