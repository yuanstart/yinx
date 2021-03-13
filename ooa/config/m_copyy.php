<?php
require('../../include/common.inc.php');

checklogin();
$act=isset($_POST['act'])?html($_POST['act']):'';

if ($act==1){

	$ftitle=isset($_POST['ftitle'])?html($_POST['ftitle']):'';
	$fpass=isset($_POST['fpass'])?html($_POST['fpass']):'';
	$fpx=isset($_POST['fpx'])?html($_POST['fpx']):'';
	$id=isset($_POST['id'])?html($_POST['id']):'';
	$title=isset($_POST['title'])?html($_POST['title']):'';
	$link_url=isset($_POST['link_url'])?html($_POST['link_url']):'';
	$title2=isset($_POST['title2'])?html($_POST['title2']):'';
	$link_url2=isset($_POST['link_url2'])?html($_POST['link_url2']):'';
	$px=isset($_POST['px'])?html($_POST['px']):'';
	
	if ($ftitle==''||$fpass==''||!checknum($fpass)||$fpx==''||!checknum($fpx)||$id==''||!checknum($id)){
		msg('参数错误');
	}
	
	//添加导航信息
	$sql='insert into '.table('master_menu').' (`ty`,`fid`,`title`,`link_url`,`title2`,`link_url2`,`pass`,`px`) values(1,0,"'.$ftitle.'","","","",'.$fpass.','.$fpx.')';
	$db->execute($sql);
	$fid=$db->insert_id();
	
	foreach($id as $k=>$v){
		if (isset($title[$k])&&$title[$k]!=''&&isset($_POST['ty'.$v])&&isset($_POST['pass'.$v])){
			$db->execute('insert into '.table('master_menu').' (`ty`,`fid`,`title`,`link_url`,`title2`,`link_url2`,`pass`,`px`) values('.$_POST['ty'.$v].','.$fid.',"'.$title[$k].'","'.$link_url[$k].'","'.$title2[$k].'","'.$link_url2[$k].'",'.$_POST['pass'.$v].','.$px[$k].')');
		}
	}

}elseif($act==2){

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
}

msg('添加成功','location="m_default.php"');
?>
