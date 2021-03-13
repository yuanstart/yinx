<?php
require('../../include/common.inc.php');
checklogin();
$conf=read_config('config','../');
checkaction($conf['sy']['pre'].'_yp_view');

$keyword=isset($_GET['keyword'])?html($_GET['keyword']):'';
$p_url=isset($_GET['p_url'])?$_GET['p_url']:'';

$sq='';
//如果有关键字
if ($keyword!=''){
	$sq.=' and ( job_title like "%'.$keyword.'%" or username like "%'.$keyword.'%")';
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
<DIV id=popImageLayer style="VISIBILITY: hidden; WIDTH: 267px; CURSOR: hand; POSITION: absolute; HEIGHT: 260px; background-image:url(../images/bbg.gif); z-index: 100;" align=center  name="popImageLayer"  ></DIV>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">应聘简历管理</td>
  </tr>
</table>
<br />
<form id="sform" name="sform" method="get" action="yp_default.php">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="tdbg3">
    <td width="70" align="right"><strong>简历搜索：</strong></td>
    <td>
        <table border="0" cellspacing="0" cellpadding="0" style="float:left;">
          <tr>
            <td><input name="keyword" type="text" id="keyword" size="15" maxlength="50"  value="<?php echo $keyword?>" />&nbsp;</td>
            <td><input type="submit" name="button" id="button" value="搜索" class="btn "/></td>
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
<form id="form1" name="form1" action="yp_make.php" method="post" >
<input name="ac" id="ac" type="hidden" value="del"/>
<input name="p_url" id="p_url" type="hidden" value="<?php echo $p_url;?>"/>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border listtable">
  <tr class="title">
    <td width="48" align="center">排序</td>
    <td width="40" align="center">ID</td>
    <td>应聘简历</td>
    <td width="150" align="center">应聘时间</td>
    <td width="70" align="center">状态</td>
    <td width="200" align="center" >管理</td>
  </tr>
<?php
$sql='select `id`,`job_title`,`username`,`chakan`,`wtime` from '.table($conf['sy']['table_yp']).' where 1=1 '.$sq.' order by `id` desc';
$p=new page(array('method'=>'php','pagesize'=>25));
$rss=$p->getrss($db,$sql);
foreach($rss as $row){
?>
    <tr class="tdbg">
        <td align="center"><input name="id[]" type="checkbox" id="id[]" value="<?php echo $row['id']?>"/></td>
        <td align="center"><?php echo $row['id']?></td>
        <td>
		<?php 
		echo '<b>[</b>'.$row['job_title'].'<b>]</b>'.$row['username'];
		?>
        </td>
        <td align="center"><?php echo date('Y-m-d H:i:s',$row['wtime'])?></td>
        <td align="center">
		<?php
        $zt='';
		$zt.=($row['chakan']==1)?'<span class="hui">已看</span>':'<span class="blue">未看</span>';
		echo $zt;
		?>
        </td>
        <td align="center">
        <a href="yp_show.php?id=<?php echo $row['id']?>&p_url=<?php echo $p_url;?>">查看</a> | <a href="yp_make.php?id=<?php echo $row['id']?>&ac=del&p_url=<?php echo $p_url;?>" onClick="return confirm('确定要删除该数据吗?')">删除</a>
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
