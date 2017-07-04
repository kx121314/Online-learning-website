<?php
/* Smarty version 3.1.30, created on 2017-06-28 21:27:21
  from "D:\phpStudy\WWW\mvc_smarty\tpl\front\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5953aeb9888c75_50908922',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8e375236a056921439ba9073c2f0a0674bbc0e2' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\mvc_smarty\\tpl\\front\\index.html',
      1 => 1498656438,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5953aeb9888c75_50908922 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/reset.css">
	<link rel="stylesheet" type="text/css" href="style/index.css">
	
	<?php echo '<script'; ?>
 src="js/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="js/index.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
</head>
<body>
	<header id="index_header">
		<h2><a href="" title="">在线学习网</a></h2>
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
			
			<?php if ($_smarty_tpl->tpl_vars['userName']->value != '') {?>
			<span><a href="index.php?controller=index&method=homepage&id=<?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
" title=""><?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
</a></span><a href="index.php?controller=index&method=logout" title="">退出</a>
			<?php } else { ?>
			<span><a href="index.php?controller=index&method=login" title="">登录/注册</a></span>
			<?php }?>
		</div>
	</header><!-- /header -->
	<div class="main">
		<div class="head_cont clearfix">	
			<div class="menu" id="menu">
				<ul class="menu_ul">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bigcate']->value, 'onecate');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['onecate']->value) {
?>
					<li><a href="" title=""><span class="menu_title"><?php echo $_smarty_tpl->tpl_vars['onecate']->value['cate_name'];?>
</span></a>
						<div class="menu_side">
							<div class="menu_outer">
								<div class="menu_top">
									<h3>分类目录</h3>
									<div class="menu_details clearfix">
										<div class="mince">
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['smallcate']->value, 'soc');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['soc']->value) {
?>
											<?php if ($_smarty_tpl->tpl_vars['soc']->value['cid'] == $_smarty_tpl->tpl_vars['onecate']->value['id']) {?>
											<a target="_blank" href="index.php?controller=index&method=course_list&cate=<?php echo $_smarty_tpl->tpl_vars['onecate']->value['id'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['soc']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['soc']->value['cate_name'];?>
 </a>
											<span>/</span>
											<?php }?>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

										</div>
									</div>

								</div>
								<div class="menu_bottom">
									<h3>课程推荐</h3>
									<ul>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['commend']->value, 'comone');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['comone']->value) {
?>
										<?php if ($_smarty_tpl->tpl_vars['comone']->value['cid'] == $_smarty_tpl->tpl_vars['onecate']->value['id']) {?>
										<li><a href="index.php?controller=index&method=course&id=<?php echo $_smarty_tpl->tpl_vars['comone']->value['id'];?>
" title=""><?php echo $_smarty_tpl->tpl_vars['comone']->value['course_name'];?>
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
						</div>
					</li>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

					
				</ul>
			</div>


			<div class="imgsturn_outer" id="imgsturn_outer">
				<div class="imgsturn">
					<ul>
						<li style="z-index: 10;"><a href="index.php?controller=index&method=course&id=20" title=""><img src="img/1.jpg"></a></li>
						<li><a href="index.php?controller=index&method=course&id=30" title=""><img src="img/2.jpg"></a></li>
						<li><a href="index.php?controller=index&method=course&id=22" title=""><img src="img/3.jpg"></a></li>
						<li><a href="index.php?controller=index&method=course&id=23" title=""><img src="img/4.jpg"></a></li>
						<li><a href="index.php?controller=index&method=course&id=25" title=""><img src="img/5.jpg"></a></li>
					</ul>
					<ol>
						<li>1</li><li>2</li><li>3</li><li>4</li><li>5</li>
					</ol>
				</div>
			</div>
		</div>
		<div class="subnav clearfix">
				<div class="subnav_son">
					<ul>
						<li><a href=""><span style="background: url(img/icon/subnav_1.png) no-repeat 15% center;">Web前端</span></a></li>
						<li><a href=""><span style="background: url(img/icon/subnav_2.png) no-repeat 15% center;">PHP攻城狮</span></a></li>
						<li><a href=""><span style="background: url(img/icon/subnav_3.png) no-repeat 15% center;">Android</span></a></li>
						<li><a href=""><span style="background: url(img/icon/subnav_4.png) no-repeat 15% center;">java攻城狮</span></a></li>
						<li><a href=""><span style="background: url(img/icon/subnav_5.png) no-repeat 15% center;">IOS攻城狮</span></a></li>
					</ul>
				</div>
		</div>
		
		<div class="detailed_course">
			<div class="detailed_course_title clearfix">
				<h3>最近更新</h3>
				<span class="more"><a href="" title="">更多 ></a></span>
			</div>
			<div class="courses_list clearfix">

				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Tencourse']->value, 'course');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['course']->value) {
?>
				
				<div class="course">
					<a target="_blank" href="index.php?controller=index&method=course&id=<?php echo $_smarty_tpl->tpl_vars['course']->value['id'];?>
" title="" style="color: #000;">
						<div class="course_img" style="background: url(uploads/<?php echo $_smarty_tpl->tpl_vars['course']->value['albumPath'];?>
) no-repeat left top;background-size: 100% 215px;">
							
						</div>
						<div class="title_outer">
							<div class="course_title omit">
								<?php echo $_smarty_tpl->tpl_vars['course']->value['cate_name'];?>
&nbsp;||&nbsp;<?php echo $_smarty_tpl->tpl_vars['course']->value['course_name'];?>

							</div>
							<div class="course_describe">
								<span>描述：</span><?php echo $_smarty_tpl->tpl_vars['course']->value['summary'];?>

							</div>
						</div>
					</a>
				</div>
			
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

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
