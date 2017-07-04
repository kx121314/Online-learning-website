<?php
/* Smarty version 3.1.30, created on 2017-06-09 01:06:38
  from "D:\phpStudy\WWW\mvc_smarty\tpl\admin\hind_page.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5939841e4291b8_32125406',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed37981faf218a9f7422da2e921140b6a5ffa722' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\mvc_smarty\\tpl\\admin\\hind_page.html',
      1 => 1496941596,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5939841e4291b8_32125406 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="style/backstage.css">
</head>

<body>
    <div class="head">
            <div class="logo fl"><a href="index.php">在线学习网</a></div>
            <h3 class="head_text fr">在线学习网后台管理系统</h3>
    </div>
    <div class="operation_user clearfix">
        <div class="link fl"><a href=""  title="">学习网后台</a></div>
        <div class="link fr">
            <a href="#" class="icon">欢迎您 
            <?php echo $_smarty_tpl->tpl_vars['adminName']->value;?>

            </a><span></span><span></span><a href="admin.php?controller=admin&method=logout" class="icon icon_e">退出</a>
        </div>
    </div>
    <div class="content clearfix">
        <div class="main">
            <!--右侧内容-->
            <div class="cont">
                <div class="title">后台管理</div>


                <!-- 嵌套网页开始 -->         
                <iframe src="tpl/admin/main.php"  frameborder="0" name="mainFrame" width="100%" height="522"></iframe>
                <!-- 嵌套网页结束 -->   


            </div>
        </div>
        <!--左侧列表-->
        <div class="menu">
            <div class="cont">
                <div class="title">管理员</div>
                <ul class="mList">
                     <li>
                        <h3><span>-</span>分类管理</h3>
                        <dl>
                            <dd><a href="admin.php?controller=admin&method=cate_list" target="mainFrame">分类列表</a></dd>
                            <dd><a href="admin.php?controller=admin&method=addCate" target="mainFrame">添加分类</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span>-</span>课程管理</h3>
                        <dl>
                            <dd><a href="admin.php?controller=admin&method=course_list" target="mainFrame">课程列表</a></dd>
                            <dd><a href="admin.php?controller=admin&method=addCourse" target="mainFrame">添加课程</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span>-</span>文章管理</h3>
                        <dl>
                            <dd><a href="admin.php?controller=admin&method=article_list" target="mainFrame">文章列表</a></dd>
                            <dd><a href="admin.php?controller=admin&method=addArticle" target="mainFrame">添加文章</a></dd>
                           
                        </dl>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</body>
</html><?php }
}
