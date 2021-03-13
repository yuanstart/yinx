<?php
require('../../include/common.inc.php');

checklogin();
$act=isset($_POST['act'])?html($_POST['act']):'';

if ($act==1){

	$fid=isset($_POST['fid'])?html($_POST['fid']):'';
	$id=isset($_POST['id'])?html($_POST['id']):'';
	$title=isset($_POST['title'])?html($_POST['title']):'';
	$title_val=isset($_POST['title_val'])?html($_POST['title_val']):'';
	$px=isset($_POST['px'])?html($_POST['px']):'';
	
	if ($fid==''||!checknum($fid)||$id==''||!checknum($id)){
		msg('参数错误');
	}
	
	foreach($id as $k=>$v){
		if (isset($title[$k])&&$title[$k]!=''&&isset($_POST['pass'.$v])){
			$db->execute('insert into '.table('master_action').' (`fid`,`title`,`title_val`,`pass`,`px`) values('.$fid.',"'.$title[$k].'","'.$title_val[$k].'",'.$_POST['pass'.$v].','.$px[$k].')');
		}
	}

}elseif($act==2){

	$fid=isset($_POST['fid'])?html($_POST['fid']):'';
	$title=isset($_POST['title'])?html($_POST['title']):'';
	$title_val=isset($_POST['title_val'])?html($_POST['title_val']):'';
	$pass=isset($_POST['pass'])?html($_POST['pass']):'';
	$px=isset($_POST['px'])?html($_POST['px']):'';
	
	if ($fid==''||!checknum($fid)||$title==''||$pass==''||!checknum($pass)||$px==''||!checknum($px)){
		msg('参数错误');
	}
	
	//添加权限信息
	$sql='insert into '.table('master_action').' (`fid`,`title`,`title_val`,`pass`,`px`) values('.$fid.',"'.$title.'","'.$title_val.'",'.$pass.','.$px.')';
	$db->execute($sql);
}

msg('添加成功','location="a_default.php"');
?>
