<?php
require('../../include/common.inc.php');
checklogin();//检查登录
$cong=load_config('setup');//加载整站配置文件
$conf=read_config('config');//读取本系统配置文件
checkaction($conf['sy']['pre'].'_lm_add');//检查权限

$fid=isset($_POST['fid'])?html($_POST['fid']):'';
$apname_lm=isset($_POST['apname_lm'])?html($_POST['apname_lm']):'';
$url_lm=isset($_POST['url_lm'])?html($_POST['url_lm']):'';
$img_sl_lm=isset($_POST['img_sl_lm'])?html($_POST['img_sl_lm']):'';
$add_xx=isset($_POST['add_xx'])?html($_POST['add_xx']):'';
$add_xia=isset($_POST['add_xia'])?html($_POST['add_xia']):'';
$con_att=isset($_POST['con_att'])?html($_POST['con_att']):'';
$px=isset($_POST['px'])?html($_POST['px']):'';
if ($fid==''||!checknum($fid)||$px==''||!checknum($px)){
	msg('参数错误');
}

//判断必填项，同时转换为字段名、转换为字段值
$title_lm='';
$title_lm_key='';$title_lm_val='';$f_body_lm_key='';$f_body_lm_val='';$z_body_lm_key='';$z_body_lm_val='';
$ym_tit_key='';$ym_tit_val='';$ym_key_key='';$ym_key_val='';$ym_des_key='';$ym_des_val='';
foreach($cong['mlang'] as $k=>$v){
	//判断必填项
	if($v['must']==true&&empty($_POST['title_lm'.$v['lang']])){
		msg('参数错误');
	}
	//获取第1个标题用于添加日志
	if ($k==0){
		$title_lm=!empty($_POST['title_lm'.$v['lang']])?html($_POST['title_lm'.$v['lang']]):'';
	}
	//转换为字段名、转换为字段值
	$title_lm_key .=',`title_lm'.$v['lang'].'`';
	$title_lm_val .=',"'.(!empty($_POST['title_lm'.$v['lang']])?html($_POST['title_lm'.$v['lang']]):'').'"';
	if ($conf['lm']['f_body_lm']==true){
		$f_body_lm_key.=',`f_body_lm'.$v['lang'].'`';
		$f_body_lm_val.=',"'.(!empty($_POST['f_body_lm'.$v['lang']])?html($_POST['f_body_lm'.$v['lang']]):'').'"';
	}
	if ($conf['lm']['z_body_lm']==true){
		$z_body_lm_key.=',`z_body_lm'.$v['lang'].'`';
		$z_body_lm_val.=',"'.(!empty($_POST['z_body_lm'.$v['lang']])?$_POST['z_body_lm'.$v['lang']]:'').'"';
	}
	$ym_tit_key   .=',`ym_tit'.$v['lang'].'`';
	$ym_tit_val   .=',"'.(!empty($_POST['ym_tit'.$v['lang']])?html($_POST['ym_tit'.$v['lang']]):'').'"';
	$ym_key_key   .=',`ym_key'.$v['lang'].'`';
	$ym_key_val   .=',"'.(!empty($_POST['ym_key'.$v['lang']])?html($_POST['ym_key'.$v['lang']]):'').'"';
	$ym_des_key   .=',`ym_des'.$v['lang'].'`';
	$ym_des_val   .=',"'.(!empty($_POST['ym_des'.$v['lang']])?html($_POST['ym_des'.$v['lang']]):'').'"';
	if ($conf['co']['mlang']!=true){
		break;
	}
}

//判断系统支持几级分类
if ($fid!=0){
	$rsa=$db->getrs('select * from '.table($conf['sy']['table_lm']).' where id_lm='.$fid.'');
	if(!$rsa){
		msg('上级分类不存在或已删除');
	}else{
		if ($conf['sy']['level_lm']>0&&$rsa['level_lm']>($conf['sy']['level_lm']-1)){
			msg('系统最多可以添加'.$conf['sy']['level_lm'].'级分类');
		}
	}
}

//添加分类信息
$sql='insert into '.table($conf['sy']['table_lm']).' (`fid`'.$title_lm_key.',`apname_lm`,`url_lm`'.$f_body_lm_key.''.$z_body_lm_key.',`img_sl_lm`,`add_xx`,`add_xia`,`con_att`'.$ym_tit_key.''.$ym_key_key.''.$ym_des_key.',`tuijian`,`hot`,`pass`,`px`,`wtime`,`ip`) values('.$fid.''.$title_lm_val.',"'.$apname_lm.'","'.$url_lm.'"'.$f_body_lm_val.''.$z_body_lm_val.',"'.$img_sl_lm.'","'.$add_xx.'","'.$add_xia.'","'.$con_att.'"'.$ym_tit_val.''.$ym_key_val.''.$ym_des_val.',0,0,1,'.$px.','.time().',"'.getip().'")';
$db->execute($sql);

//更新新增的分类的分类列表和分类级别
//获取新增的分类id
$id=$db->insert_id();
//如果没有上级分类，分类列表就是新增的分类id，分类级别就是1级
if ($fid==0){
	$list_lm=",".$id.",";
	$level_lm=1;
//如果有上级分类，分类列表就在上级分类列表的基础上加上新增的分类id，分类级别就在上级分类级别的基础上加1级
}else{
	$rsa=$db->getrs('select * from '.table($conf['sy']['table_lm']).' where id_lm='.$fid.'');
	if(!$rsa){
		msg('上级分类不存在或已删除');
	}else{
		$list_lm=$rsa['list_lm'].$id.',';
		$level_lm=$rsa['level_lm']+1;
	}
}
//把获取的分类列表和分类级别更新到新增的分类记录里
$db->execute('update '.table($conf['sy']['table_lm']).' set `list_lm`="'.$list_lm.'",level_lm='.$level_lm.' where id_lm='.$id.'');

//添加日志
master_log('添加'.$conf['sy']['name'].'分类：'.$title_lm.'');

echo '<script language="javascript">if (confirm("栏目添加成功,\r\n确定要继续添加吗?")){location="add.php"}else{location="default.php"}</script>';
exit();
?>
