<?php
/* Smarty version 3.1.30, created on 2017-05-07 15:05:00
  from "D:\phpStudy\WWW\mvc_smarty\tpl\admin\addAdmin.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_590ec71c72c6e2_26912219',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a34e42051e9ec094aae6d129b8da5c595a90ab30' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\mvc_smarty\\tpl\\admin\\addAdmin.html',
      1 => 1494140696,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_590ec71c72c6e2_26912219 (Smarty_Internal_Template $_smarty_tpl) {
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
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
 	</style>
 </head>
 <body>
 	<h3>添加/修改管理员</h3><a href="admin.php?controller=admin&method=admin_info">(返回管理员列表)</a>
    <form action="admin.php?controller=admin&method=addAdmin" method="post">
    	<table width="70%" border="1" cellpadding="4" cellspacing="0" bgcolor="#ccc">
			<tr>
				<td align="right"><label for="username">管理员名称</label></td>
				<td><input type="text" name="username" required="required "  value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value[0]['username'])===null||$tmp==='' ? '' : $tmp);?>
"></td>
			</tr>	
			<tr>
				<td align="right"><label for="password">管理员密码</label></td>
				<td><input type="password" name="password" required="required " value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value[0]['password'])===null||$tmp==='' ? '' : $tmp);?>
"></td>
			</tr>
			<tr>
				<td align="right"><label for="email">管理员邮箱</label></td>
				<td><input type="email" name="email" required="required " value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value[0]['email'])===null||$tmp==='' ? '' : $tmp);?>
"></td>
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
