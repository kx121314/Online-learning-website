<?php
/* Smarty version 3.1.30, created on 2017-05-24 22:44:47
  from "D:\phpStudy\WWW\mvc_smarty\tpl\front\messages.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59259c5f7536a5_29619021',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa57ff9ebbb1c270fea5bb748d66381c7ce95f2d' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\mvc_smarty\\tpl\\front\\messages.html',
      1 => 1495637083,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59259c5f7536a5_29619021 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'D:\\phpStudy\\WWW\\mvc_smarty\\framework\\libs\\view\\Smarty\\plugins\\modifier.date_format.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="style/reset.css">
	<link rel="stylesheet" type="text/css" href="style/index.css">
	<link rel="stylesheet" type="text/css" href="style/course.css">
	<link rel="stylesheet" type="text/css" href="style/study_video.css">
</head>
<body style="background: #fff;">

	<div id="showmes">
		<?php if ($_smarty_tpl->tpl_vars['mess']->value != '') {?>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mess']->value, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value) {
?>
		<div class="cou_outer clearfix">
			<div class="user_header">

			</div>
			<div class="comment_content">
				<h5><?php echo $_smarty_tpl->tpl_vars['key']->value['username'];?>
</h5>
				<span class="content"><?php echo $_smarty_tpl->tpl_vars['key']->value['content'];?>
</span>
				<span class="pub_time">时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['key']->value['pubtime'],'%Y-%m-%d');?>
</span>
				<span class="good">123</span>
			</div>
		</div>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		<div class="pagenum">
 			<?php echo $_smarty_tpl->tpl_vars['pages']->value;?>

 		</div>
		<?php }?>
	</div>
</body>
</html><?php }
}
