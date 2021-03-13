<?php
require('../../include/common.inc.php');
checklogin();//检查登录
$cong=load_config('setup');//加载整站配置文件
$conf=read_config('config','../');//读取本系统配置文件
checkaction($conf['sy']['pre'].'_co_edit');//检查权限

$id=isset($_POST['id'])?html($_POST['id']):'';
$lm=isset($_POST['lm'])?html($_POST['lm']):'';
$apname=isset($_POST['apname'])?html($_POST['apname']):'';
$px=isset($_POST['px'])?html($_POST['px']):'';
$wtime=isset($_POST['wtime'])?strtotime(html($_POST['wtime'])):'';
$url=isset($_POST['url'])?$_POST['url']:'';
if ($id==''||!checknum($id)||$lm==''||!checknum($lm)||$px==''||!checknum($px)){
	msg('参数错误');
}

//多语言的多个字段动态获取，先判断必填项，然后转换为数据表字段名和字段值
$title='';
$title_val='';$link_url_val='';$f_body_val='';$z_body_val='';$img_sl_val='';
$ym_tit_val='';$ym_key_val='';$ym_des_val='';
foreach($cong['mlang'] as $k=>$v){
	//判断必填项
	if($v['must']==true&&empty($_POST['title'.$v['lang']])){
		msg('参数错误');
	}
	//获取第1个标题用于添加日志
	if ($k==0){
		$title=!empty($_POST['title'.$v['lang']])?html($_POST['title'.$v['lang']]):'';
	}
	//转换为字段名、转换为字段值
	$title_val       .=',`title'.$v['lang'].'`="'.(!empty($_POST['title'.$v['lang']])?html($_POST['title'.$v['lang']]):'').'"';
	if ($conf['co']['link_url']==true){
		$link_url_val.=',`link_url'.$v['lang'].'`="'.(!empty($_POST['link_url'.$v['lang']])?html($_POST['link_url'.$v['lang']]):'').'"';
	}
	if ($conf['co']['f_body']==true){
		$f_body_val  .=',`f_body'.$v['lang'].'`="'.(!empty($_POST['f_body'.$v['lang']])?html($_POST['f_body'.$v['lang']]):'').'"';
	}
	if ($conf['co']['z_body']==true){
		$z_body_val  .=',`z_body'.$v['lang'].'`="'.(!empty($_POST['z_body'.$v['lang']])?$_POST['z_body'.$v['lang']]:'').'"';
	}
	if ($conf['co']['img_sl']==true){
		$img_sl_val  .=',`img_sl'.$v['lang'].'`="'.(!empty($_POST['img_sl'.$v['lang']])?html($_POST['img_sl'.$v['lang']]):'').'"';
	}
	if ($cong['sy_seo']==true&&$conf['co']['seo']==true){
		$ym_tit_val  .=',`ym_tit'.$v['lang'].'`="'.(!empty($_POST['ym_tit'.$v['lang']])?html($_POST['ym_tit'.$v['lang']]):'').'"';
		$ym_key_val  .=',`ym_key'.$v['lang'].'`="'.(!empty($_POST['ym_key'.$v['lang']])?html($_POST['ym_key'.$v['lang']]):'').'"';
		$ym_des_val  .=',`ym_des'.$v['lang'].'`="'.(!empty($_POST['ym_des'.$v['lang']])?html($_POST['ym_des'.$v['lang']]):'').'"';
	}
	if ($conf['co']['mlang']!=true){
		break;
	}
}

//获取所属分类的分类列表
$list_lm='';
$rs=$db->getrs('select list_lm from '.table($conf['sy']['table_lm']).' where id_lm='.$lm.'');
if ($rs){
	$list_lm=$rs['list_lm'];
}

$sql='update '.table($conf['sy']['table_co']).' set `lm`='.$lm.',`list_lm`="'.$list_lm.'"'.$title_val.',`apname`="'.$apname.'"'.$link_url_val.''.$f_body_val.''.rekey($z_body_val).''.$img_sl_val.''.$ym_tit_val.''.$ym_key_val.''.$ym_des_val.',`px`='.$px.',`wtime`='.$wtime.' where `id`='.$id.'';
$db->execute($sql);

//添加日志
master_log('修改'.$conf['sy']['name'].'信息：'.$title.'');

msg('保存成功','location="'.$url.'"');
?>