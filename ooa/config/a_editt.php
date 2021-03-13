<?php
require('../../include/common.inc.php');

checklogin();

$id=isset($_POST['id'])?html($_POST['id']):'';
$fid=isset($_POST['fid'])?html($_POST['fid']):'';
$title=isset($_POST['title'])?html($_POST['title']):'';
$title_val=isset($_POST['title_val'])?html($_POST['title_val']):'';
$pass=isset($_POST['pass'])?html($_POST['pass']):'';
$px=isset($_POST['px'])?html($_POST['px']):'';

if ($id==''||!checknum($id)||$fid==''||!checknum($fid)||$title==''||$title_val==''||$pass==''||!checknum($pass)||$px==''||!checknum($px)){
	msg('参数错误');
}

$sql='update '.table('master_action').' set `fid`='.$fid.',`title`="'.$title.'",`title_val`="'.$title_val.'",`pass`="'.$pass.'",`px`='.$px.' where `id`='.$id.'';
$db->execute($sql);
msg('保存成功','location="a_default.php"');
?>
