<?php
/* Smarty version 3.1.30, created on 2017-06-10 13:45:57
  from "D:\phpStudy\WWW\mvc_smarty\tpl\front\study_video.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_593b87952d72b0_47023130',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '61c5fc4e409d3f153ac6234881c74e6023432649' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\mvc_smarty\\tpl\\front\\study_video.html',
      1 => 1497073508,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593b87952d72b0_47023130 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>视频页面</title>
	<link rel="stylesheet" type="text/css" href="style/reset.css">
	<link rel="stylesheet" type="text/css" href="style/index.css">
	<link rel="stylesheet" type="text/css" href="style/course.css">
	<link rel="stylesheet" type="text/css" href="style/study_video.css">
	<?php echo '<script'; ?>
 type="text/javascript" src="http://libs.baidu.com/jquery/1.9.1/jquery.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/messages.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript">
		window.onload=function(){
			var video1=document.getElementById("videoPlay1");
			video1.onclick=function(){
			    if(video1.paused){
			        video1.play();
			    }else{
			        video1.pause();
			    }
			}
			//浏览器默认点击空格 页面往下走，暂没有解决方法。
			// document.onkeyup=function(event){
			// 	e=event;
			// 	if (e.keyCode==32) {
			// 		if(video1.paused){
			//        		video1.play();
			// 	    }else{
			// 	        video1.pause();
			// 	    }
			// 	 return;
			// 	}
			// }

		}

		function textdown(e) {
		    textevent = e;
		    if (textevent.keyCode == 8) {
		    	if (document.getElementById('textarea').value.length <= 100){
		    		textarea.style.border="1px solid #ccc";
		    	}
		        return;
		    }
		    if (document.getElementById('textarea').value.length > 100) {
		        textarea.style.border="1px solid red";
		        if (!document.all) {
		            textevent.preventDefault();
		        } else {
		            textevent.returnValue = false;
		        }
		    }
		}
		function textup() {
		    var s = document.getElementById('textarea').value;
		    //判断ID为text的文本区域字数是否超过100个 
		    if (s.length > 100) {
		        document.getElementById('textarea').value = s.substring(0, 100);
		    }
		}
	
	<?php echo '</script'; ?>
>
</head>
<body>
	<header id="index_header">
		<div class="nav_left">
			<div class="goback">
				<a href="index.php?controller=index&method=course&id=<?php echo $_smarty_tpl->tpl_vars['courinfo']->value[0]['courid'];?>
" title=""></a>
			</div>
			<div class="this_chapter">
				<h4><?php echo $_smarty_tpl->tpl_vars['courinfo']->value[0]['course_name'];?>
</h4>
				<span><?php echo $_smarty_tpl->tpl_vars['part']->value[0]['part_name'];?>
</span>
			</div>
		</div>
		<div class="nav_right">
			<div class="inputout">
			<form action="index.php?controller=index&method=searchAll" method="post" accept-charset="utf-8">
				<input type="search" name="search" value="" placeholder="搜索全站">
				<span><input type="submit" name="" value=""></span>
			</form>
			</div>
			<span><a href="index.php?controller=index&method=homepage&id=<?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
" title=""><?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
</a></span><a href="index.php?controller=index&method=logout" title="">退出</a>
		</div>
	</header><!-- /header -->
	<div class="video_outer">
		<div class="video">
			<video src="videos/<?php echo $_smarty_tpl->tpl_vars['video']->value[0]['videoPath'];?>
" controls="controls" autoplay='autoplay' id="videoPlay1" style="height: 500px;">
				您的浏览器不支持 video 标签。
			</video>
			<div class="vleft">
			<?php if ($_smarty_tpl->tpl_vars['leftbro']->value != '') {?>
				<a href="index.php?controller=index&method=study_video&id=<?php echo $_smarty_tpl->tpl_vars['leftbro']->value[0]['id'];?>
&uid=<?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
" title=""></a>
			<?php }?>
			</div>
			<div class="vright">
			<?php if ($_smarty_tpl->tpl_vars['rightbro']->value != '') {?>
				<a href="index.php?controller=index&method=study_video&id=<?php echo $_smarty_tpl->tpl_vars['rightbro']->value[0]['id'];?>
&uid=<?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
" title=""></a>
			<?php }?>
			</div>
		</div>
	</div>
	
	<div class="message">
		<div class="course_main">
			
			<div class="course_content clearfix">
				<div class="cou_content_l">
					<div class="cou_outer clearfix">
						<div class="cou_menu">
							<ul class="clearfix">
								<li><a href="" title="">评论</a></li>
								<!-- <li><a href="" title="">问答</a></li> -->
							</ul>
						</div>
					</div>
					<div class="cou_outer clearfix" id="message">
						<textarea name="comment" id="textarea" onKeyDown="textdown(event)"onKeyUp="textup()"></textarea>
						<input type="button" name="" id="sub" value="提交">
						<input type="hidden" name="" value="<?php echo $_smarty_tpl->tpl_vars['userId']->value;?>
" id="userid">
						<input type="hidden" name="" value="<?php echo $_smarty_tpl->tpl_vars['courinfo']->value[0]['courid'];?>
" id="courid">
						<input type="hidden" name="" value="<?php echo $_smarty_tpl->tpl_vars['part']->value[0]['id'];?>
" id="partid">
					</div>

					<div id="sshow">
						
					</div>
					<iframe src="index.php?controller=index&method=messages&id=<?php echo $_smarty_tpl->tpl_vars['part']->value[0]['id'];?>
"  id="iframepage" frameBorder="0" scrolling=no  name="iframepage" width="100%" onLoad="iframeLoad()"></iframe>
					
					<?php echo '<script'; ?>
 type="text/javascript">
						function iframeLoad() {  
						    document.getElementById("iframepage").height=0;  
						    document.getElementById("iframepage").height=document.getElementById("iframepage").contentWindow.document.body.scrollHeight;  
							}   
					<?php echo '</script'; ?>
>

				</div>
				<div class="cou_content_r">
					<div class="cou_ready">
						<h4>本节知识要点</h4>
							<?php echo $_smarty_tpl->tpl_vars['part']->value[0]['content'];?>

					</div>
					
				</div>
			</div>
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
