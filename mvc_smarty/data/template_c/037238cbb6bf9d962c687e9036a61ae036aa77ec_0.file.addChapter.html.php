<?php
/* Smarty version 3.1.30, created on 2017-05-20 22:12:06
  from "D:\phpStudy\WWW\mvc_smarty\tpl\admin\addChapter.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59204eb6b98581_80360377',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '037238cbb6bf9d962c687e9036a61ae036aa77ec' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\mvc_smarty\\tpl\\admin\\addChapter.html',
      1 => 1495288258,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59204eb6b98581_80360377 (Smarty_Internal_Template $_smarty_tpl) {
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>添加章</title>
 	<style type="text/css" media="screen">
 		input{
 			height: 28px;
 			width: 250px;
 		}
 		h3{
 			display: inline-block;
 		}
 		a{
 			display: inline-block;
 			text-decoration: none;
 			margin-left: 15px;
 		}
 		select{
 			height: 30px;
 			width: 100px;
 		}
 	</style>
 </head>
 <body>
 	<h3>添加/修改章</h3><a href="admin.php?controller=admin&method=showChapter&id=<?php echo $_smarty_tpl->tpl_vars['info']->value[0]['id'];?>
">(返回章节列表)</a>
    <form action="admin.php?controller=admin&method=addChapter" method="post">
    	<table width="70%" border="1" cellpadding="4" cellspacing="0" bgcolor="#ccc">
			<tr>
				<td align="right"><label for="chapter_name">章名称</label></td>
				<td><input type="text" name="chapter_name" required="required "  value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value[0]['chapter_name'])===null||$tmp==='' ? '' : $tmp);?>
"></td>
			</tr>	
			<tr>
				<td align="right">所属课程</td>
				<td>
					<?php echo $_smarty_tpl->tpl_vars['info']->value[0]['course_name'];?>

					<input type="hidden" name="bid" value="<?php echo $_smarty_tpl->tpl_vars['info']->value[0]['id'];?>
">
				</td>
			</tr>
			<tr align="center">
				<td colspan="2">
					<input type="hidden" name="id" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value[0]['id'])===null||$tmp==='' ? '' : $tmp);?>
">
					<input type="submit" value="提交">
				</td>			
			</tr>
    	</table>
    </form>
 </body>
 </html><?php }
}
