<?php
require('../../include/common.inc.php');
checklogin();//检查登录
$cong=load_config('setup');//加载整站配置文件
$conf=read_config('config','../');//读取本系统配置文件
checkaction($conf['sy']['pre'].'_co_add');//检查权限

$lm=isset($_POST['lm'])?html($_POST['lm']):'';
$apname=isset($_POST['apname'])?html($_POST['apname']):'';
$link_url=isset($_POST['link_url'])?html($_POST['link_url']):'';
$img_sl=isset($_POST['img_sl'])?html($_POST['img_sl']):'';
$fil_sl=isset($_POST['fil_sl'])?html($_POST['fil_sl']):'';
$px=isset($_POST['px'])?html($_POST['px']):'';
$wtime=isset($_POST['wtime'])?strtotime(html($_POST['wtime'])):'';
if ($lm==''||!checknum($lm)||$px==''||!checknum($px)){
	msg('参数错误!');
}

//多语言的多个字段动态获取，先判断必填项，然后转换为数据表字段名和字段值
$title='';
$title_key='';$title_val='';$keyword_key='';$keyword_val='';$f_body_key='';$f_body_val='';$z_body_key='';$z_body_val='';
$ym_tit_key='';$ym_tit_val='';$ym_key_key='';$ym_key_val='';$ym_des_key='';$ym_des_val='';
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
	$title_key.=',`title'.$v['lang'].'`';
	$title_val.=',"'.(!empty($_POST['title'.$v['lang']])?html($_POST['title'.$v['lang']]):'').'"';
	if ($conf['co']['keyword']==true){
		$keyword_key.=',`keyword'.$v['lang'].'`';
		$keyword_val.=',"'.(!empty($_POST['keyword'.$v['lang']])?html($_POST['keyword'.$v['lang']]):'').'"';
	}
	if ($conf['co']['f_body']==true){
		$f_body_key.=',`f_body'.$v['lang'].'`';
		$f_body_val.=',"'.(!empty($_POST['f_body'.$v['lang']])?html($_POST['f_body'.$v['lang']]):'').'"';
	}
	if ($conf['co']['z_body']==true){
		$z_body_key.=',`z_body'.$v['lang'].'`';
		$z_body_val.=',"'.(!empty($_POST['z_body'.$v['lang']])?$_POST['z_body'.$v['lang']]:'').'"';
	}
	if ($cong['sy_seo']==true&&$conf['co']['seo']==true){
		$ym_tit_key.=',`ym_tit'.$v['lang'].'`';
		$ym_tit_val.=',"'.(!empty($_POST['ym_tit'.$v['lang']])?html($_POST['ym_tit'.$v['lang']]):'').'"';
		$ym_key_key.=',`ym_key'.$v['lang'].'`';
		$ym_key_val.=',"'.(!empty($_POST['ym_key'.$v['lang']])?html($_POST['ym_key'.$v['lang']]):'').'"';
		$ym_des_key.=',`ym_des'.$v['lang'].'`';
		$ym_des_val.=',"'.(!empty($_POST['ym_des'.$v['lang']])?html($_POST['ym_des'.$v['lang']]):'').'"';
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

//数据入库
$sql='insert into '.table($conf['sy']['table_co']).' (`lm`,`list_lm`'.$title_key.',`apname`'.$keyword_key.',`link_url`'.$f_body_key.''.$z_body_key.',`img_sl`,`fil_sl`'.$ym_tit_key.''.$ym_key_key.''.$ym_des_key.',`ding`,`tuijian`,`hot`,`pass`,`read_num`,`px`,`ip`,`wtime`) values('.$lm.',"'.$list_lm.'"'.$title_val.',"'.$apname.'"'.$keyword_val.',"'.$link_url.'"'.$f_body_val.''.rekey($z_body_val).',"'.$img_sl.'","'.$fil_sl.'"'.$ym_tit_val.''.$ym_key_val.''.$ym_des_val.',0,0,0,1,0,'.$px.',"'.getip().'",'.$wtime.')';
$db->execute($sql);
$id=$db->insert_id();

//添加日志
master_log('添加'.$conf['sy']['name'].'信息：'.$title.'');

msg('添加成功','location="default.php"');
?>