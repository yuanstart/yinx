<?php
require('../../include/common.inc.php');
checklogin();
$conf=read_config('config');
checkaction($conf['sy']['pre'].'_view');

$zt_val=isset($_GET['zt_val'])?$_GET['zt_val']:'';
$keyword=isset($_GET['keyword'])?html($_GET['keyword']):'';

$sq='';
//如果有状态
if($zt_val!=''){
	if ($zt_val=='chakan1'){
		$sq.=' and chakan=1';
	}elseif($zt_val=='chakan2'){
		$sq.=' and chakan=0';
	}elseif($zt_val=='huifu1'){
		$sq.=' and huifu=1';
	}elseif($zt_val=='huifu2'){
		$sq.=' and huifu=0';
	}elseif($zt_val=='pass1'){
		$sq.=' and pass=1';
	}elseif($zt_val=='pass2'){
		$sq.=' and pass=0';
	}
}

//如果有关键字
if ($keyword!=''){
	$sq.=' and (title like "%'.$keyword.'%" or rename like "%'.$keyword.'%" or phone like "%'.$keyword.'%" or qq like "%'.$keyword.'%" or compname like "%'.$keyword.'%")';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理首页</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/function.js"></script>
</head>

<body>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">管理首页</td>
  </tr>
</table>
<br />
<form id="sform" name="sform" method="get" action="default.php">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="tdbg3">
    <td width="70" align="right"><strong><?php echo $conf['sy']['name']?>搜索：</strong></td>
    <td>
        <table border="0" cellspacing="0" cellpadding="0">
          <tr>
<td>
                <select name="zt_val" id="zt_val"  onchange="gt('sform').submit()">
                    <option value="">所有状态</option>

                    <option value="chakan1">已看</option>
                    <option value="chakan2">未看</option>
                    <?php
                    if ($conf['sy']['huifu']==true){
					?>
                    <option value="huifu1">已回</option>
                    <option value="huifu2">未回</option>
                    <?php
                    }
					?>
                    <?php
                    if ($conf['sy']['huifu']==true){
					?>
                    <option value="pass1">显示</option>
                    <option value="pass2">隐藏</option>
                    <?php
                    }
					?>
                </select>&nbsp;
				 <script language="javascript">
					gt("zt_val").value="<?php echo $zt_val?>";
                 </script>
            </td>
            <td><input name="keyword" type="text" id="keyword" size="15" maxlength="50"  value="<?php echo $keyword?>" />&nbsp;</td>
            <td><input type="submit" name="button" id="button" value="搜索" class="btn "/></td>
          </tr>
        </table>
    </td>
  </tr>
</table>
</form>
<br />
<form name="form1" id="form1" action="make.php" method="post" >
<input name="ac" id="ac" type="hidden" value="del"/>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="title">
    <td width="40" align="center">选中</td>
    <td width="40" align="center">ID</td>
    <?php
    if ($conf['co']['title']==true){
		echo '<td>标题</td>';
	}
	?>
    <?php
    if ($conf['co']['rename']==true){
		echo '<td>姓名</td>';
	}
	?>
    <td width="160" align="center">时间</td>
    <td width="120" align="center">状态</td>
    <td width="200" align="center" ><strong>管理操作</strong></td>
  </tr>
<?php
//开始读留言
$sql='select `id`,`title`,`rename`,`chakan`,`wtime`,`huifu`,`pass` from '.table($conf['sy']['table_co']).'  where id_re=0 '.$sq.' order by `id` desc';
$p=new page(array('method'=>'php','pagesize'=>25));
$rss=$p->getrss($db,$sql);
foreach($rss as $row){
?>
    <tr class="tdbg">
        <td align="center"><input name="id[]" type="checkbox" id="id[]" value="<?php echo $row['id']?>"/></td>
        <td align="center"><?php echo $row['id']?></td>
		<?php
        if ($conf['co']['title']==true){
            echo '<td>'.$row['title'].'</td>';
        }
        ?>
        <?php
        if ($conf['co']['rename']==true){
            echo '<td>'.$row['rename'].'</td>';
        }
        ?>
        <td  align="center"><?php echo date('Y-m-d H:i:s',$row['wtime'])?></td>
        <td align="center">
		<?php 
		$zt=($row['chakan']==1)?'<span class="hui">已看 </span>&nbsp;':'<span class="blue">未看 </span>&nbsp;';
		$zt.=($conf['sy']['huifu']==true)?(($row['huifu']==1)?'<span class="hui">已回 </span>&nbsp;':'<span class="blue">未回 </span>&nbsp;'):'';
		$zt.=($conf['sy']['huifu']==true)?(($row['pass']==1)?'<span class="hui">显示</span>':'<span class="green">隐藏</span>'):'';
		echo $zt;
		?>
        </td>
        <td align="center">
        <a href="show.php?id=<?php echo $row['id']?>" >查看</a> | 
        <?php
		if ($conf['sy']['huifu']==true){
			if ($row['pass']==1){
				echo'<a href="make.php?id='.$row['id'].'&ac=ping2">隐藏</a> | ';
			}else{
				echo'<a href="make.php?id='.$row['id'].'&ac=ping1">显示</a> | ';
			}
		}
		?>
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
