<?php
require('../../include/common.inc.php');
checklogin();
checkaction('code_pc_del');

$ac=isset($_GET['ac'])?$_GET['ac']:'';
$pno=isset($_GET['pno'])?$_GET['pno']:'';
$url=(previous())?previous():'default.php';
if ($ac==''||$pno==''){
	msg('参数错误');
}

//删除批次
if($ac=='del'){
	$db->execute('delete from '.table('code_pc').' where pno="'.$pno.'"');
	master_log('删除防伪码批次：'.$pno);
//删除批次和数据
}elseif ($ac=='dell'){
	$db->execute('delete from '.table('code_pc').' where pno="'.$pno.'"');
	$db->execute('delete from '.table('code_co').' where pno="'.$pno.'"');
	master_log('删除防伪码批次和数据：'.$pno);
}
msg('操作成功','location="'.$url.'"');
?>