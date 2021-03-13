<?php
require('../../include/common.inc.php');
checklogin();
checkaction('email_dy_daochu');

$s_wtime=isset($_POST['s_wtime'])?html($_POST['s_wtime']):'';
$e_wtime=isset($_POST['e_wtime'])?html($_POST['e_wtime']):'';
$zt_val=isset($_POST['zt_val'])?$_POST['zt_val']:'';
$keyword=isset($_POST['keyword'])?html($_POST['keyword']):'';

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

$sq='';
//时间范围
if($s_wtime!=''&&$e_wtime!=''){
	$sq.=' and (wtime>='.strtotime($s_wtime).' and wtime<='.(strtotime($e_wtime)+60*60*24).')';
}elseif($s_wtime!=''){
	$sq.=' and (wtime>='.strtotime($s_wtime).' )';
}elseif($e_wtime!=''){
	$sq.=' and (wtime<='.(strtotime($e_wtime)+60*60*24).' )';
}
//如果有状态
if($zt_val!=''){
	if($zt_val=='pass2'){
		$sq.=' and pass=0';
	}elseif($zt_val=='pass1'){
		$sq.=' and pass=1';
	}
}
//如果有关键字
if ($keyword!=''){
	$sq.=' and (email like "%'.$keyword.'%")';
}
//读取数据
$sql='select email from '.table('email_dy').' where 1=1 '.$sq.' order by `id` desc';
$rows=$db->getrss($sql);
/*
excel导出，可以用的，只要调用phpexcel类
//实例化表格
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");
//设置表格每列样式和内容					 
$objPHPExcel->setActiveSheetIndex(0);                                   //设置第一个表格为当前表格
$objPHPExcel->getActiveSheet()->setTitle('Simple');                     //设置当前表格名称
$objPHPExcel->getActiveSheet()->getColumnDimension('A' )->setWidth(35); //设置当前表格的A列的宽度
$objPHPExcel->getActiveSheet()->setCellValue('A1','邮箱');              //设置当前表格的A1单元格的内容
$a=2;
foreach($rows as $v){
	$objPHPExcel->getActiveSheet()->setCellValue('A'.$a,$v['email']);
	$a++;
}
//输出表格头部
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="email.xlsx"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); 
header ('Cache-Control: cache, must-revalidate');
header ('Pragma: public');
//输出表格
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
*/

//转换编码
function change_code($str){
	return iconv('utf-8','gb2312',$str);
}
//创建内存文件
$fp = fopen('php://memory','w');
$arrf=array(change_code("邮箱"));
fputcsv($fp,$arrf);
//开始写入到csv
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

master_log('导出订阅邮箱');
?>