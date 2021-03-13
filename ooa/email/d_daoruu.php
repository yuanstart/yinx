<?php
require('../../include/common.inc.php');
require('../../include/uploadfile.class.php');
checklogin();
checkaction('email_dy_daoru');
	
$sava_path='upfile';
//允许上传的文件类型
$allow_types='csv';
//允许上传的大小
$max_size='20000000';
//上传的文件名
$file_name=date('ymdHis').rand(10,99);
//是否可以覆盖
$overfile=false;
//上传后的路径+文件名
$file_p='';

//文件上传
if (isset($_FILES['file_up'])){
	$file=$_FILES['file_up'];
	$up=new UploadFile();
	if($row=$up->upLoad($file,$sava_path,$file_name,$allow_types,$max_size,$overfile)){
		$file_p=$row['name'];
	}else{
		echo '<script>alert("'.$up->error().'");history.back();</script>';
		exit();
	}
}

//数据入库
if ($file_p!=''){
/*	
	//读取excel记录
	$filepath=MO_ROOT.'/'.$file_p;
	$filetype = PHPExcel_IOFactory::identify($filepath);
	$objReader = PHPExcel_IOFactory::createReader($filetype);  //excel2003 和 excel2007
	$objPHPExcel = $objReader->load($filepath);
	$xlsdata=$objPHPExcel->getSheet(0)->toArray(null,true,true,false);
*/
	$handle = fopen(MO_ROOT.'/'.$file_p, "r");
	if (!$handle){
		msg('打开csv文件失败');
	}
	//读取第一行
	if(!$row = fgetcsv($handle)){
		msg('读取csv失败');
	}
	//读取csv记录
	$xlsdata=array();
	while(($row = fgetcsv($handle))!==false){
		if(!empty($row)){
			 $xlsdata[] = $row;
			 unset($row);
		}
	}
	fclose($handle);
	//读取数据库记录,以邮箱做键值
	$dbdata=$db->getrss('select `email` from '.table('email_dy').'','email');
	//开始对比,把数据库没有的记录放入到$arr['add']
	$arr=array();
	foreach($xlsdata as $v){
		if (!isset($dbdata[$v[0]])){
			$arr['add'][]=$v;
		}
	}
	//数据入库
	$a=0;
	$b=0;
	$a=count($xlsdata);
	if(!empty($arr['add'])){
		$sql='insert into '.table('email_dy').' (`email`,`pass`,`ip`,`wtime`)values';
		$arr['add']=array_reverse($arr['add'],true);
		foreach($arr['add'] as $v){
			if ($b==0){
				$sql.='("'.$v[0].'",1,"'.getip().'",'.time().')';
			}else{
				$sql.=',("'.$v[0].'",1,"'.getip().'",'.time().')';
			}
			$b++;
		}
		$db->execute($sql);
		unset($sql);
		unset($dbdata);
		unset($xlsdata);
	}
	if (($a-$b)>0){
		$c='，有 '.($a-$b).' 条记录已经存在，没导入的';
	}else{
		$c='';
	}
	delfile($file_p);
	//添加日志
	master_log('导入订阅邮箱');
	msg('导入成功，本次导入 '.$b.' 条记录'.$c.'','location="d_default.php"');
}

?>