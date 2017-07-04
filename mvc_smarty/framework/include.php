<?php 
header("content-type:text/html;charset=utf-8");
define("ROOT",dirname(__FILE__));
set_include_path(".".PATH_SEPARATOR.ROOT."/function".PATH_SEPARATOR.ROOT."/libs/core".PATH_SEPARATOR.ROOT."/libs".PATH_SEPARATOR.ROOT."/libs/view".PATH_SEPARATOR.get_include_path());

require_once 'function.php';
require_once 'DB.class.php';
require_once 'VIEW.class.php';
require_once 'db/mysql.class.php';
require_once 'upload/upload.class.php';
require_once 'Smarty/Smarty.class.php';
require_once 'resizeImage.php';




