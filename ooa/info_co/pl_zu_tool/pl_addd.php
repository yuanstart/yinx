<?php
require('../../../include/common.inc.php');
require('pl_config.php');
$cong=load_config('setup');//加载整站配置文件
checklogin();

$pl_id=isset($_POST['pl_id'])?html($_POST['pl_id']):'';
$title=isset($_POST['title'])?html($_POST['title']):'';
$img_sl=isset($_POST['img_sl'])?html($_POST['img_sl']):'';
$px=isset($_POST['px'])?html($_POST['px']):'';
if ($pl_id!=''&&!checknum($pl_id)){
	exit('参数错误');
}
if ($px==''||!checknum($px)){
	msg('参数错误!');
}

//判断必填项，同时转换为字段名、转换为字段值
$title_key='';$title_val='';
foreach($cong['mlang'] as $k=>$v){
	//判断必填项
	if($v['must']==true&&empty($_POST['title'.$v['lang']])){
		msg('参数错误');
	}
	//转换为字段名、转换为字段值
	$title_key.=',`title'.$v['lang'].'`';
	$title_val.=',"'.(!empty($_POST['title'.$v['lang']])?html($_POST['title'.$v['lang']]):'').'"';
	if ($conf['pl']['mlang']!=true){
		break;
	}
}

//如果没有$pl_id传入进来，系统生成一个临时id用session来保存
if($pl_id==''||!checknum($pl_id)){
	if(isset($_SESSION[$conf['pl']['sesname']])&&$_SESSION[$conf['pl']['sesname']]!=''&&checknum($_SESSION[$conf['pl']['sesname']])){
		$pr_id=$_SESSION[$conf['pl']['sesname']];
	}else{
		$pr_id=date('His').rand(10,99);
		$_SESSION[$conf['pl']['sesname']]=$pr_id;
	}
}else{
	$pr_id=$pl_id;	
}

$sql='insert into '.table($conf['pl']['table']).' (`fid`,`sy_id`,`pl_id`'.$title_key.',`img_sl`,`pass`,`px`) values(0,'.$conf['pl']['sy_id'].','.$pr_id.''.$title_val.',"'.$img_sl.'",1,'.$px.')';
$db->execute($sql);

msg('添加成功','parent.document.getElementById("fra_zu").src="pl_zu_tool/pl_default.php?pl_id='.$pr_id.'";parent.tanchuCancle()');
?>