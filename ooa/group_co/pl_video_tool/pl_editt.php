<?php 
require('../../../include/common.inc.php');
require('pl_config.php');
$cong=load_config('setup');//加载整站配置文件
checklogin();

$id=isset($_POST['id'])?html($_POST['id']):'';
$pl_id=isset($_POST['pl_id'])?html($_POST['pl_id']):'';
$link_url=isset($_POST['link_url'])?html($_POST['link_url']):'';
$img_sl=isset($_POST['img_sl'])?html($_POST['img_sl']):'';
$vid_sl=isset($_POST['vid_sl'])?html($_POST['vid_sl']):'';
$px=isset($_POST['px'])?html($_POST['px']):'';
if ($id==''||!checknum($id)){
	msg('参数错误');
}
if ($pl_id!=''&&!checknum($pl_id)){
	msg('参数错误');
}
if ($px==''||!checknum($px)){
	msg('参数错误');
}

//判断必填项，同时转换为字段名、转换为字段值
$title_val='';$z_body_val='';
$ym_tit_val='';$ym_key_val='';$ym_des_val='';
foreach($cong['mlang'] as $k=>$v){
	//判断必填项
	if($v['must']==true&&empty($_POST['title'.$v['lang']])){
		msg('参数错误');
	}
	//转换为字段名、转换为字段值
	$title_val   .=',`title'.$v['lang'].'`="'.(!empty($_POST['title'.$v['lang']])?html($_POST['title'.$v['lang']]):'').'"';
	if ($conf['pl']['z_body']==true){
		$z_body_val  .=',`z_body'.$v['lang'].'`="'.(!empty($_POST['z_body'.$v['lang']])?$_POST['z_body'.$v['lang']]:'').'"';
	}
	$ym_tit_val   .=',`ym_tit'.$v['lang'].'`="'.(!empty($_POST['ym_tit'.$v['lang']])?html($_POST['ym_tit'.$v['lang']]):'').'"';
	$ym_key_val   .=',`ym_key'.$v['lang'].'`="'.(!empty($_POST['ym_key'.$v['lang']])?html($_POST['ym_key'.$v['lang']]):'').'"';
	$ym_des_val   .=',`ym_des'.$v['lang'].'`="'.(!empty($_POST['ym_des'.$v['lang']])?html($_POST['ym_des'.$v['lang']]):'').'"';
	if ($conf['pl']['mlang']!=true){
		break;
	}
}

$sql='update '.table($conf['pl']['table']).' set `link_url`="'.$link_url.'"'.$title_val.''.$z_body_val.',`img_sl`="'.$img_sl.'",`vid_sl`="'.$vid_sl.'"'.$ym_tit_val.''.$ym_key_val.''.$ym_des_val.',`px`='.$px.' where id='.$id.'';
$db->execute($sql);

msg('修改成功','parent.document.getElementById("fra_video").src="pl_video_tool/pl_default.php?pl_id='.$pl_id.'";parent.tanchuCancle()');
?>