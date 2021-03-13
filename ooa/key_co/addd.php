<?php
require('../../include/common.inc.php');
checklogin();
checkaction('key_add');
$cong=load_config('setup');//加载整站配置文件

$px=isset($_POST['px'])?html(trim($_POST['px'])):'';
if ($px==''||!checknum($px)){
	msg('参数错误!');
}

//多语言的多个字段动态获取，先判断必填项，然后转换为数据表字段名和字段值
$title='';$title_key='';$title_val='';$link_url_key='';$link_url_val='';
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
	$link_url_key.=',`link_url'.$v['lang'].'`';
	$link_url_val.=',"'.(!empty($_POST['link_url'.$v['lang']])?html($_POST['link_url'.$v['lang']]):'').'"';
}

$sql='insert into '.table('key_co').' (`pass`,`px`,`ip`,`wtime`'.$title_key.$link_url_key.') values(1,'.$px.',"'.getip().'",'.time().''.$title_val.$link_url_val.')';
$db->execute($sql);

//添加日志
master_log('添加关键词：'.$title.'');

msg('添加成功','location="default.php"');
?>