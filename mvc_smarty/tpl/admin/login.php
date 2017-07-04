<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录界面</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/main.css">
	<link rel="stylesheet" type="text/css" href="style/reset.css">
	<script src="js/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/login.js" type="text/javascript"></script>
</head>
<body>
	<header id="login_header" class="login_header">
		<div class="comWidth clearfix">
			<a href="" title="">学习网后台</a>
			<h3>欢迎登录</h3>
		</div>
	</header>

	<div class="loginBox">
		<div class="loginCont">
			<ul>
				<li class="l_tit">管理员</li>
				<li class="mb_10"><input type="text" id="login_id" class="login_input user_icon"></li>
				<li class="l_tit">密码</li>
				<li class="mb_10"><input type="password" id="login_psw" class="login_input user_icon"></li>
				<li class="l_tit">验证码</li>
				<li class="mb_10_position"><input type="text" id="login_verify" class="login_input1">
				<a id="verify_a" href="javascript:void(0)" onclick="document.getElementById('verifyimg').src='framework/function/verify.php?r=<?php echo mt_rand();?>'"><img id="verifyimg" src="framework/function/verify.php?r=<?php echo mt_rand();?>"></a></li>
				<li id="login_error"></li>
				<li class="autoLogin"><input type="checkbox" id="a1" class="checked"><label for="a1">自动登陆</label></li>
				<li><input type="button" value="登录" class="login_btn" id="login_btn"></li>
			</ul>
		</div>
	</div>
	<footer class="login_footer">
		<p>在线学习网</p>
		<p>京ICP备09037834号&nbsp;京ICP证B1234-123号&nbsp;某市公安局XX分局备案编号：123456789123<br>Copyright &copy; 2017 - 2017 软件工程13-4 赵东雨</p>
	</footer>
</body>
</html>