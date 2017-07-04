<?php
/* Smarty version 3.1.30, created on 2017-06-10 10:11:44
  from "D:\phpStudy\WWW\mvc_smarty\tpl\front\course_list.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_593b5560d3b445_28391531',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b531b8a3f30951f0784cbeb5015a15b3d37f5a4e' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\mvc_smarty\\tpl\\front\\course_list.html',
      1 => 1497060701,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593b5560d3b445_28391531 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>课程分类</title>
	<link rel="stylesheet" type="text/css" href="style/reset.css">
	<link rel="stylesheet" type="text/css" href="style/index.css">
	<link rel="stylesheet" type="text/css" href="style/course_list.css">
	<?php echo '<script'; ?>
 type="text/javascript">
	//a会跳转，这样设置不行
		// $(document).ready(function(){
		// 	for (var i = 0; i < $('.one_classification').length; i++) {
		// 		var $dii=$('.one_classification').eq(i).find('li');
		// 		for (var j = 0; j < $dii.length; j++) {
		// 			$dii.eq(j).click(function(){
		// 				$(this).addClass('active');
		// 			})
		// 		}
		// 	}
		// })
		window.onload=function(){
			var cate=getUrlParam('cate');
			if (cate) {
				var aa=document.getElementById(cate);
				addClass(aa,"active");
			}else{
				var aa=document.getElementById('0');
				addClass(aa,"active");
			}

			var id=getUrlParam('id');
			if (id) {
				var bb=document.getElementById(id);
				addClass(bb,"active");
			}else{
				var bb=document.getElementById('00');
				addClass(bb,"active");
			}
			
			

		}
		function getUrlParam(name){
			var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
			var r = window.location.search.substr(1).match(reg);  //匹配目标参数
			if (r!=null) return unescape(r[2]); return null; //返回参数值
		} 
		function hasClass(ele, cls) {
		  cls = cls || '';
		  if (cls.replace(/\s/g, '').length == 0) return false; //当cls没有参数时，返回false
		  return new RegExp(' ' + cls + ' ').test(' ' + ele.className + ' ');
		}
		 
		function addClass(ele, cls) {
		  if (!hasClass(ele, cls)) {
		    ele.className = ele.className == '' ? cls : ele.className + ' ' + cls;
		  }
		}
		 
		function removeClass(ele, cls) {
		  if (hasClass(ele, cls)) {
		    var newClass = ' ' + ele.className.replace(/[\t\r\n]/g, '') + ' ';
		    while (newClass.indexOf(' ' + cls + ' ') >= 0) {
		      newClass = newClass.replace(' ' + cls + ' ', ' ');
		    }
		    ele.className = newClass.replace(/^\s+|\s+$/g, '');
		  }
		}

	<?php echo '</script'; ?>
>
</head>
<body>
	<header id="index_header">
		<h2><a href="index.php" title="">在线学习网</a></h2>
		<nav>
			<ul class="clearfix">
				<li><a href="index.php?controller=index&method=course_list" title="" class="active">课程</a></li>
				<li><a href="index.php?controller=index&method=article_list" title="">文章</a></li>
				<li><a href="" title=""></a></li>
			</ul>
		</nav>
		<div class="nav_right">
			<div class="inputout">
			<form action="index.php?controller=index&method=searchAll" method="post" accept-charset="utf-8">
				<input type="search" name="search" value="" placeholder="搜索全站">
				<span><input type="submit" name="" value=""></span>
			</form>
			</div>
			<?php if ($_smarty_tpl->tpl_vars['userName']->value != '') {?>
			<span><a href="index.php?controller=index&method=homepage&id=<?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
" title=""><?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
</a></span><a href="index.php?controller=index&method=logout" title="">退出</a>
			<?php } else { ?>
			<span><a href="index.php?controller=index&method=login" title="">登录/注册</a></span>
			<?php }?>
		</div>
	</header><!-- /header -->
	<div class="course_classify">
		<div class="classify_auto">
			<div class="one_classification clearfix">
				<span class="ul_tltle">分类：</span>
				<ul>
					<li id="0"><a href="index.php?controller=index&method=course_list" title="">全部</a></li>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bigcate']->value, 'onecate');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['onecate']->value) {
?>
					<li  id="<?php echo $_smarty_tpl->tpl_vars['onecate']->value['id'];?>
"><a href="index.php?controller=index&method=course_list&cate=<?php echo $_smarty_tpl->tpl_vars['onecate']->value['id'];?>
" title=""><?php echo $_smarty_tpl->tpl_vars['onecate']->value['cate_name'];?>
</a></li>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				</ul>
			</div>
			<div class="one_classification clearfix">
				<span class="ul_tltle"></span>
				<ul>
					<li id="00"><a href="index.php?controller=index&method=course_list&cate=<?php echo $_smarty_tpl->tpl_vars['catebycid']->value[0]['cid'];?>
" title="">全部</a></li>
					<?php if ($_smarty_tpl->tpl_vars['catebycid']->value != '') {?> 
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['catebycid']->value, 'smallcate');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['smallcate']->value) {
?>
					<li id="<?php echo $_smarty_tpl->tpl_vars['smallcate']->value['id'];?>
"><a href="index.php?controller=index&method=course_list&cate=<?php echo $_smarty_tpl->tpl_vars['smallcate']->value['cid'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['smallcate']->value['id'];?>
" title=""><?php echo $_smarty_tpl->tpl_vars['smallcate']->value['cate_name'];?>
</a></li>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

					<?php }?>
				</ul>
			</div>
		</div>
	</div>
	<div class="display_course">
		<div class="courses_list clearfix">
			<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {?> 
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value) {
?>
			<div class="course">
				<a href="index.php?controller=index&method=course&id=<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
" title="" style="color: #000;">
					<div class="course_img" style="background: url(uploads/<?php echo $_smarty_tpl->tpl_vars['key']->value['albumPath'];?>
) no-repeat left top;background-size: 100% 215px;">
						
					</div>
					<div class="title_outer">
						<div class="course_title omit">
							<?php echo $_smarty_tpl->tpl_vars['key']->value['course_name'];?>

						</div>
						<div class="course_describe">
							<span>描述：</span><?php echo $_smarty_tpl->tpl_vars['key']->value['summary'];?>

						</div>
					</div>
				</a>
			</div>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			<?php }?>
		</div>
		<div class="pagenum">
 			<?php echo $_smarty_tpl->tpl_vars['pages']->value;?>

 		</div>
	</div>
	<footer>
		<div class="footer_main">
			<div class="footer_top">
 				<ul class="clearfix">
 					<li><a href="" title="">关于我们</a></li>
 					<li><a href="" title="">联系我们</a></li>
 					<li><a href="" title="">帮助中心</a></li>
 					<li><a href="" title="">内容招募</a></li>
 					<li><a href="" title="">意见反馈</a></li>
 				</ul>
			</div>
			<div class="footer_bottom">
				&copy 软件工程13-4 赵东雨
			</div>
		</div>
	</footer>
</body>
</html><?php }
}
