<?php 
require('../../../include/common.inc.php');
require('../../../include/uploadfile.class.php');
require('pl_config.php');
$cong=load_config('setup');//加载整站配置文件
checklogin();

$pl_id=isset($_POST['pl_id'])?$_POST['pl_id']:'';
$zu_id=isset($_POST['zu_id'])?$_POST['zu_id']:'';
$img_sl=isset($_POST['img_sl'])?html($_POST['img_sl']):'';
$px=isset($_POST['px'])?html($_POST['px']):'';
if ($pl_id==''||!checknum($pl_id)){
	msg('参数错误');
}
if ($zu_id==''||!checknum($zu_id)){
	msg('参数错误');
}
if ($img_sl==''||$px==''||!checknum($px)){
	msg('参数错误');
}

//转换为字段名
$title_key='';
if ($conf['pl']['title']==true){
	foreach($cong['mlang'] as $k=>$v){
		//转换为字段名
		$title_key.=',`title'.$v['lang'].'`';
		if ($conf['pl']['mlang']!=true){
			break;
		}
	}
}

//把批量上传组装成一条sql语句
$sql='insert into '.table($conf['pl']['table']).' (`sy_id`,`pl_id`,`fid`'.$title_key.',`img_sl`,`pass`,`px`) values ';
$a=1;
foreach ($img_sl as $k=>$v){
	if ($img_sl[$k]!=''){
		//转换为字段值
		$title_val='';
		if ($conf['pl']['title']==true){
			foreach($cong['mlang'] as $ek=>$ev){
				//转换为字段值
				$title_val.=',"'.(!empty($_POST['title'.$ev['lang']][$k])?html($_POST['title'.$ev['lang']][$k]):'').'"';
				if ($conf['pl']['mlang']!=true){
					break;
				}
			}
		}
		if ($a==1){
			$sql.='('.$conf['pl']['sy_id'].','.$pl_id.','.$zu_id.''.$title_val.',"'.$img_sl[$k].'",1,'.$px[$k].')';
		}else{
			$sql.=',('.$conf['pl']['sy_id'].','.$pl_id.','.$zu_id.''.$title_val.',"'.$img_sl[$k].'",1,'.$px[$k].')';
		}
		$a++;
	}
}
$db->execute($sql);
msg('添加成功','parent.document.getElementById("fra_zu").src="pl_zu_tool/pl_default.php?pl_id='.$pl_id.'";parent.tanchuCancle()');
?>