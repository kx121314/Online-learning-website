<?php
/* Smarty version 3.1.30, created on 2017-06-10 12:20:49
  from "D:\phpStudy\WWW\mvc_smarty\tpl\admin\chapter.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_593b73a155ef18_42383306',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f94c0d6ce50076f48672502c88eeff15433c43c' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\mvc_smarty\\tpl\\admin\\chapter.html',
      1 => 1497067748,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593b73a155ef18_42383306 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>章节</title>
</head>
<style type="text/css" media="screen">
*{
	margin:0;
	padding: 0;
}
a{
	text-decoration: none;
}
li{
	list-style: none;
}
h3{
	margin: 20px 30px 0;
}
.cou_outer{
	width: 80%;
	margin: 0 auto;
	border-bottom: 1px solid #ccc;
	padding: 5px 0;
}
.cou_outer h4{
	color: #000;
	line-height: 40px;
	float: left;
}
.cou_outer #updatez{
	line-height: 40px;
	margin-left: 60px;
}
.chapter{
	width: 90%;
	margin: 0 auto;
	clear: both;
}
.chapter li{
	background-color: #F3F5F7;
	line-height: 35px;
	margin: 3px;
	padding: 0 10px;
	width: 96%;
}
.chapter a{
	float: right;
	margin-right: 20px;
	color: #4D555D; 
	display: inline-block;
	padding: 0 2%;
	position: relative;
	
}
.chapter a:hover{
	background-color: #fff;
}
.chapter a input{
	position: absolute;
	font-size: 25px;
	top: 0;
	left: 0;
	opacity: 0;
	z-index: 10px;
}
.addj{
	display: block;
	width: 60px;
	height: 30px;
	margin: 10px 50px 0;
	background-color: #ccc;
	text-align: center;
	line-height: 30px;
}
.addz{
	display: block;
	width: 60px;
	height: 30px;
	margin: 20px 120px 0;
	background-color: #ccc;
	text-align: center;
	line-height: 30px;
}
</style>
<!-- <?php echo '<script'; ?>
 type="text/javascript">
	window.onload=function(){
		var a_on=document.getElementById('a_on');
		a_on.onmouseout=function(){
			var input_on=document.getElementById('input_on');
			if (input_on.value) {
				a_on.innerHTML=input_on.value+'<input type="file" name="" value="" placeholder="" id="input_on">';
			}
		}
	}
<?php echo '</script'; ?>
> -->
<body>
	<h3><?php echo $_smarty_tpl->tpl_vars['cour']->value[0]['course_name'];?>
</h3>
	<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value) {
?>
	<div class="cou_outer">
		<h4><?php echo $_smarty_tpl->tpl_vars['key']->value['chapter_name'];?>
</h4><a href="admin.php?controller=admin&method=editChapter&id=<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
" title="" id="updatez">修改</a> || <a href="admin.php?controller=admin&method=delChapter&id=<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
" title="">删除</a>
		<div class="chapter">
			<ul>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['parts_i']->value, 'part_i');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['part_i']->value) {
?>
			<?php if ($_smarty_tpl->tpl_vars['part_i']->value['chid'] == $_smarty_tpl->tpl_vars['key']->value['id']) {?>
				<li><?php echo $_smarty_tpl->tpl_vars['part_i']->value['part_name'];?>


					<!-- <a href="#" title="" id="a_on">更改视频<input type="file" name="" value="" placeholder="" id="input_on"></a> -->
					<a href="admin.php?controller=admin&method=delPart&id=<?php echo $_smarty_tpl->tpl_vars['part_i']->value['id'];?>
" title="">删除</a>
					<a href="admin.php?controller=admin&method=editPart&id=<?php echo $_smarty_tpl->tpl_vars['part_i']->value['id'];?>
" title="">修改</a>
					<a href="admin.php?controller=admin&method=messages&id=<?php echo $_smarty_tpl->tpl_vars['part_i']->value['id'];?>
" title="">评论</a>
				</li>
			<?php }?>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			</ul>
		</div>
		<a href="admin.php?controller=admin&method=addPart&id=<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
" title="" class="addj">添加节</a>
	</div>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	<?php }?>
	<a href="admin.php?controller=admin&method=addChapter&id=<?php echo $_smarty_tpl->tpl_vars['cou_id']->value['id'];?>
" title="" class="addz">添加章</a>
</body>
</html><?php }
}
