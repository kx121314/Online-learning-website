<?php
/* Smarty version 3.1.30, created on 2017-05-05 14:23:30
  from "D:\phpStudy\WWW\mvc_smarty\test.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_590c1a62a47881_04392649',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3e7f770ac7a4edd134c0daf9fec716480ea08f94' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\mvc_smarty\\test.html',
      1 => 1492096982,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_590c1a62a47881_04392649 (Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['title']->value;?>



<!-- admin_info分页 -->
$nums=count($info);
	$pagesize=2;
	$totalPages=ceil($nums/$pagesize);
	$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
	if ($page<1||$page==null||!is_numeric($page)) {
		$page=1;
	}
	if ($page>=$totalPages) {
		$page=$totalPages;
	}
	$table="admins";
	$array= array($pagesize*($page-1),$pagesize );
	$rows=$pdo->select($table,'','*',$array);<?php }
}
