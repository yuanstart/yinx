<?php
require('../include/common.inc.php');
//退出登录
if (isset($_SESSION['hyadmin'])){
	master_log('退出后台：'.$_SESSION['hyadmin']);
	$sess->logout();
}
msg('','location="default.php"');
?>
