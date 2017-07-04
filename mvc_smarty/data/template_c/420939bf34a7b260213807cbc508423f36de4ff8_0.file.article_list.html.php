<?php
/* Smarty version 3.1.30, created on 2017-06-04 19:52:36
  from "D:\phpStudy\WWW\mvc_smarty\tpl\admin\article_list.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5933f4842e61b1_01976294',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '420939bf34a7b260213807cbc508423f36de4ff8' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\mvc_smarty\\tpl\\admin\\article_list.html',
      1 => 1496577150,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5933f4842e61b1_01976294 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文章列表</title>
	<style type="text/css" media="screen">
 		*{
 			margin: 0;
 			padding: 0;
 		}
 		.main{
			margin:20px 0 0 20px;
 		}
 		input{
 			height: 25px;
 			width: 100px;
 		}
 		.admin_table{
 			margin-top: 20px;
 		}
 		table{
 			text-align: center;
			line-height: 28px;
 		}
 		.pagenum{
 			margin: 30px auto 0;
 			width: 800px;
 		}
 		.pagenum a{
 			/*display: block;*/
 			text-decoration: none;
 			color: #000;
 			padding: 5px 8px;
 			margin: 0 5px;
 			border: 1px solid #000;
 		}
 		.pagenum a:hover{
 			background-color: #ccc;
 		}
 		.pagenum span{
 			border: 1px solid #000;
 			padding: 5px 8px;
 			margin: 0 5px;
 		}
 		.pagenum .selnum{
 			background-color: #ccc;
 		}
 	</style>
 </head>
 <body>
	 <div class="main">
	 	<div class="admin_info">
	 		<input type="button" name="" value="添&nbsp;&nbsp;加" onclick="addArticle()">
	 	</div>
	 	<div class="admin_table">
	 		<table class="table" cellpadding="0" cellspacing="0" width="80%" border="1">
	 			<thead>
	 				<tr>
	 					<th width="10%">编号</th>
	 					<th width="15%">文章名</th>
	 					<th width="15%">作者</th>
	 					<th width="20%">所属分类</th>
	 					<th width="15%">操作</th>
	 				</tr>
	 			</thead>
	 			<tbody>
	 			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value) {
?>
	 				<tr>
	 					<td><?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
</td>
	 					<td><?php echo $_smarty_tpl->tpl_vars['key']->value['article_name'];?>
</td>
	 					<td><?php echo $_smarty_tpl->tpl_vars['key']->value['author'];?>
</td>
	 					<td><?php echo $_smarty_tpl->tpl_vars['key']->value['cate_name'];?>
</td>
	 					<td><a href="admin.php?controller=admin&method=addArticle&id=<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
">修改</a> | <a href="javascript:" onclick="delArticle(<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
)">删除</a></td>
	 				</tr>
	 			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	 			</tbody>
	 		</table>
	 		<div class="pagenum">
	 			<?php echo $_smarty_tpl->tpl_vars['pages']->value;?>

	 		</div>
	 	</div>
	 	<div class="admin_page">
			
	 	</div>
	</div>
	<?php echo '<script'; ?>
 type="text/javascript">

		function addArticle(){
			location.href='admin.php?controller=admin&method=addArticle';
		}

		function delArticle(id){
			if (confirm("确定删除吗？删除将无法恢复！")) {
				location.href='admin.php?controller=admin&method=delArticle&id='+id;
			}
			
		}
	<?php echo '</script'; ?>
>
 </body>
</html><?php }
}
