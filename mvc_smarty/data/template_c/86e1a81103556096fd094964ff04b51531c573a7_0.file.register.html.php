<?php
/* Smarty version 3.1.30, created on 2017-06-09 00:10:26
  from "D:\phpStudy\WWW\mvc_smarty\tpl\front\register.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_593976f28ee0f4_22998667',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86e1a81103556096fd094964ff04b51531c573a7' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\mvc_smarty\\tpl\\front\\register.html',
      1 => 1496938194,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593976f28ee0f4_22998667 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/main.css">
	<link rel="stylesheet" type="text/css" href="style/reset.css">
	<?php echo '<script'; ?>
 type="text/javascript" src="http://libs.baidu.com/jquery/1.9.1/jquery.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="js/reg_front.js" type="text/javascript"><?php echo '</script'; ?>
>
</head>
<body>
	<header id="login_header" class="login_header">
		<div class="comWidth clearfix">
			<a href="index.php" title="">在线学习网</a>
			<h3>欢迎注册</h3>
		</div>
	</header>

	<div class="loginBox">
		<div class="loginCont">
			<ul>
				<li class="l_tit">用户名</li>
				<li class="mb_10"><input type="text" id="reg_id" class="login_input user_icon"></li>
				<li class="l_tit">密码</li>
				<li class="mb_10"><input type="text" maxlength="20" id="reg_psw" class="login_input user_icon"></li>
				<li class="l_tit">邮箱</li>
				<li class="mb_10"><input type="email" maxlength="30" id="reg_email" class="login_input"></li>
				
				<li class="autoLogin"><input type="checkbox" id="a1" class="checked"><label for="a1">同意什么什么条款</label></li>
				<li id="login_error"></li>
				<li><input type="button" value="注册" class="login_btn" id="login_btn"></li>
			</ul>
		</div>
	</div>
	<footer class="login_footer">
		<p>在线学习网</p>
		<p>京ICP备09037834号&nbsp;京ICP证B1034-8373号&nbsp;某市公安局XX分局备案编号：123456789123<br>Copyright &copy; 2017 - 2017 **版权所有</p>
	</footer>
</body>
</html><?php }
}
