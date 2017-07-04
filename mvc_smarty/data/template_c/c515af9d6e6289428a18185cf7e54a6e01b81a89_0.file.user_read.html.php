<?php
/* Smarty version 3.1.30, created on 2017-06-05 23:36:14
  from "D:\phpStudy\WWW\mvc_smarty\tpl\front\user_read.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59357a6e56d216_66934017',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c515af9d6e6289428a18185cf7e54a6e01b81a89' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\mvc_smarty\\tpl\\front\\user_read.html',
      1 => 1496676968,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59357a6e56d216_66934017 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学过的课程</title>
	<link rel="stylesheet" type="text/css" href="style/homepage.css">
	<link rel="stylesheet" type="text/css" href="style/reset.css">
</head>
<style type="text/css" media="screen">
.one_couser{
	margin-top: 30px;
}
.one_couser .study_time{
	display: inline-block;
	margin: 30px 0;
	float: left;
	width: 10%;
	text-align: center;
	color: rgb(46,51,63);
}
.continue_study{
	height: 106px;
	float: right;
	width: 10%;
	text-align: center;
	line-height: 106px;
	margin-right: 40px;
}

.h3_outer h3{
	float: left;
	margin: 20px 30px;
	max-width: 55%;
	line-height: 30px;
}
.h3_outer span{
	display: inline-block;
	margin-top: 40px;
	float: left;
}
</style>
<body>
	<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value) {
?>
	<div class="one_couser clearfix">
		<span class="study_time">
			<span class="year"><?php echo $_smarty_tpl->tpl_vars['tim']->value['y'];?>
</span>
			<span class="date"><?php echo $_smarty_tpl->tpl_vars['tim']->value['md'];?>
</span></span>
		<div class="couser_ed">
			<div class="article_info">
				<div class="h3_outer">
					<h3><?php echo $_smarty_tpl->tpl_vars['key']->value['article_name'];?>
</h3>
					<span>—— <?php echo $_smarty_tpl->tpl_vars['key']->value['author'];?>
</span>
				</div>
				<div class="continue_study">
					<a href="index.php?controller=index&method=read&id=<?php echo $_smarty_tpl->tpl_vars['key']->value['articleid'];?>
&uid=<?php echo $_smarty_tpl->tpl_vars['key']->value['userid'];?>
" target="_parent" title=""><span>查看</span></a>
				</div>
			</div>
		</div>
		<div class="couser_delete">
		<a href="index.php?controller=index&method=delreaded&id=<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
&uid=<?php echo $_smarty_tpl->tpl_vars['key']->value['userid'];?>
" title=""></a>
		</div>
	</div>	
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	<?php }?>	
</body>
</html><?php }
}
