<?php
require('../../include/common.inc.php');
checklogin();
checkaction('setup_gl');
$cong=load_config('setup');
$conf=read_config('config');

$act=isset($_GET['act'])?html($_GET['act']):'';
$s_email=isset($_POST['s_email'])?html($_POST['s_email']):'';
$s_username=isset($_POST['s_username'])?html($_POST['s_username']):'';
$s_password=isset($_POST['s_password'])?html($_POST['s_password']):'';
$s_server=isset($_POST['s_server'])?html($_POST['s_server']):'';
$r_email=isset($_POST['r_email'])?html($_POST['r_email']):'';

$title=isset($_POST['title'])?html($_POST['title']):'';
$f_body=isset($_POST['f_body'])?html($_POST['f_body']):'';
$address=isset($_POST['address'])?html($_POST['address']):'';
$zuobiao=isset($_POST['zuobiao'])?html($_POST['zuobiao']):'';

$ym_tit_val='';$ym_key_val='';$ym_des_val='';$ym_bot_val='';$ym_hcode_val='';$ym_bcode_val='';
foreach($cong['mlang'] as $k=>$v){
	$ym_tit_val .=',`ym_tit'.$v['lang'].'`="'.(!empty($_POST['ym_tit'.$v['lang']])?html($_POST['ym_tit'.$v['lang']]):'').'"';
	$ym_key_val .=',`ym_key'.$v['lang'].'`="'.(!empty($_POST['ym_key'.$v['lang']])?html($_POST['ym_key'.$v['lang']]):'').'"';
	$ym_des_val .=',`ym_des'.$v['lang'].'`="'.(!empty($_POST['ym_des'.$v['lang']])?html($_POST['ym_des'.$v['lang']]):'').'"';
	$ym_bot_val .=',`ym_bot'.$v['lang'].'`="'.(!empty($_POST['ym_bot'.$v['lang']])?$_POST['ym_bot'.$v['lang']]:'').'"';
	$ym_hcode_val .=',`ym_hcode'.$v['lang'].'`="'.(!empty($_POST['ym_hcode'.$v['lang']])?$_POST['ym_hcode'.$v['lang']]:'').'"';
	$ym_bcode_val .=',`ym_bcode'.$v['lang'].'`="'.(!empty($_POST['ym_bcode'.$v['lang']])?$_POST['ym_bcode'.$v['lang']]:'').'"';
}
$sql='update '.table('setup_gl').' set `s_email`="'.$s_email.'",`s_username`="'.$s_username.'",`s_password`="'.$s_password.'",`s_server`="'.$s_server.'",`r_email`="'.$r_email.'",`title`="'.$title.'",`f_body`="'.$f_body.'",`address`="'.$address.'",`zuobiao`="'.$zuobiao.'"'.$ym_tit_val.''.$ym_key_val.''.$ym_des_val.''.$ym_bot_val.''.$ym_hcode_val.''.$ym_bcode_val.' where `id`=1';
$db->execute($sql);

//清理缓存
clear_static_cache();

//添加日志
master_log('修改网站设置：网站基本设置');

msg('保存成功','location="edit.php?act='.$act.'"');

?>

