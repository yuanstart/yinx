<?php
require('../../include/common.inc.php');
checklogin();
checkaction('code_cx_view');

$s_wtime=isset($_GET['s_wtime'])?html($_GET['s_wtime']):'';
$e_wtime=isset($_GET['e_wtime'])?html($_GET['e_wtime']):'';
$keyword=isset($_GET['keyword'])?html($_GET['keyword']):'';
$p_url=isset($_GET['p_url'])?$_GET['p_url']:'';
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
	$sq.=' and (ctime>='.strtotime($s_wtime).' and ctime<='.(strtotime($e_wtime)+60*60*24).')';
}elseif($s_wtime!=''){
	$sq.=' and (ctime>='.strtotime($s_wtime).' )';
}elseif($e_wtime!=''){
	$sq.=' and (ctime<='.(strtotime($e_wtime)+60*60*24).' )';
}
//如果有关键字
if ($keyword!=''){
	$sq.=' and (fcode like "%'.$keyword.'%" or `cip` like "%'.$keyword.'%")';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看查询日志</title>
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
    <td>查看查询日志</td>
  </tr>
</table>
<br />
<form id="sform" name="sform" method="get" action="default_cx.php">
<input type="hidden" name="p_url" value="<?php echo $p_url;?>" />
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="tdbg3">
    <td width="70" align="right"><strong>信息检索：</strong></td>
    <td>
        <table border="0" cellspacing="0" cellpadding="0" style="float:left;">
          <tr>
            <td align="right">从</td>
            <td><input name="s_wtime" type="text" id="s_wtime" size="10" maxlength="50"  onclick="return Calendar('s_wtime');" value="<?php echo $s_wtime?>" />
            到&nbsp;<input name="e_wtime" type="text" id="e_wtime" size="10" maxlength="50"  onclick="return Calendar('e_wtime');" value="<?php echo $e_wtime?>"/>&nbsp;</td>
            <td><input name="keyword" type="text" id="keyword" size="15" maxlength="50"  value="<?php echo $keyword?>" />&nbsp;</td>
            <td><input type="submit" name="button" id="button" value="检索" class="btn "/></td>
          </tr>
        </table>
        <?php
        if ($p_url!=''){
		?>
            <input type="button" value="返回列表" onclick="location='<?php echo $p_url?>'"  class="btn" style="float:right" />
        <?php
        }
		?>
    </td>
  </tr>
</table>
</form>
<br />
<form id="form1" name="form1" action="make.php" method="post" >
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border listtable">
  <tr class="title">
    <td align="center" width="150">时间</td>
    <td align="center" width="120">IP</td>
    <td align="center" width="200">防伪码</td>
    <td align="left" style="padding-left:5px;">操作</td>
  </tr>
<?php
$sql='select * from '.table('code_cx').' where 1=1 '.$sq.' order by `id` desc';
$p=new page(array('method'=>'php','pagesize'=>25));
$rows=$p->getrss($db,$sql);
foreach($rows as $row){
?>
    <tr class="tdbg">
    	<td align="center"><?php echo date('Y-m-d H:i:s',$row['ctime'])?></td>
        <td align="center"><?php echo $row['cip']?></td>
        <td align="center"><?php echo $row['fcode']?></td>
        <td align="left" style="padding-left:5px;"><?php echo $row['result']?></td>
    </tr>
<?php
}
?>
</table>
<br />
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
