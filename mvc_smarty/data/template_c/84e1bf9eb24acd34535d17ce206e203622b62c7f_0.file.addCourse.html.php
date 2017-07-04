<?php
/* Smarty version 3.1.30, created on 2017-06-10 07:54:36
  from "D:\phpStudy\WWW\mvc_smarty\tpl\admin\addCourse.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_593b353cd63cb0_71649714',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '84e1bf9eb24acd34535d17ce206e203622b62c7f' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\mvc_smarty\\tpl\\admin\\addCourse.html',
      1 => 1497025481,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593b353cd63cb0_71649714 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>添加课程</title>
 	<?php echo '<script'; ?>
 src="js/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
 	<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="plugins/kindeditor/kindeditor.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="plugins/kindeditor/lang/zh_CN.js"><?php echo '</script'; ?>
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

 	<?php echo '<script'; ?>
 type="text/javascript">
 	KindEditor.ready(function(K) {
	        window.editor = K.create('#learned');
	        window.editor = K.create('#ready');
	        window.editor = K.create('#summary');
	    });

 	$(document).ready(function(){
 		$("#selectFileBtn").click(function(){
	 		$fileup=$('<input type="file" name="files[]">');
	 		$fileup.hide();
	 		$('#attachList').append($fileup);
	 		$fileup.trigger('click');
	 		$fileup.change(function(){
	 			$path=$(this).val();
	 			$fileName=$path.substring($path.lastIndexOf('\\')+1);
	 			$attachItem=$('<div id="attachItem"><div id="attachLeft"></div><div id="attachRight"><a href="javascript:void(0)" title="删除附件">删除</a></div></div>');
	 			$attachItem.find('#attachLeft').html($fileName);
	 			$('#attachList').append($attachItem);


	 			$("#attachList>#attachItem").on('click','a',function(){
	 			$(this).parents('#attachItem').prev('input').remove();
        		$(this).parents('#attachItem').remove();
	 			})
	 		})
	 	})
 	})


 	<?php echo '</script'; ?>
>
 </head>
 <body>
 	<h3 class="h3">添加课程</h3>
 	<form action="admin.php?controller=admin&method=addCourse" method="post" enctype="multipart/form-data">
 		<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#ccc">

 			<tr><td align="right">课程名称</td><td><input type="text" name="course_name" required="required" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value[0]['course_name'])===null||$tmp==='' ? '' : $tmp);?>
"placeholder="请输入课程名称"></td></tr>

 			<tr><td align="right">作者</td><td><input type="text" name="course_author" required="required" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value[0]['course_author'])===null||$tmp==='' ? '' : $tmp);?>
" placeholder="请输入课程名称"></td></tr>
 			<tr>
 				<td align="right">课程分类</td>
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
 			    <td align="right">课程简介</td>
 			    <td><textarea name="summary" id="summary" style="width: 98%;height: 150px;"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value[0]['summary'])===null||$tmp==='' ? '' : $tmp);?>
</textarea></td>
 			</tr>
 			<tr>
 			    <td align="right">难易度</td>
 			    <td><input type="text" name="score" required="required" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value[0]['score'])===null||$tmp==='' ? '' : $tmp);?>
" placeholder="请输入课程难度分"></td>
 			</tr>
 			<tr>
 			    <td align="right">课前准备</td>
 			    <td><textarea name="ready" id="ready" style="width: 98%;height: 150px;"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value[0]['ready'])===null||$tmp==='' ? '' : $tmp);?>
</textarea></td>
 			</tr>
 			<tr>
 			    <td align="right">主要知识</td>
 			    <td><textarea name="pDes" id="learned" style="width: 98%;height: 150px;"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value[0]['pDes'])===null||$tmp==='' ? '' : $tmp);?>
</textarea></td>
 			</tr>
 			<tr>
				<td align="right">课程图片</td>
				<td>
					<a href="javascript:void(0)" id="selectFileBtn">添加附件</a>
					<div id="attachList" class="clear"></div>
				</td>
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
