<?php
/* Smarty version 3.1.30, created on 2017-06-10 07:54:39
  from "D:\phpStudy\WWW\mvc_smarty\tpl\admin\addArticle.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_593b353f564b83_87566581',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '805e1730791c00465a3fbd2a2223fda6cb78820b' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\mvc_smarty\\tpl\\admin\\addArticle.html',
      1 => 1497025451,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593b353f564b83_87566581 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>添加文章</title>
 	<?php echo '<script'; ?>
 src="js/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
 	<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="plugins/kindeditor/kindeditor.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="plugins/kindeditor/lang/zh_CN.js"><?php echo '</script'; ?>
>
 	<?php echo '<script'; ?>
 type="text/javascript">
	 	KindEditor.ready(function(K) {
	        window.editor = K.create('#editor_id');
	    });
 	<?php echo '</script'; ?>
>
	<style type="text/css" media="screen">
		body{
			margin: 0 20px;
		}

		h3{
			color: red;
			font-size: 24px;
		}
		input{
			height: 28px;
 			width: 250px;
		}
		select{
			height: 35px;
			width: 100px;
		}
	</style>
 </head>
 <body>
 	<h3 class="h3">添加文章</h3>
 	<form action="admin.php?controller=admin&method=addArticle" method="post" enctype="multipart/form-data">
 		<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#ccc">

 			<tr><td align="right">文章标题</td><td><input type="text" name="article_name" required="required" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value[0]['article_name'])===null||$tmp==='' ? '' : $tmp);?>
"placeholder="请输入文章标题"></td></tr>

 			<tr><td align="right">作者</td><td><input type="text" name="author" required="required" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value[0]['author'])===null||$tmp==='' ? '' : $tmp);?>
" placeholder="请输入课程名称"></td></tr>
 			<tr>
 				<td align="right">所属分类</td>
 				<td>
					<select name="cid">
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
 			<tr>
 			    <td align="right">内容</td>
 			    <td><textarea name="content" id="editor_id" style="width: 98%;height: 300px;"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value[0]['content'])===null||$tmp==='' ? '' : $tmp);?>
</textarea></td>
 			</tr>
 			<tr align="center">
 				<input type="hidden" name="id" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value[0]['id'])===null||$tmp==='' ? '' : $tmp);?>
">
 			    <td colspan="2"><input type="submit" name="" value="提交" class="btn"></td>
 			</tr>
 		</table>
 	</form>
 </body>
 </html><?php }
}
