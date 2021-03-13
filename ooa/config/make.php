<?php
require('../../include/common.inc.php');
checklogin();

$act=isset($_GET['act'])?html($_GET['act']):'';
if ($act=='post'){
	$rewrite=isset($_POST['rewrite'])?html($_POST['rewrite']):0;
	$sy_seo=isset($_POST['sy_seo'])?html($_POST['sy_seo']):0;
	$log=isset($_POST['log'])?html($_POST['log']):0;
	$key=isset($_POST['key'])?html($_POST['key']):0;
	if (!empty($_POST['must'])){
		foreach($_POST['must'] as $k=>$v){
			$name=(!empty($_POST['name'][$k]))?html($_POST['name'][$k]):'';
			$path=(!empty($_POST['path'][$k]))?html($_POST['path'][$k]):'';
			$lang=(!empty($_POST['lang'][$k]))?html($_POST['lang'][$k]):'';
			$must=(!empty($_POST['must'][$k]))?changety(html($_POST['must'][$k])):false;
			$arr[]=array('name'=>$name,'path'=>$path,'lang'=>$lang,'must'=>$must);
		}
	}else{
		$arr[]=array('name'=>'','path'=>'','lang'=>'','must'=>true);
	}
	$sql='update '.table('setup_gl').' set `rewrite`="'.$rewrite.'",`sy_seo`="'.$sy_seo.'",`log`="'.$log.'",`key`="'.$key.'",`mlang`="'.addslash(serialize($arr)).'" where `id`=1';
	$db->execute($sql);
	//清理缓存
	clear_static_cache();
	msg('保存成功','location="default.php"');
}

?>