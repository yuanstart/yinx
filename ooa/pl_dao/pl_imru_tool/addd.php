<?php
require('../../../include/common.inc.php');
checklogin();
$cong=load_config('setup');//加载整站配置文件
$conf=read_config('config');//读取本系统配置文件
checkaction($conf['sy']['pre'].'_imru_add');//检查权限

$lm=isset($_POST['lm'])?html($_POST['lm']):'';
$img_sl=isset($_POST['img_sl'])?html($_POST['img_sl']):'';
$px=isset($_POST['px'])?html($_POST['px']):'';

if ($lm==''||!checknum($lm)||$img_sl==''||$px==''||!checknum($px)){
	msg('参数错误');
}

//获取所属分类的分类列表
$list_lm='';
$rs=$db->getrs('select `list_lm` from '.table($conf['sy']['table_lm']).' where id_lm='.$lm.'');
if ($rs){
	$list_lm=$rs['list_lm'];
}

//转换为字段名
$title_key='';
foreach($cong['mlang'] as $k=>$v){
	//转换为字段名
	$title_key.=',`title'.$v['lang'].'`';
	if ($conf['sy']['mlang']!=true){
		break;
	}
}

//把批量上传组装成一条sql语句
$sql='insert into '.table($conf['sy']['table_co']).' (`lm`,`list_lm`'.$title_key.',`img_sl`,`ding`,`tuijian`,`hot`,`pass`,`px`,`wtime`,`ip`) values ';
$a=1;
foreach ($img_sl as $k=>$v){
	if ($img_sl[$k]!=''){
		//转换为字段值
		$title_val='';
		foreach($cong['mlang'] as $ek=>$ev){
			//转换为字段值
			$title_val.=',"'.(!empty($_POST['title'.$ev['lang']][$k])?html($_POST['title'.$ev['lang']][$k]):'').'"';
			if ($conf['sy']['mlang']!=true){
				break;
			}
		}
		if ($a==1){
			$sql.='('.$lm.',"'.$list_lm.'"'.$title_val.',"'.$img_sl[$k].'",0,0,0,1,'.$px[$k].','.time().',"'.getip().'")';
		}else{
			$sql.=',('.$lm.',"'.$list_lm.'"'.$title_val.',"'.$img_sl[$k].'",0,0,0,1,'.$px[$k].','.time().',"'.getip().'")';
		}
		$a++;
	}
}
$db->execute($sql);

//添加日志
master_log('数据批量上传：'.$conf['sy']['table_co']);

msg('添加成功','location="add.php"');
?>