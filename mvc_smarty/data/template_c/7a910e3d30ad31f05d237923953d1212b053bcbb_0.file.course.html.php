<?php
/* Smarty version 3.1.30, created on 2017-06-10 13:45:51
  from "D:\phpStudy\WWW\mvc_smarty\tpl\front\course.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_593b878f16a803_40864089',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7a910e3d30ad31f05d237923953d1212b053bcbb' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\mvc_smarty\\tpl\\front\\course.html',
      1 => 1497073545,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593b878f16a803_40864089 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>课程</title>
	<link rel="stylesheet" type="text/css" href="style/reset.css">
	<link rel="stylesheet" type="text/css" href="style/index.css">
	<link rel="stylesheet" type="text/css" href="style/course.css">
</head>
<body>
	<header id="index_header">
		<h2><a href="index.php" title="">在线学习网</a></h2>
		<nav>
			<ul class="clearfix">
				<li><a href="index.php?controller=index&method=course_list" title="">课程</a></li>
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
			<span><a href="index.php?controller=index&method=homepage&id=<?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
" title=""><?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
</a></span><a href="index.php?controller=index&method=logout" title="">退出</a>
		</div>
	</header><!-- /header -->
	<div class="course_main">
		<div class="course_header">
			<div class="in_auto">
				<h1><?php echo $_smarty_tpl->tpl_vars['cour']->value[0]['course_name'];?>
</h1>
				<div class="author">
					作者：<a href="" title=""><?php echo $_smarty_tpl->tpl_vars['cour']->value[0]['course_author'];?>
</a>
				</div>
				<div class="cou_score">
					<span>难易度:</span><span class="c_score"><?php echo $_smarty_tpl->tpl_vars['cour']->value[0]['score'];?>
</span>
				</div>
				<div class="study_state">
				<?php if ($_smarty_tpl->tpl_vars['learned']->value != '') {?>
					<span><a href="index.php?controller=index&method=study_video&id=<?php echo $_smarty_tpl->tpl_vars['learned']->value[0]['partid'];?>
&uid=<?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
" title="">继续学习</a></span>
				<?php } else { ?>
					<span><a href="index.php?controller=index&method=study_video&id=<?php echo $_smarty_tpl->tpl_vars['parts_i']->value[0]['id'];?>
&uid=<?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
" title="">开始学习</a></span>
				<?php }?>
				
				</div>
			</div>
			
		</div>
		<div class="course_content clearfix">
			<div class="cou_content_l">
				<div class="cou_outer clearfix">
					<div class="cou_summary">
						<span class="summary">简介：</span><span><?php echo $_smarty_tpl->tpl_vars['cour']->value[0]['summary'];?>
</span>
					</div>
					<div class="cou_menu">
						<ul class="clearfix">
							<li><a href="" title="">章节</a></li>
							<!-- <li><a href="" title="">评论</a></li>
							<li><a href="" title="">问答</a></li> -->
						</ul>
					</div>
				</div>


				<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value) {
?>
				<div class="cou_outer clearfix">
					<h4><?php echo $_smarty_tpl->tpl_vars['key']->value['chapter_name'];?>
</h4>
					<div class="chapter">
						<ul>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['parts_i']->value, 'part_i');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['part_i']->value) {
?>
						<?php if ($_smarty_tpl->tpl_vars['part_i']->value['chid'] == $_smarty_tpl->tpl_vars['key']->value['id']) {?>
							<li><a href="index.php?controller=index&method=study_video&id=<?php echo $_smarty_tpl->tpl_vars['part_i']->value['id'];?>
&uid=<?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
" title=""><?php echo $_smarty_tpl->tpl_vars['part_i']->value['part_name'];?>
</a></li>
						<?php }?>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

						</ul>
					</div>
				</div>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				<?php }?>
			</div>
			<div class="cou_content_r">
				<div class="cou_ready">
					<h4>课程须知</h4>
						<?php echo $_smarty_tpl->tpl_vars['cour']->value[0]['ready'];?>

				</div>
				<div class="cou_ready">
					<h4>告诉你能学到什么？</h4>
						<?php echo $_smarty_tpl->tpl_vars['cour']->value[0]['pDes'];?>

				</div>
			</div>
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
