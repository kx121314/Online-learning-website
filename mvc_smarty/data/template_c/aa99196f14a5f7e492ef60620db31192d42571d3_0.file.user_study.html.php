<?php
/* Smarty version 3.1.30, created on 2017-06-05 23:31:05
  from "D:\phpStudy\WWW\mvc_smarty\tpl\front\user_study.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_593579398840f5_47537165',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa99196f14a5f7e492ef60620db31192d42571d3' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\mvc_smarty\\tpl\\front\\user_study.html',
      1 => 1496676662,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593579398840f5_47537165 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学过的课程</title>
	<link rel="stylesheet" type="text/css" href="style/homepage.css">
	<link rel="stylesheet" type="text/css" href="style/reset.css">
</head>
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
			<img src="uploads/<?php echo $_smarty_tpl->tpl_vars['key']->value['albumPath'];?>
" alt="">
			<div class="couser_info">
				<div class="h3_outer">
					<h3><a href="" title=""><?php echo $_smarty_tpl->tpl_vars['key']->value['course_name'];?>
</a></h3>
					<p>学习至：<?php echo $_smarty_tpl->tpl_vars['key']->value['part_name'];?>
</p>
				</div>
				<div class="continue_study">
					<a href="index.php?controller=index&method=study_video&id=<?php echo $_smarty_tpl->tpl_vars['key']->value['partid'];?>
&uid=<?php echo $_smarty_tpl->tpl_vars['key']->value['userid'];?>
" target="_parent" title=""><span>继续学习</span></a>
				</div>
			</div>
		</div>
		<div class="couser_delete">
		<a href="index.php?controller=index&method=dellearned&id=<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
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
