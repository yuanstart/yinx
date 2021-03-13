<?php
require('../../../include/common.inc.php');
require('../../../include/uploadfile.class.php');
checklogin();
$conf=read_config('config');//读取本系统配置文件
checkaction($conf['sy']['pre'].'_daru_add');//检查权限
	
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
	//获取分类
	$lm=(!empty($_POST['lm']))?html($_POST['lm']):0;
	
	//获取分类级联列表
	$list_lm='';
	if ($lm>0){
		$list_lm=$db->getvalue('select `list_lm` from '.table($conf['sy']['table_lm']).' where `id_lm`='.$lm.'');
	}
	
	//读取csv数据
	$handle = fopen(MO_ROOT.'/'.$file_p, "r");
	if (!$handle){
		msg('打开csv文件失败');
	}
	//读取第一行
	if(!$row = fgetcsv($handle)){
		msg('读取csv失败');
	}
	//判断字段数量是否一致
	if (count($row)!=count(explode(',',$conf['sy']['fields']))){
		msg('上传的csv文档的字段与数据库里表的字段数量不一致');
	}
	//读取csv记录
	$csvdata=array();
	while(($row = fgetcsv($handle))!==false){
		if(!empty($row)){
			 $csvdata[] = $row;
			 unset($row);
		}
	}
	fclose($handle);
	
	//把额外要赋给默认值的字段和内容组合成一个数组$mr_fileds
	$mr_fileds=array();
	$tabkey='';
	$arr=$db->getrss('show fields from '.table($conf['sy']['table_co']).'');
	foreach ($arr as $v){
		//如果 要必填默认值字段 在数据表的字段列表中
		if (array_key_exists($v['Field'],$conf['sy']['mr_fields'])){
			//如果 要必填默认值字段 没在我选择的那些字段中
			if (strpos(','.$conf['sy']['fields'].',',','.$v['Field'].',')===false){
				if ($conf['sy']['mr_fields_type'][$v['Field']]=='fun'){
					$mr_fileds[$v['Field']]=call_user_func($conf['sy']['mr_fields'][$v['Field']]);
				}else{
					$mr_fileds[$v['Field']]=$conf['sy']['mr_fields'][$v['Field']];
				}
			}
		}
		//把主键字段名赋给$tabkey
		if ($v['Key']=='PRI'){
			$tabkey=$v['Field'];
		}
	}
	unset($arr);
	
	//把 额外要填默认值字段 合并到已选字段列表中
	foreach($mr_fileds as $k=>$v){
		$conf['sy']['fields'].=','.$k;
	}
	
	//把 额外要填默认值内容 合并到导入的内容中
	//获取lm的键值、list_lm的键值，用于下面“改为选择的分类的值”
	$lm_index=-1;
	$list_lm_index=-1;
	$arr=explode(',',$conf['sy']['fields']);
	foreach($arr as $k=>$v){
		if ($v=='lm'){
			$lm_index=$k;
		}
		if ($v=='list_lm'){
			$list_lm_index=$k;
		}
	}
	unset($arr);
	//开始合并
	foreach($csvdata as $k=>$v){
		//把必填内容追加到csv的数组
		$count=count($v);
		foreach($mr_fileds as $ek=>$ev){
			$v[$count]=$ev;
			$count++;
		}
		//如果有选择分类的，把lm、list_lm的值 改为选择的分类的值
		foreach($v as $sk=>$sv){
			if($lm>0&&$sk==$lm_index){
				$v[$sk]=$lm;
			}
			if($lm>0&&$sk==$list_lm_index){
				$v[$sk]=$list_lm;
			}
		}
		$csvdata[$k]=$v;
	}
	
	//看看插入数据的列是不是包含主键，是的话要看主键的值是否会重复，重复的话就要不带主键插入，不是的话就带主键插入
	$arr['key1']='';
	$arr['key2']='';
	$arr['add1']=array();
	$arr['add2']=array();
	//字段列表含有主键
	if (strpos(','.$conf['sy']['fields'].',',','.$tabkey.',')!==false){
		//得到主键字段列的位置$keyindex和去除主键字段的后字段列表$tmpfields
		$b=0;
		$keyindex='';
		$tmpfields='';
		$tmparr=explode(',',$conf['sy']['fields']);
		foreach($tmparr as $k=>$v){
			if ($v!=$tabkey){
				if ($b==0){
					$tmpfields=$v;
				}else{
					$tmpfields.=','.$v;
				}
				$b++;
			}else{
				$keyindex=$k;
			}
		}
		//得到去主键字段内容数组$arr['add1']和带主键字段内容数组$arr['add2']
		$dbdata=$db->getrss('select * from '.table($conf['sy']['table_co']).'',$tabkey);
		$arr['key1']=$tmpfields;
		$arr['key2']=$conf['sy']['fields'];
		foreach($csvdata as $v){
			if (isset($dbdata[$v[$keyindex]])){
				unset($v[$keyindex]);
				$arr['add1'][]=$v;	
			}else{
				$arr['add2'][]=$v;
			}
		}
	//字段列表不含有主键
	}else{
		$arr['key2']=$conf['sy']['fields'];
		$arr['add2']=$csvdata;
	}
	
	//每个字段名(不带主键)加入'`'，防止字段与mysql变量、函数重名
	$b=0;
	$rows=explode(',',$arr['key1']);
	foreach($rows as $k=>$v){
		if ($b==0){
			$arr['key1']='`'.$v.'`';
		}else{
			$arr['key1'].=',`'.$v.'`';
		}
		$b++;
	}
	unset($rows);
	//每个字段名(带主键)加入'`'，防止字段与mysql变量、函数重名
	$b=0;
	$rows=explode(',',$arr['key2']);
	foreach($rows as $k=>$v){
		if ($b==0){
			$arr['key2']='`'.$v.'`';
		}else{
			$arr['key2'].=',`'.$v.'`';
		}
		$b++;
	}
	unset($rows);
	
	//插入不带主键的数据
	$b=0;
	if (!empty($arr['add1'])){
		$sql='insert into '.table($conf['sy']['table_co']).' ('.$arr['key1'].')values';
		$arr['add1']=array_reverse($arr['add1'],true);
		foreach($arr['add1'] as $v){
			$sql.=($b==0)?'(':',(';
			$c=0;
			foreach($v as $ev){
				$ev=iconv('gb2312','utf-8',$ev);
				$sql.=($c==0)?'"'.addslash($ev).'"':',"'.addslash($ev).'"';
				$c++;
			}
			$sql.=')';
			$b++;
		}
		$db->execute($sql);
		unset($sql);
	}
	
	//插入带主键的数据
	$d=0;
	if (!empty($arr['add2'])){
		$sql='insert into '.table($conf['sy']['table_co']).' ('.$arr['key2'].')values';
		$arr['add2']=array_reverse($arr['add2'],true);
		foreach($arr['add2'] as $v){
			$sql.=($d==0)?'(':',(';
			$c=0;
			foreach($v as $ev){
				$ev=iconv('gb2312','utf-8',$ev);
				$sql.=($c==0)?'"'.addslash($ev).'"':',"'.addslash($ev).'"';
				$c++;
			}
			$sql.=')';
			$d++;
		}
		$db->execute($sql);
		unset($sql);
	}
	unset($arr);
	unset($csvdata);
	unset($dbdata);

	//删除文件
	delfile($file_p);
	
	//添加日志
	master_log('数据表批量导入：'.$conf['sy']['table_co']);
	
	msg('导入成功，本次导入 '.($b+$d).' 条记录','location="add.php"');
}

?>