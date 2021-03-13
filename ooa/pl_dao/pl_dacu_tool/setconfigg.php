<?php
require('../../../include/common.inc.php');
checklogin();

$ympath=__FILE__;
//本系统总设置
if (read_config('config')){
	//获取系统配
	$conf['sy']['need_lm']=(!empty($_POST['need_lm']))?changety(html($_POST['need_lm'])):true;
	$conf['sy']['pre']=(!empty($_POST['pre']))?html($_POST['pre']):'pro';
	$conf['sy']['table_lm']=(!empty($_POST['table_lm']))?html($_POST['table_lm']):'';
	$conf['sy']['table_co']=(!empty($_POST['table_co']))?html($_POST['table_co']):'';
	$conf['sy']['fields']=(!empty($_POST['fields']))?implode(',',html($_POST['fields'])):'';
	//保存系统的配置文件
	write_config('config',$conf,$ympath);
	unset($conf);
}

//添加日志
master_log('修改数据批量导入系统：配置文件');

msg('保存成功','location="setconfig.php"');
?>
