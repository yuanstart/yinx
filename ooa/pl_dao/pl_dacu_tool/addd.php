<?php
require('../../../include/common.inc.php');
checklogin();
$conf=read_config('config');//读取本系统配置文件
checkaction($conf['sy']['pre'].'_dacu_add');//检查权限

$lm=isset($_POST['lm'])?html($_POST['lm']):'';
$s_id=isset($_POST['s_id'])?html($_POST['s_id']):'';
$e_id=isset($_POST['e_id'])?html($_POST['e_id']):'';
$idlist=isset($_POST['idlist'])?html($_POST['idlist']):'';
$s_wtime=isset($_POST['s_wtime'])?html($_POST['s_wtime']):'';
$e_wtime=isset($_POST['e_wtime'])?html($_POST['e_wtime']):'';

$sq='';
if ($lm!=''&&checknum($lm)){
	$sq.=' and locate(",'.$lm.',",list_lm)>0';
}
if ($s_id!=''&&checknum($s_id)){
	$sq.=' and id>='.$s_id.'';
}
if ($e_id!=''&&checknum($e_id)){
	$sq.=' and id<='.$e_id.'';
}
if ($idlist!=''){
	$sq.=' and id in ('.$idlist.')';
}
if ($s_wtime!=''){
	if(!checkd($s_wtime)){
		msg('开始日期错误');
	}
}
if ($e_wtime!=''){
	if(!checkd($e_wtime)){
		msg('结束日期错误');
	}
}
//时间范围
if($s_wtime!=''&&$e_wtime!=''){
	$sq.=' and (wtime>='.strtotime($s_wtime).' and wtime<='.(strtotime($e_wtime)+60*60*24).')';
}elseif($s_wtime!=''){
	$sq.=' and (wtime>='.strtotime($s_wtime).' )';
}elseif($e_wtime!=''){
	$sq.=' and (wtime<='.(strtotime($e_wtime)+60*60*24).' )';
}

function change_code($str){
	return iconv('utf-8','gb2312',$str);
}

//格式化字段，加入'`'符号
$b=0;
$tmpfields='';
$arrf=explode(',',$conf['sy']['fields']);
foreach($arrf as $k=>$v){
	if ($b==0){
		$tmpfields='`'.$v.'`';
	}else{
		$tmpfields.=',`'.$v.'`';
	}
	$b++;
}

//创建内存文件
$fp = fopen('php://memory','w');
fputcsv($fp,$arrf);
$sql='select '.$tmpfields.' from '.table($conf['sy']['table_co']).' where 1=1 '.$sq.' order by `id` desc';
$rows=$db->getrss($sql);
foreach($rows as $v){
	fputcsv($fp,array_map('change_code',$v));
}
unset($rows);

//文件指针指向文件头，读取文件内容
rewind($fp);
$content = '';
while(!feof($fp)){
	$content .= fread($fp,1024);
}
fclose($fp);

header("Content-type:text/csv");
header('Content-Disposition: attachment;filename="'.date('Ymd').rand().'.csv"');
header('Cache-Control: max-age=1');
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

//刷新缓冲
ob_flush();
flush();

echo $content;

//添加日志
master_log('数据表批量导出：'.$conf['sy']['table_co']);
exit();
?>