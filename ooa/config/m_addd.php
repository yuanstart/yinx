<?php
require('../../include/common.inc.php');

checklogin();

$ty=isset($_POST['ty'])?html($_POST['ty']):'';
$fid=isset($_POST['fid'])?html($_POST['fid']):'';
$title=isset($_POST['title'])?html($_POST['title']):'';
$link_url=isset($_POST['link_url'])?html($_POST['link_url']):'';
$title2=isset($_POST['title2'])?html($_POST['title2']):'';
$link_url2=isset($_POST['link_url2'])?html($_POST['link_url2']):'';
$pass=isset($_POST['pass'])?html($_POST['pass']):'';
$px=isset($_POST['px'])?html($_POST['px']):'';


if ($ty==''||!checknum($ty)||$fid==''||!checknum($fid)||$title==''||$pass==''||!checknum($pass)||$px==''||!checknum($px)){
	msg('参数错误');
}

//添加导航信息
$sql='insert into '.table('master_menu').' (`ty`,`fid`,`title`,`link_url`,`title2`,`link_url2`,`pass`,`px`) values('.$ty.','.$fid.',"'.$title.'","'.$link_url.'","'.$title2.'","'.$link_url2.'",'.$pass.','.$px.')';
$db->execute($sql);

msg('添加成功','location="m_default.php"');
?>
