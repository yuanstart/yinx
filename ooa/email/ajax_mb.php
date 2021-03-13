<?php
require('../../include/common.inc.php');
checklogin();

$id=(!empty($_GET['id']))?$_GET['id']:'';
if ($id==''||!checknum($id)){
	echo '参数错误';
	exit();
}

$row=$db->getrs('select `title`,`z_body` from '.table('email_mb').' where `id`='.$id.' and `pass`=1');
if ($row){
	echo json_encode($row);
}
?>


