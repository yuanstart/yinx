<?php
require('../../include/common.inc.php');
checklogin();

$ac=isset($_GET['ac'])?$_GET['ac']:'';
$url=(previous())?previous():'default.php';
if ($ac==''){
	msg('参数错误');
}

//添加
if ($ac=='add'){
	//检查权限
	checkaction('code_co_add');
	//处理数据
	$pno=isset($_POST['pno'])?html($_POST['pno']):'';
	$fcode=isset($_POST['fcode'])?html($_POST['fcode']):'';
	$pass=isset($_POST['pass'])?html($_POST['pass']):'';
	if ($pno==''||$fcode==''){
		msg('参数错误');
	}
	$row=$db->getrs('select `fcode` from '.table('code_co').' where `fcode`="'.$fcode.'"');
	if ($row){
		msg('该防伪码已存在');
	}else{
		$db->execute('insert into '.table('code_co').' (`pno`,`fcode`,`pass`)values("'.$pno.'","'.$fcode.'","'.$pass.'")');
	}
	//添加日志
	master_log('添加防伪码：'.$fcode);
	msg('添加成功','location="'.$url.'"');
	
//修改	
}elseif($ac=='edit'){
	//检查权限
	checkaction('code_co_edit');
	$id=isset($_POST['idd'])?html($_POST['idd']):'';
	$pno=isset($_POST['pno'])?html($_POST['pno']):'';
	$fcode=isset($_POST['fcode'])?html($_POST['fcode']):'';
	$pass=isset($_POST['pass'])?html($_POST['pass']):'';
	if ($id==''||!checknum($id)||$fcode==''){
		msg('参数错误');
	}
	$a=0;
	$b=0;
	//读取原数据
	$str=implode(',',$id);
	$rss=$db->getrss('select * from '.table('code_co').' where id in ('.$str.')','id');
	//循环现有数据
	foreach($id as $k=>$v){
		if(isset($rss[$v])){
			//判断有没有发生改变
			if ($pno[$k]!=$rss[$v]['pno']||$fcode[$k]!=$rss[$v]['fcode']||$pass[$k]!=$rss[$v]['pass']){
				//看发生改变的防伪码会不会与其他记录的防伪码重复
				$rs=array();
				$rs=$db->getrs('select `fcode` from '.table('code_co').' where `fcode`="'.$fcode[$k].'" and id<>'.$k.'');
				if (!$rs){
					//更新记录
					$db->execute('update '.table('code_co').' set `pno`="'.$pno[$k].'",`fcode`="'.$fcode[$k].'",`pass`="'.$pass[$k].'" where `id`='.$id[$k].'');
					//添加日志
					master_log('修改防伪码：'.$fcode[$k].'');
					$a++;
				}else{
					$b++;
				}
			}
		}
	}
	if($a>0){
		$a='，修改了 '.$a.' 个防伪码';
	}else{
		$a='';
	}
	if ($b>0){
		$b=$a.'，有 '.$b.' 个防伪码是重复的修改不了';
	}else{
		$b='';
	}
	msg('保存成功'.$b.'','location="'.$url.'"');

//删除	
}elseif($ac=='del'){
	//检查权限
	checkaction('code_co_del');
	$id=isset($_POST['id'])?html($_POST['id']):'';
	if ($id==''||!checknum($id)){
		msg('参数错误');
	}
	$id=implode(',',$id);
	//添加日志
	$rss=$db->getrss('select `fcode` from '.table('code_co').' where `id` in ('.$id.')');
	foreach($rss as $row){
		master_log('删除防伪码：'.$row['fcode'].'');	
	}	
	//处理数据
	$sql='delete from '.table('code_co').' where id in ('.$id.')';
	$db->execute($sql);
	msg('删除成功','location="'.$url.'"');
}
?>