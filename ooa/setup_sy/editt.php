<?php
require('../../include/common.inc.php');
checklogin();
$cong=load_config('setup');

$sy_id=isset($_POST['sy_id'])?$_POST['sy_id']:'';
if ($sy_id==''||!checknum($sy_id)){
	msg('参数错误');
}

$ym_tit_val='';$ym_key_val='';$ym_des_val='';$ym_bot_val='';
foreach($cong['mlang'] as $k=>$v){
	$ym_tit_val .=',`ym_tit'.$v['lang'].'`="'.(!empty($_POST['ym_tit'.$v['lang']])?html($_POST['ym_tit'.$v['lang']]):'').'"';
	$ym_key_val .=',`ym_key'.$v['lang'].'`="'.(!empty($_POST['ym_key'.$v['lang']])?html($_POST['ym_key'.$v['lang']]):'').'"';
	$ym_des_val .=',`ym_des'.$v['lang'].'`="'.(!empty($_POST['ym_des'.$v['lang']])?html($_POST['ym_des'.$v['lang']]):'').'"';
}

$sql='update '.table('setup_sy').' set `sy_id`='.$sy_id.''.$ym_tit_val.''.$ym_key_val.''.$ym_des_val.' where `sy_id`='.$sy_id.'';
$db->execute($sql);

//清理缓存
clear_static_cache();

msg('保存成功','location="edit.php?sy_id='.$sy_id.'"');
?>

