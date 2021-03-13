<?php
require('../../include/common.inc.php');
require('../../include/uploadfile.class.php');
checklogin();
$conf=read_config('config','../');
checkaction($conf['sy']['pre'].'_co_add');

$lm=isset($_POST['lm'])?html($_POST['lm']):'';
$title=isset($_POST['title'])?html($_POST['title']):'';
$ageno=isset($_POST['ageno'])?html($_POST['ageno']):'';
$area=isset($_POST['area'])?html($_POST['area']):'';
$idcard=isset($_POST['idcard'])?html($_POST['idcard']):'';
$wx=isset($_POST['wx'])?html($_POST['wx']):'';
$qq=isset($_POST['qq'])?html($_POST['qq']):'';
$phone=isset($_POST['phone'])?html($_POST['phone']):'';
$stime=isset($_POST['stime'])?strtotime(html($_POST['stime'])):'';
$etime=isset($_POST['etime'])?strtotime(html($_POST['etime'])):'';
$f_body=isset($_POST['f_body'])?html($_POST['f_body']):'';
$z_body=isset($_POST['z_body'])?$_POST['z_body']:'';
$img_sl=isset($_POST['img_sl'])?html($_POST['img_sl']):'';
$ym_tit=isset($_POST['ym_tit'])?html($_POST['ym_tit']):'';
$ym_key=isset($_POST['ym_key'])?html($_POST['ym_key']):'';
$ym_des=isset($_POST['ym_des'])?html($_POST['ym_des']):'';
$px=isset($_POST['px'])?html($_POST['px']):'';
$wtime=isset($_POST['wtime'])?strtotime(html($_POST['wtime'])):'';

if ($lm==''||$title==''||$px==''||!checknum($px)){
	msg('参数错误!');
}

//判断经销商名是否重复
if ($title!=''){
	$rs=$db->getrs('select title from '.table($conf['sy']['table_co']).' where title="'.$title.'"');
	if ($rs){
		msg('存在相同的经销商名，使用公司名为：'.$rs['title']);
	}
}
//判断代理编号是否重复
if ($conf['co']['ageno']==true&&$ageno!=''){
	$rs=$db->getrs('select title from '.table($conf['sy']['table_co']).' where ageno="'.$ageno.'"');
	if ($rs){
		msg('存在相同的代理编号，使用公司名为：'.$rs['title']);
	}
}
//判断微信号是否重复
if ($conf['co']['wx']==true&&$wx!=''){
	$rs=$db->getrs('select title from '.table($conf['sy']['table_co']).' where wx="'.$wx.'"');
	if ($rs){
		msg('存在相同的电话号码，使用公司名为：'.$rs['title']);
	}
}
//判断电话是否重复
if ($conf['co']['phone']==true&&$phone!=''){
	$rs=$db->getrs('select title from '.table($conf['sy']['table_co']).' where phone="'.$phone.'"');
	if ($rs){
		msg('存在相同的电话号码，使用公司名为：'.$rs['title']);
	}
}

$sql='insert into '.table($conf['sy']['table_co']).' (`lm`,`title`,`ageno`,`area`,`idcard`,`wx`,`qq`,`phone`,`stime`,`etime`,`f_body`,`z_body`,`img_sl`,`ym_tit`,`ym_key`,`ym_des`,`pass`,`read_num`,`px`,`ip`,`wtime`) values("'.$lm.'","'.$title.'","'.$ageno.'","'.$area.'","'.$idcard.'","'.$wx.'","'.$qq.'","'.$phone.'","'.$stime.'","'.$etime.'","'.$f_body.'","'.$z_body.'","'.$img_sl.'","'.$ym_tit.'","'.$ym_key.'","'.$ym_des.'",1,0,'.$px.',"'.getip().'",'.$wtime.')';
$db->execute($sql);
$id=$db->insert_id();

//生成证书
if($conf['co']['mb_sl']!=''&&$conf['co']['pic_sl']==true&&$conf['pic_sl']){
	//获取当前信息
	$row=$db->getrs('select * from '.table($conf['sy']['table_co']).' where id='.$id.'');
	if ($row){
		//组装文字，把配置文件里的字段名替换为字段的内容
		foreach($conf['pic_sl'] as $k=>$v){
			if (isset($row[$v['t']])){
				$conf['pic_sl'][$k]['t']=$row[$v['t']];
			}
			//如果遇到日期类型需要拆分的话，在配置文件里"获取内容字段"随便填一个标识，然后在这里附加内容
			
			if ($v['t']=='y1'){
				$conf['pic_sl'][$k]['t']=date('Y',$row['stime']);
			}
			if ($v['t']=='m1'){
				$conf['pic_sl'][$k]['t']=date('m',$row['stime']);
			}
			if ($v['t']=='d1'){
				$conf['pic_sl'][$k]['t']=date('d',$row['stime']);
			}
			if ($v['t']=='y2'){
				$conf['pic_sl'][$k]['t']=date('Y',$row['etime']);
			}
			if ($v['t']=='m2'){
				$conf['pic_sl'][$k]['t']=date('m',$row['etime']);
			}
			if ($v['t']=='d2'){
				$conf['pic_sl'][$k]['t']=date('d',$row['etime']);
			}
			
		}
		//开始生成证书
		$up=new UploadFile();
		//模板路径，生成后保存的路径，文件名，位置和文字数组，字体大小，字体路径
		$pic_sl=$up->makeage($conf['co']['mb_sl'],$conf['co']['path'],$id,$conf['pic_sl']);
		$db->execute('update '.table($conf['sy']['table_co']).' set `pic_sl`="'.$pic_sl.'" where id='.$id.'');
	}
}

//添加日志
master_log('添加'.$conf['sy']['name'].'信息：'.$title.'');

msg('添加成功','location="default.php"');
?>