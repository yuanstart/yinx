<?php
require('../../include/common.inc.php');
checklogin();
checkaction('key_view');

$zt_val=isset($_GET['zt_val'])?$_GET['zt_val']:'';
$keyword=isset($_GET['keyword'])?html($_GET['keyword']):'';

$sq='';
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
	$sq.=' and (title like "%'.$keyword.'%")';
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
    <td  colspan="2">关键词管理</td>
  </tr>
  <tr class="tdbg">
    <td width="70" height="26" align="right"><strong>管理导航：</strong></td>
    <td><a href="default.php">管理首页</a>&nbsp;|&nbsp;<a href="add.php">添加关键词</a></td>
  </tr>
</table>
<br />
<form id="sform" name="sform" method="get" action="default.php">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="tdbg3">
    <td width="70" align="right"><strong>信息检索：</strong></td>
    <td>
        <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>
                <select name="zt_val" id="zt_val" onchange="gt('sform').submit()">
                    <option value="">所有状态</option>
                    <option value="pass2">已屏蔽</option>
                    <option value="pass1">未屏蔽</option>
                </select>&nbsp;
				 <script language="javascript">
					gt("zt_val").value="<?php echo $zt_val?>";
                 </script>
            </td>
            <td><input name="keyword" type="text" id="keyword" size="15" maxlength="50"  value="<?php echo $keyword?>" />&nbsp;</td>
            <td><input type="submit" name="button" id="button" value="检索" class="btn "/></td>
          </tr>
        </table>
    </td>
  </tr>
</table>
</form>
<br />
<form id="form1" name="form1" action="make.php" method="post" >
<input name="ac" id="ac" type="hidden" value="del"/>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border listtable">
  <tr class="title">
    <td width="40" align="center">选中</td>
    <td  align="left">关键词</td>
    <td width="70" align="center">状态</td>
    <td width="150" align="center">管理操作</td>
  </tr>
<?php
$sql='select * from '.table('key_co').' where 1=1 '.$sq.' order by `id` desc';
$p=new page(array('method'=>'php','pagesize'=>25));
$rows=$p->getrss($db,$sql);
foreach($rows as $row){
?>
    <tr class="tdbg">
        <td align="center"><input name="id[]" type="checkbox" id="id[]" value="<?php echo $row['id']?>"/></td>
        <td align="left"><?php echo $row['title']?></td>
		<td align="center">
        <table align="center"><tr><td>
        <?php 
		echo ($row['pass']==1)?'<a class="icon b" href="make.php?id='.$row["id"].'&ac=pass2" title="点击屏蔽"></a>':'<a class="icon bn" href="make.php?id='.$row["id"].'&ac=pass1" title="点击取消屏蔽"></a>';
		?>
        </td></tr></table>
        </td>
        <td align="center">
        <a href="edit.php?id=<?php echo $row['id']?>">修改</a> | 
        <a href="make.php?id=<?php echo $row['id']?>&ac=del"  onClick="return confirm('确定要删除该数据吗?')">删除</a>
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
