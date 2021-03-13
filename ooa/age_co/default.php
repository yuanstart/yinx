<?php
require('../../include/common.inc.php');
checklogin();
$conf=read_config('config','../');
checkaction($conf['sy']['pre'].'_co_view');

$lm=isset($_GET['lm'])?html($_GET['lm']):'';
$zt_val=isset($_GET['zt_val'])?html($_GET['zt_val']):'';
$keyword=isset($_GET['keyword'])?html($_GET['keyword']):'';


$sq='';
//如果有分类
if($lm!=''){
	$sq.=' and lm="'.$lm.'"';
}
//如果有状态
if($zt_val!=''){
	if($zt_val=='pass1'){
		$sq.=' and pass=1';
	}elseif($zt_val=='pass2'){
		$sq.=' and pass=0';
	}
}
//如果有关键字
if ($keyword!=''){
	$sq.=' and title like "%'.$keyword.'%"';
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
    <td colspan="2">管理首页</td>
  </tr>
  <tr class="tdbg">
    <td width="70" height="26" align="right"><strong>管理导航：</strong></td>
    <td><a href="default.php">管理首页</a>&nbsp;|&nbsp;<a href="add.php">添加<?php echo $conf['sy']['name'];?></a></td>
  </tr>
</table>
<br />
<form id="sform" name="sform" method="get" action="default.php">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="tdbg3">
    <td width="70" align="right"><strong>分类检索：</strong></td>
    <td>
        <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td <?php if ($conf['sy']['need_lm']==false){echo ' style="display:none;"';}?>>
                <select name="lm" id="lm" onchange="gt('sform').submit()">
                	<option value="" selected>所有分类</option>
					<?php
                    $rss=$db->getrss('select * from '.table($conf['sy']['table_lm']).' order by `px` desc,`id_lm` asc');
                    foreach($rss as $rs){
						echo'<option value="'.$rs["title_lm"].'">'.$rs["title_lm"].'</option>'."\n";
                    }
                    ?>
                </select>&nbsp;
				 <script language="javascript">
					gt("lm").value="<?php echo $lm?>";
                 </script>
            </td>
            <td>
                <select name="zt_val" id="zt_val" onchange="gt('sform').submit()">
                    <option value="">所有状态</option>
                    <?php
                    if ($conf['co']['pass']==true){
					?>
                    <option value="pass2">已屏蔽</option>
                    <option value="pass1">未屏蔽</option>
                    <?php
                    }
					?>
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
<input name="ac" id="ac" type="hidden" value="px"/>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border listtable">
  <tr class="title">
    <td width="48" align="center">选中</td>
    <td width="40" align="center">排序</td>
    <td width="40" align="center">ID</td>
    <td >标题</td>
    <td width="77"  align="center">查询量</td>
    <td width="90" align="center">状态</td>
    <td width="120" align="center">管理操作</td>
  </tr>
<?php
$sql='select `id`,`lm`,`title`,`img_sl`,`pic_sl`,`pass`,`read_num`,`px` from '.table($conf['sy']['table_co']).'  where 1=1 '.$sq.' order by `px` desc,`id` desc';
$p=new page(array('method'=>'php','pagesize'=>25));
$rss=$p->getrss($db,$sql);
foreach($rss as $row){
		if ($row['img_sl']!=''){
			$img_sl=$row['img_sl'];
		}elseif($row['pic_sl']!=''){
			$img_sl=$row['pic_sl'];
		}else{
			$img_sl='';
		}
?>
    <tr class="tdbg">
        <td align="center"><input name="id[]" type="checkbox" id="id[]" value="<?php echo $row['id']?>" /></td>
        <td align="center"><input name="px[<?php echo $row['id']?>]" type="text" id="px[<?php echo $row['id']?>]" value="<?php echo $row['px']?>" class="num"/></td>
        <td align="center"><?php echo $row['id']?></td>
        <td>
		<?php 
		echo ($conf['sy']['need_lm']==true)?'<b>[</b>'.$row['lm'].'<b>]</b>':'';

		echo '<a href="edit.php?id='.$row['id'].'" >'.$row['title'].'</a>'.(($img_sl!='')?'<a href="../../'.$img_sl.'"  target=_blank><img src="../images/img.gif" border="0" onmouseover="popImage(this,\'../../'.$img_sl.'\');" onmouseout="hideLayer();"/></a>':'');
		?>
        </td>
        <td align="center"><?php echo $row['read_num']?></td>
        <td><table align="center"><tr><td><?php echo ($row['pass']==1)?'<a class="icon b" href="make.php?id='.$row["id"].'&ac=pass2" title="点击成为屏蔽"></a>':'<a class="icon bn" href="make.php?id='.$row["id"].'&ac=pass1" title="点击取消屏蔽"></a>';?></td></tr></table></td>
        <td align="center">
        <a href="edit.php?id=<?php echo $row['id']?>">修改</a>
	  | <a href="make.php?id=<?php echo $row['id']?>&ac=del"  onClick="return confirm(\'确定要删除该数据吗?\')" >删除</a>
        </td>
    </tr>
<?php
}
?>
</table>
<p class="p">
<a href="javascript:CheckAll('form1');">全选</a>/<a href="javascript:CheckOthers('form1');">反选</a>&nbsp;<input name="" type="submit"  class="btn" value="排序" />&nbsp;<input name="" type="button"  class="btn" value="删除选中" onclick="act('form1','del');"/>
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
