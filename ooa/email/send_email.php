<?php
require('../../include/common.inc.php');
checklogin();
checkaction('email_co_send');

$id=isset($_GET['id'])?$_GET['id']:'';
if ($id==''||!checknum($id)){
	msg('参数错误');
}

$row=$db->getrs('select * from '.table('email_co').' where id='.$id.'');
if (!$row){
	msg('记录不存在');
}else{
	$arr=explode(',',$row['r_email']);
	$zong=count($arr);
	$s_num=$row['s_num'];
	$s_time=$row['s_time'];
	$title=$row['title'];
}
master_log('发送邮件：'.$title.'');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body >
<div style="font-size:14px; text-align:center; padding-top:250px;">
	<div id="note" style="line-height:150%; display:none;">
    	<img src="../images/load_tiao.gif" /><br />
        邮件正在发送中，本次发送邮件<b><font color="red" id="dang"></font></b>封
    </div>
    <div id="next" style="display:none;">
        <span id="sec" style="color:red"></span>秒后继续发送下一批邮件<br />
    </div>
    总邮件<span style="color:#0033CC; font-weight:bold;" id="zong"></span>封&nbsp;已发送<font color=red id="yi"></font></b>封<br>
</div>
<iframe id="iframe_1" name="iframe_1" src="" width="0" height="0" style="display:none;" ></iframe>
<script>
var i=0;
var page=1;
var timer1='';
var id=<?php echo $id?>;
var zong=<?php echo $zong;?>;
var s_num=<?php echo $s_num;?>;
var s_time=<?php echo $s_time;?>;
var zong_page=<?php echo ceil($zong/$s_num);?>

function send(id,page){
	i=0;
	if (page==1){
		if (zong<s_num){
			dang=zong;
		}else{
			dang=page*s_num;
		}
		document.getElementById('dang').innerHTML=dang;
		document.getElementById('zong').innerHTML=zong;
		document.getElementById('yi').innerHTML=(page-1)*s_num;
		document.getElementById('note').style.display='';
		document.getElementById('iframe_1').src='send_email_post.php?id='+id+'&page='+page+'';
	}else if(page<=zong_page){
		document.getElementById('zong').innerHTML=zong;
		document.getElementById('yi').innerHTML=(page-1)*s_num;
		timer1=window.setInterval("update("+id+","+page+")",1000);
	}else if(page>zong_page){
		document.getElementById('zong').innerHTML=zong;
		document.getElementById('yi').innerHTML=(page-1)*s_num;
		document.getElementById('note').style.display='';
		document.getElementById('note').innerHTML='邮件发送完成,<a href="default.php">返回列表</a>';
	}
}

function update(id,page){
	if (i<s_time){
		document.getElementById('note').style.display='none';
		document.getElementById('next').style.display='';
		document.getElementById('sec').innerHTML = s_time-i;
		i++;
	}else{
		clearInterval(timer1);
		if (page*s_num<=zong){
			dang=s_num;
		}else{
			dang=zong-(page-1)*s_num;
		}
		document.getElementById('dang').innerHTML=dang;
		document.getElementById('zong').innerHTML=zong;
		document.getElementById('yi').innerHTML=(page-1)*s_num;
		document.getElementById('note').style.display='';
		document.getElementById('next').style.display='none';
		document.getElementById('iframe_1').src='send_email_post.php?id='+id+'&page='+page+'';
	}
}
send(id,1);
</script>
</body>
</html>

