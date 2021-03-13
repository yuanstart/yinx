<?php
require('../../include/common.inc.php');
checklogin();
checkaction('code_pc_view');

$keyword=isset($_GET['keyword'])?html($_GET['keyword']):'';
$sq='';
//如果有关键字
if ($keyword!=''){
	$sq.=' and pno like "%'.$keyword.'%"';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>批次管理</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/function.js"></script>
</head>

<body>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td>批次管理</td>
  </tr>
</table>
<br />
<form id="sform" name="sform" method="get" action="pc_default.php">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="tdbg3">
    <td width="40" align="right"><strong>检索：</strong></td>
    <td>
        <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><input name="keyword" type="text" id="keyword" size="25" maxlength="50"  value="<?php echo $keyword?>" />&nbsp;</td>
            <td><input type="submit" name="button" id="button" value="检索" class="btn "/></td>
          </tr>
        </table>
    </td>
  </tr>
</table>
</form>
<br />
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="title">
    <td width="200">导入批次</td>
    <td width="200" align="center">导入时间</td>
    <td width="220" align="center">管理操作</td>
    <td >&nbsp;</td>
  </tr>
<?php
$sql='select * from '.table('code_pc').' where 1=1 '.$sq.' order by `id` desc';
$p=new page(array('method'=>'php','pagesize'=>50));
$rss=$p->getrss($db,$sql);
foreach($rss as $row){
?>
    <tr class="tdbg">
        <td><?php echo $row['pno']?></td>
        <td align="center"><?php echo date('Y-m-d H:i:s',$row['wtime'])?></td>
        <td align="center">
        <a href="default.php?keyword=<?php echo urlencode($row['pno'])?>">查看数据</a>
         | <a href="pc_make.php?pno=<?php echo $row['pno']?>&ac=del"  onClick="return confirm('确定要删除吗?\n\n该操作只会删除这条记录，不删除已导入的数据')">删除批次</a>
         | <a href="pc_make.php?pno=<?php echo $row['pno']?>&ac=dell"  onClick="return confirm('确定要删除吗?\n\n该操作把这条记录和已导入的数据全部删除')">删除数据</a>
         </td>
        <td >&nbsp;</td>
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
</body>
</html>
