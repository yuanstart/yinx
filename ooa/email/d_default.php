<?php
require('../../include/common.inc.php');
checklogin();
checkaction('email_dy_view');

$s_wtime=isset($_GET['s_wtime'])?html($_GET['s_wtime']):'';
$e_wtime=isset($_GET['e_wtime'])?html($_GET['e_wtime']):'';
$zt_val=isset($_GET['zt_val'])?$_GET['zt_val']:'';
$keyword=isset($_GET['keyword'])?html($_GET['keyword']):'';

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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理首页</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/jquery.js"></script>
<script src="../scripts/function.js"></script>
<script src="../scripts/calendar.js"></script>
<script>
$(document).ready(function(){
	//如果鼠标移到class为msgtable的表格的tr上时，执行函数
	$(".listtable tr").mouseover(function(){  
	//给这行添加class值为over，并且当鼠标移出该行时执行函数
	$(this).addClass("over");}).mouseout(function(){ 
	//移除该行的class
	$(this).removeClass("over");}).click(function(){ 
		$(".listtable tr").removeClass("click");
		$(this).addClass("click");
	})
});
</script>
</head>

<body>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td  colspan="2">邮件订阅管理</td>
  </tr>
  <tr class="tdbg">
    <td width="70" height="26" align="right"><strong>管理导航：</strong></td>
    <td><a href="d_default.php">管理首页</a>&nbsp;|&nbsp;<a href="d_add.php">添加邮箱</a></td>
  </tr>
</table>
<br />
<form id="sform" name="sform" method="get" action="d_default.php">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="tdbg3">
    <td width="70" align="right"><strong>信息检索：</strong></td>
    <td>
        <table border="0" cellspacing="0" cellpadding="0" style="float:left;">
          <tr>
            <td align="right">从</td>
            <td><input name="s_wtime" type="text" id="s_wtime" size="10" maxlength="50" onclick="return Calendar('s_wtime');" value="<?php echo $s_wtime?>"  placeholder="订阅时间" />
            到&nbsp;<input name="e_wtime" type="text" id="e_wtime" size="10" maxlength="50" onclick="return Calendar('e_wtime');" value="<?php echo $e_wtime?>"  placeholder="订阅时间"/>&nbsp;</td>
            <td>
                <select name="zt_val" id="zt_val" onchange="gt('sform').submit()">
                    <option value="">所有状态</option>
                    <option value="pass2">退订</option>
                    <option value="pass1">订阅</option>
                </select>&nbsp;
				 <script language="javascript">
					gt("zt_val").value="<?php echo $zt_val?>";
                 </script>
            </td>
            <td><input name="keyword" type="text" id="keyword" size="15" maxlength="50"  value="<?php echo $keyword?>" />&nbsp;</td>
            <td><input type="submit" name="button" id="button" value="检索" class="btn "/>&nbsp;</td>
          </tr>
        </table>
        <div style="float:right;">
        <input type="button" name="button1" id="button1" value="批量导入" class="btn" onclick="location='d_daoru.php'"/>&nbsp;<input type="button" name="button2" id="button2" value="批量导出" class="btn" onclick="location='d_daochu.php'"/>
        </div>
    </td>
  </tr>
</table>
</form>
<br />
<form id="form1" name="form1" action="d_make.php" method="post" >
<input name="ac" id="ac" type="hidden" value="del"/>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border listtable">
  <tr class="title">
    <td width="40" align="center">选中</td>
    <td align="left">邮箱</td>
    <td width="180" align="center">订阅时间</td>
    <td width="70" align="center">状态</td>
    <td width="150" align="center">管理操作</td>
  </tr>
<?php
$sql='select * from '.table('email_dy').' where 1=1 '.$sq.' order by `id` desc';
$p=new page(array('method'=>'php','pagesize'=>25));
$rows=$p->getrss($db,$sql);
foreach($rows as $row){
?>
    <tr class="tdbg">
        <td align="center"><input name="id[]" type="checkbox" id="id[]" value="<?php echo $row['id']?>"/></td>
        <td align="left"><?php echo $row['email']?></td>
        <td align="center"><?php echo date('Y-m-d H:i:s',$row['wtime'])?></td>
		<td align="center">
        <table align="center"><tr><td>
        <?php 
		echo ($row['pass']==1)?'<a class="icon b" href="d_make.php?id='.$row["id"].'&ac=pass2" title="点击退订"></a>':'<a class="icon bn" href="d_make.php?id='.$row["id"].'&ac=pass1" title="点击订阅"></a>';
		?>
        </td></tr></table>
        </td>
        <td align="center">
        <a href="d_edit.php?id=<?php echo $row['id']?>">修改</a> | 
        <a href="d_make.php?id=<?php echo $row['id']?>&ac=del"  onClick="return confirm('确定要删除该数据吗?')">删除</a>
        </td>
    </tr>
<?php
}
?>
</table>
<p class="p">
<a href="javascript:CheckAll('form1');">全选</a>/<a href="javascript:CheckOthers('form1');">反选</a>&nbsp;<input name="" type="button"  class="btn" value="删除选中" onclick="act('form1','del');"/>
</p>

<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="tdbg3">
    <td align="center">
	<?php
	if ($p->counter>0){
        $p->getpagehou();
	}
    ?>
    </td>
  </tr>
</table>

</form>
</body>
</html>
