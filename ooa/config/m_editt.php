<?php
require('../../include/common.inc.php');

checklogin();

$id=isset($_POST['id'])?html($_POST['id']):'';
$ty=isset($_POST['ty'])?html($_POST['ty']):'';
$fid=isset($_POST['fid'])?html($_POST['fid']):'';
$title=isset($_POST['title'])?html($_POST['title']):'';
$link_url=isset($_POST['link_url'])?html($_POST['link_url']):'';
$title2=isset($_POST['title2'])?html($_POST['title2']):'';
$link_url2=isset($_POST['link_url2'])?html($_POST['link_url2']):'';
$pass=isset($_POST['pass'])?html($_POST['pass']):'';
$px=isset($_POST['px'])?html($_POST['px']):'';

if ($id==''||!checknum($id)||$ty==''||!checknum($ty)||$fid==''||!checknum($fid)||$title==''||$pass==''||!checknum($pass)||$px==''||!checknum($px)){
	msg('参数错误');
}

$sql='update '.table('master_menu').' set `ty`='.$ty.',`fid`='.$fid.',`title`="'.$title.'",`link_url`="'.$link_url.'",`title2`="'.$title2.'",`link_url2`="'.$link_url2.'",`pass`="'.$pass.'",`px`='.$px.' where `id`='.$id.'';
$db->execute($sql);
msg('保存成功','location="m_default.php"');
?>
