<?php
require('../../../include/common.inc.php');
require('pl_config.php');
$cong=load_config('setup');//加载整站配置文件
checklogin();

$pl_id=isset($_POST['pl_id'])?html($_POST['pl_id']):'';
$link_url=isset($_POST['link_url'])?html($_POST['link_url']):'';
$img_sl=isset($_POST['img_sl'])?html($_POST['img_sl']):'';
$img_sl2=isset($_POST['img_sl2'])?html($_POST['img_sl2']):'';
$px=isset($_POST['px'])?html($_POST['px']):'';
if ($pl_id!=''&&!checknum($pl_id)){
	exit('参数错误');
}
if ($px==''||!checknum($px)){
	msg('参数错误!');
}

//判断必填项，同时转换为字段名、转换为字段值
$title_key='';$title_val='';$z_body_key='';$z_body_val='';
$ym_tit_key='';$ym_tit_val='';$ym_key_key='';$ym_key_val='';$ym_des_key='';$ym_des_val='';
foreach($cong['mlang'] as $k=>$v){
	//判断必填项
	if($v['must']==true&&empty($_POST['title'.$v['lang']])){
		msg('参数错误');
	}
	//转换为字段名、转换为字段值
	$title_key.=',`title'.$v['lang'].'`';
	$title_val.=',"'.(!empty($_POST['title'.$v['lang']])?html($_POST['title'.$v['lang']]):'').'"';
	$z_body_key.=',`z_body'.$v['lang'].'`';
	$z_body_val.=',"'.(!empty($_POST['z_body'.$v['lang']])?$_POST['z_body'.$v['lang']]:'').'"';
	$ym_tit_key.=',`ym_tit'.$v['lang'].'`';
	$ym_tit_val.=',"'.(!empty($_POST['ym_tit'.$v['lang']])?html($_POST['ym_tit'.$v['lang']]):'').'"';
	$ym_key_key.=',`ym_key'.$v['lang'].'`';
	$ym_key_val.=',"'.(!empty($_POST['ym_key'.$v['lang']])?html($_POST['ym_key'.$v['lang']]):'').'"';
	$ym_des_key.=',`ym_des'.$v['lang'].'`';
	$ym_des_val.=',"'.(!empty($_POST['ym_des'.$v['lang']])?html($_POST['ym_des'.$v['lang']]):'').'"';
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

$sql='insert into '.table($conf['pl']['table']).' (`sy_id`,`pl_id`'.$title_key.',`link_url`'.$z_body_key.',`img_sl2`,`img_sl`'.$ym_tit_key.''.$ym_key_key.''.$ym_des_key.',`pass`,`read_num`,`px`,`ip`,`wtime`) values('.$conf['pl']['sy_id'].','.$pr_id.''.$title_val.',"'.$link_url.'"'.$z_body_val.',"'.$img_sl2.'","'.$img_sl.'"'.$ym_tit_val.''.$ym_key_val.''.$ym_des_val.',1,0,'.$px.',"'.getip().'",'.time().')';
$db->execute($sql);

msg('添加成功','parent.document.getElementById("fra_info").src="pl_info_tool/pl_default.php?pl_id='.$pr_id.'";parent.tanchuCancle()');
?>