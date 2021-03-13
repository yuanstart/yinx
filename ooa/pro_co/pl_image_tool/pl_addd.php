<?php 
require('../../../include/common.inc.php');
require('../../../include/uploadfile.class.php');
require('pl_config.php');
$cong=load_config('setup');//加载整站配置文件
checklogin();

$pl_id=isset($_POST['pl_id'])?$_POST['pl_id']:'';
$img_sl=isset($_POST['img_sl'])?html($_POST['img_sl']):'';
$px=isset($_POST['px'])?html($_POST['px']):'';
if ($pl_id!=''&&!checknum($pl_id)){
	msg('参数错误');
}
if ($img_sl==''||$px==''||!checknum($px)){
	msg('参数错误');
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
$sql='insert into '.table($conf['pl']['table']).' (`sy_id`,`pl_id`'.$title_key.',`img_sl`,`pass`,`px`) values ';
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
			$sql.='('.$conf['pl']['sy_id'].','.$pr_id.''.$title_val.',"'.$img_sl[$k].'",1,'.$px[$k].')';
		}else{
			$sql.=',('.$conf['pl']['sy_id'].','.$pr_id.''.$title_val.',"'.$img_sl[$k].'",1,'.$px[$k].')';
		}
		$a++;
	}
}
$db->execute($sql);
msg("","location='pl_default.php?pl_id=".$pl_id."'");
?>