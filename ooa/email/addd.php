<?php
require('../../include/common.inc.php');
checklogin();
checkaction('email_co_add');

$act=isset($_GET['act'])?html($_GET['act']):'1';
$r_sel=isset($_POST['r_sel'])?html($_POST['r_sel']):'';
$r_sel_stime=isset($_POST['r_sel_stime'])?html($_POST['r_sel_stime']):'';
$r_sel_etime=isset($_POST['r_sel_etime'])?html($_POST['r_sel_etime']):'';
$r_sel_email=isset($_POST['r_sel_email'])?html($_POST['r_sel_email']):'';
$s_email=isset($_POST['s_email'])?html($_POST['s_email']):'';
$s_name=isset($_POST['s_name'])?html($_POST['s_name']):'';
$s_num=isset($_POST['s_num'])?html($_POST['s_num']):'';
$s_time=isset($_POST['s_time'])?html($_POST['s_time']):'';
$h_email=isset($_POST['h_email'])?html($_POST['h_email']):'';
$title=isset($_POST['title'])?html($_POST['title']):'';
$save_mb=isset($_POST['save_mb'])?html($_POST['save_mb']):'';
$z_body=isset($_POST['z_body'])?$_POST['z_body']:'';
$fil_sl=isset($_POST['fil_sl'])?html($_POST['fil_sl']):'';
$r_email='';

if ($s_email==''||$s_name==''||$s_num==''||!checknum($s_num)||$s_time==''||!checknum($s_time)||$h_email==''||$s_email==''||$title==''){
	msg('参数错误!');
}

if ($act==2&&$r_sel==''&&$r_sel_email==''){
	msg('请填写收件箱');
}

//订阅页面条件选择的时间段内的邮箱参数判断
if ($r_sel==3){
	if ($r_sel_stime!=''){
		if(!checkd($r_sel_stime)){
			msg('开始订阅日期错误');
		}
	}
	if ($r_sel_etime!=''){
		if(!checkd($r_sel_etime)){
			msg('结束订阅日期错误');
		}
	}
}

//会员页面条件选择时间段内的邮箱参数判断
if ($r_sel==8){
	if ($r_sel_stime!=''){
		if(!checkd($r_sel_stime)){
			msg('开始注册日期错误');
		}
	}
	if ($r_sel_etime!=''){
		if(!checkd($r_sel_etime)){
			msg('结束注册日期错误');
		}
	}
}

//订阅页面条件选择
$dy_tj_email='';
if ($r_sel!=''){
	$sq='';
	if ($r_sel==3){
		if($r_sel_stime!=''&&$r_sel_etime!=''){
			$sq.=' and (wtime>='.strtotime($r_sel_stime).' and wtime<='.(strtotime($r_sel_etime)+60*60*24).')';
		}elseif($r_sel_stime!=''){
			$sq.=' and (wtime>='.strtotime($r_sel_stime).' )';
		}elseif($r_sel_etime!=''){
			$sq.=' and (wtime<='.(strtotime($r_sel_etime)+60*60*24).' )';
		}
	}
	$rows=$db->getrss('select `email` from '.table('email_dy').' where `pass`=1 '.$sq.' order by `id` desc');
	if ($rows){
		foreach($rows as $v){
			$dy_tj_email.=','.$v['email'];
		}
		$dy_tj_email=substr($dy_tj_email,1);
	}
}

//会员页面条件选择
$hy_tj_email='';
if ($r_sel!=''){
	$sq='';
	if ($r_sel==8){
		if($r_sel_stime!=''&&$r_sel_etime!=''){
			$sq.=' and (wtime>='.strtotime($r_sel_stime).' and wtime<='.(strtotime($r_sel_etime)+60*60*24).')';
		}elseif($r_sel_stime!=''){
			$sq.=' and (wtime>='.strtotime($r_sel_stime).' )';
		}elseif($r_sel_etime!=''){
			$sq.=' and (wtime<='.(strtotime($r_sel_etime)+60*60*24).' )';
		}
	}
	$rows=$db->getrss('select `email` from '.table('person').' where `pass`=1 '.$sq.' order by `id` desc');
	if ($rows){
		foreach($rows as $v){
			$hy_tj_email.=','.$v['email'];
		}
		$hy_tj_email=substr($hy_tj_email,1);
	}
}

//如果有列表选择，就把条件选择加入到列表选择里 收件箱=列表选择+条件选择
if ($r_sel_email!=''){
	$arr=explode(',',$r_sel_email);
	//订阅页面的条件选择
	if ($dy_tj_email!=''){
		$temp_str='';
		$temp_arr=explode(',',$dy_tj_email);
		foreach($temp_arr as $k=>$v){
			if (!in_array($v,$arr)){
				$temp_str.=','.$v;
			}
		}
		$r_email=$r_sel_email.$temp_str;
	}
	//会员页面的条件选择
	if ($hy_tj_email!=''){
		$temp_str='';
		$temp_arr=explode(',',$hy_tj_email);
		foreach($temp_arr as $k=>$v){
			if (!in_array($v,$arr)){
				$temp_str.=','.$v;
			}
		}
		$r_email=$r_sel_email.$temp_str;
	}
}else{
	//如果订阅页面列表选择等于空，收件箱就等于订阅的条件选择
	if($dy_tj_email!=''){
		$r_email=$dy_tj_email;
	}
	//如果会员页面列表选择等于空，收件箱就等于会员的条件选择
	if($hy_tj_email!=''){
		$r_email=$hy_tj_email;
	}
}

//发件箱列表，以id形式保存
$s_email=implode(',',$s_email);

//入库
$sql='insert into '.table('email_co').' (`r_sel`,`r_sel_stime`,`r_sel_etime`,`r_sel_email`,`r_email`,`s_email`,`s_name`,`s_num`,`s_time`,`h_email`,`title`,`z_body`,`fil_sl`,`ip`,`wtime`) values("'.$r_sel.'","'.$r_sel_stime.'","'.$r_sel_etime.'","'.$r_sel_email.'","'.$r_email.'","'.$s_email.'","'.$s_name.'","'.$s_num.'","'.$s_time.'","'.$h_email.'","'.$title.'","'.$z_body.'","'.$fil_sl.'","'.getip().'",'.time().')';
$db->execute($sql);
$id=$db->insert_id();

//存为模板
if ($save_mb==1){
	$bname=date('YmdHis').'模板';
	$sql='insert into '.table('email_mb').' (`bname`,`title`,`z_body`,`fil_sl`,`pass`,`px`,`wtime`)values("'.$bname.'","'.$title.'","'.$z_body.'","'.$fil_sl.'",1,100,'.time().')';
	$db->execute($sql);
}

//添加日志
master_log('添加邮件：'.$title.'');

//保存或保存发送
if($act=='1'){
	msg('保存成功','location="default.php"');
}elseif ($act==2){
	header('location:send_email.php?id='.$id.'');
}
?>