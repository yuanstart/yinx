<?php
require('../../include/common.inc.php');
checklogin();

$id=isset($_GET['id'])?$_GET['id']:'';
$page=isset($_GET['page'])?$_GET['page']:'';

if ($id==''||!checknum($id)||$page==''||!checknum($page)){
	msg('参数错误');
}

$row=$db->getrs('select * from '.table('email_co').' where id='.$id.'');
if ($row){
	//获取所有发件服务器
	$arr=$db->getrss('select * from '.table('email_fj').' where id in ('.$row['s_email'].')');
	$arrcount=count($arr);
	//附件地址处理
	if ($row['fil_sl']!=''){
		$row['fil_sl']=MO_ROOT.'/'.$row['fil_sl'];
	}
	//开始发件
	require_once('../../include/phpmailer.class.php');
	$mail             = new PHPMailer();
	$mail->IsSMTP();                                   //告诉类使用smtp发件
	$mail->SMTPDebug  = 1;                             //是否开启调试模式
	$mail->SMTPAuth   = true;                          //设定SMTP需要验证
	$mail->CharSet    = "utf-8";                       //设置邮件编码
	$mail->Port       = 25;                            //发件箱端口
	$mail->Subject    = $row['title'];                 //邮箱标题
	$mail->MsgHTML($row['z_body']);					   //邮箱内容
	$mail->AddReplyTo($row['h_email']);                //回复箱
	if ($row['fil_sl']!=''){
		$mail->AddAttachment($row['fil_sl']);          //附件
	}
	//批量发送
	$shu=explode(',',$row['r_email']);
	$shucount=count($shu);
	for($i=($page-1)*$row['s_num'];$i<$page*$row['s_num']&&$i<$shucount;$i++){
		$mail->ClearAddresses(); 
		$j=rand(0,($arrcount-1));
		$mail->Host       = $arr[$j]['server'];              //发件箱服务器
		$mail->Username   = $arr[$j]['username'];            //发件箱账号
		$mail->Password   = $arr[$j]['password'];            //发件箱密码
		$mail->SetFrom($arr[$j]['email'],$row['s_name']);    //发件箱
		$mail->AddAddress($shu[$i]);                         //收件箱
		//$mail->Send();
		sleep(3);
	}
}
echo '<script>window.parent.send('.$id.','.($page+1).')</script>';
exit();

?>