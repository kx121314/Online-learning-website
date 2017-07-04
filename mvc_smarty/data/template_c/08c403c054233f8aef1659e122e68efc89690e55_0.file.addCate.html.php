<?php
/* Smarty version 3.1.30, created on 2017-05-26 14:08:24
  from "D:\phpStudy\WWW\mvc_smarty\tpl\admin\addCate.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5927c658ae3961_33796264',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '08c403c054233f8aef1659e122e68efc89690e55' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\mvc_smarty\\tpl\\admin\\addCate.html',
      1 => 1495778899,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5927c658ae3961_33796264 (Smarty_Internal_Template $_smarty_tpl) {
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>添加分类</title>
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
 	<h3>添加/修改分类</h3><a href="admin.php?controller=admin&method=cate_list">(返回分类列表)</a>
    <form action="admin.php?controller=admin&method=addCate" method="post">
    	<table width="70%" border="1" cellpadding="4" cellspacing="0" bgcolor="#ccc">
			<tr>
				<td align="right"><label for="cate_name">分类名称</label></td>
				<td><input type="text" name="cate_name" required="required "  value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value[0]['cate_name'])===null||$tmp==='' ? '' : $tmp);?>
"></td>
			</tr>	
			<tr>
				<td align="right">所属分类</td>
				<td>
					<select name="cid">
						<option value="0">无</option>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['info']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['data']->value[0]['cid'] == $_smarty_tpl->tpl_vars['row']->value['id']) {?> selected='selected' <?php } else { ?> null <?php }?>><?php echo $_smarty_tpl->tpl_vars['row']->value['cate_name'];?>
</option>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

					</select>
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
