<?php
require('../../include/common.inc.php');
checklogin();
$conf=read_config('config');

$id=isset($_POST['id'])?html($_POST['id']):'';
$z_body=isset($_POST['z_body'])?html($_POST['z_body']):'';
$h_body=isset($_POST['h_body'])?html($_POST['h_body']):'';
$url=isset($_POST['url'])?$_POST['url']:'';
if ($id==''||!checknum($id)){
	msg('参数错误');
}

$row=$db->getrs('select * from '.table($conf['sy']['table_co']).' where `id`='.$id.'');
if ($row){
	//修改留言
	checkaction($conf['sy']['pre'].'_edit');
	$db->execute('update '.table($conf['sy']['table_co']).' set z_body="'.$z_body.'" where `id`='.$id.'');
	master_log('修改'.$conf['sy']['name'].'信息：'.$row['title'].'');
	//回复留言
	if ($h_body!=''){
		checkaction($conf['sy']['pre'].'_huifu');
		$rs=$db->getrs('select * from '.table($conf['sy']['table_co']).' where `id_re`='.$id.' order by `id` desc limit 1');
		if ($rs){
			$db->execute('update '.table($conf['sy']['table_co']).' set `z_body`="'.$h_body.'",`huifu`=1 where `id`='.$rs["id"].'');
		}else{
			$db->execute('insert into '.table($conf['sy']['table_co']).' (`id_re`,`z_body`,`wtime`,`ip`,`chakan`,`huifu`,`pass`)values('.$id.',"'.$h_body.'",'.time().',"'.getip().'",0,1,1)');
		}
		master_log('回复'.$conf['sy']['name'].'信息：'.$row['title'].'');
	}
}

msg('操作成功','location="show.php?id='.$id.'&url='.urlencode($url).'"');
?>