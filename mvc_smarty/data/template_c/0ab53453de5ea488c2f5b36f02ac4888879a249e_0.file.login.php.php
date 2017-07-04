<?php
/* Smarty version 3.1.30, created on 2017-06-09 00:00:47
  from "D:\phpStudy\WWW\mvc_smarty\tpl\front\login.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_593974af23ee45_89359347',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ab53453de5ea488c2f5b36f02ac4888879a249e' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\mvc_smarty\\tpl\\front\\login.php',
      1 => 1496678230,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593974af23ee45_89359347 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/main.css">
	<link rel="stylesheet" type="text/css" href="style/reset.css">
	<?php echo '<script'; ?>
 type="text/javascript" src="http://libs.baidu.com/jquery/1.9.1/jquery.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="js/login_front.js" type="text/javascript"><?php echo '</script'; ?>
>
</head>
<body>
	<header id="login_header" class="login_header">
		<div class="comWidth clearfix">
			<a href="index.php" title="">在线学习网</a>
			<h3>欢迎登录</h3>
		</div>
	</header>

	<div class="loginBox">
		<div class="loginCont">
			<ul>
				<li class="l_tit">用户名</li>
				<li class="mb_10"><input type="text" id="login_id" class="login_input user_icon"></li>
				<li class="l_tit">密码</li>
				<li class="mb_10"><input type="password" id="login_psw" class="login_input user_icon"></li>
				<li class="l_tit">验证码</li>
				<li class="mb_10_position"><input type="text" id="login_verify" class="login_input1">
				<a id="verify_a" href="javascript:void(0)" onclick="document.getElementById('verifyimg').src='framework/function/verify.php?r=<?php echo '<?php ';?>echo mt_rand();<?php echo '?>';?>'"><img id="verifyimg" src="framework/function/verify.php?r=<?php echo '<?php ';?>echo mt_rand();<?php echo '?>';?>"></a></li>
				<li id="login_error"></li>
				<li class="autoLogin"><input type="checkbox" id="a1" class="checked"><label for="a1">自动登陆</label></li>
				<li><input type="button" value="登录" class="login_btn" id="login_btn"></li>
			</ul>
		</div>
		<a href="index.php?controller=index&method=register" title="" class="reg_link">注册 >></a>
	</div>
	<footer class="login_footer">
		<p>在线学习网</p>
		<p>京ICP备09037834号&nbsp;京ICP证B1034-8373号&nbsp;某市公安局XX分局备案编号：123456789123<br>Copyright &copy; 2017 - 2017 **版权所有</p>
	</footer>
</body>
</html><?php }
}
