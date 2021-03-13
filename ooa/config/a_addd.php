<?php
require('../../include/common.inc.php');

checklogin();

$fid=isset($_POST['fid'])?html($_POST['fid']):'';
$title=isset($_POST['title'])?html($_POST['title']):'';
$title_val=isset($_POST['title_val'])?html($_POST['title_val']):'';
$pass=isset($_POST['pass'])?html($_POST['pass']):'';
$px=isset($_POST['px'])?html($_POST['px']):'';


if ($fid==''||!checknum($fid)||$title==''||$title_val==''||$pass==''||!checknum($pass)||$px==''||!checknum($px)){
	msg('参数错误');
}

//添加权限信息
$sql='insert into '.table('master_action').' (`fid`,`title`,`title_val`,`pass`,`px`) values('.$fid.',"'.$title.'","'.$title_val.'",'.$pass.','.$px.')';
$db->execute($sql);

msg('添加成功','location="a_default.php"');
?>
