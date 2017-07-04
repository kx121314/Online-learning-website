<?php
/* Smarty version 3.1.30, created on 2017-06-10 08:55:15
  from "D:\phpStudy\WWW\mvc_smarty\tpl\admin\addPart.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_593b4373dff7e8_94775758',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b5a0015e75de9b2e1e2ab9770d163e2b1435ad1f' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\mvc_smarty\\tpl\\admin\\addPart.html',
      1 => 1497025488,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593b4373dff7e8_94775758 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>添加小节</title>
 	<?php echo '<script'; ?>
 src="js/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
	<style type="text/css" media="screen">
		body{
			margin: 0 20px;
		}

		h3{
			color: red;
			font-size: 30px;
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
 	<h3 class="h3">添加小节</h3>
 	<form action="admin.php?controller=admin&method=addPart" method="post" enctype="multipart/form-data">
 		<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#ccc">

 			<tr>
				<td align="right"><label for="part_name">小节名称</label></td>
				<td><input type="text" name="part_name" required="required "  value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value[0]['part_name'])===null||$tmp==='' ? '' : $tmp);?>
"></td>
			</tr>	
			<tr>
				<td align="right">所属章</td>
				<td>
					<?php echo $_smarty_tpl->tpl_vars['info']->value[0]['chapter_name'];?>

					<input type="hidden" name="chid" value="<?php echo $_smarty_tpl->tpl_vars['info']->value[0]['id'];?>
">
				</td>
			</tr>
			<tr>
 			    <td align="right">小节内容</td>
 			    <td><textarea name="content" style="width: 98%;height: 150px;"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value[0]['content'])===null||$tmp==='' ? '' : $tmp);?>
</textarea></td>
 			</tr>
 			<tr>
				<td align="right">小节视频</td>
				<td>
					<a href="javascript:void(0)" id="selectFileBtn">添加附件</a>
					<div id="attachList" class="clear"></div>
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
