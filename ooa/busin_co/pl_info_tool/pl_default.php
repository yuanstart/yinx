<?php
require('../../../include/common.inc.php');
require('pl_config.php');
checklogin();

//获取哪条信息id需要多图，添加信息时是没有id系统自动生成一个临时id用session来保存，等信息添加后，再用信息的id来替换session保存的临时id
$pl_id=isset($_GET['pl_id'])?$_GET['pl_id']:'';
if ($pl_id!=''&&!checknum($pl_id)){
	msg('参数错误');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多图上传</title>
<link href="../../css/admin_style.css" rel="stylesheet" />
</head>

<body>
<div style="margin:5px 0 0 0px;">
<input type="button" name="Submit1" value="添加信息" class="btn" onclick="parent.tanchuchuang('pl_info_tool/pl_add.php?pl_id=<?php echo $pl_id?>',820,490);"> 
</div>
<?php
//把图片列出来
if (($pl_id!=''&&checknum($pl_id))||(isset($_SESSION[$conf['pl']['sesname']])&&$_SESSION[$conf['pl']['sesname']]!=''&&checknum($_SESSION[$conf['pl']['sesname']]))){
	if ($pl_id!=''){
		$sql='select id,pl_id,title,img_sl,px,wtime,read_num,pass from '.table($conf['pl']['table']).' where pl_id='.$pl_id.' and sy_id='.$conf['pl']['sy_id'].' order by px desc,id asc';
	}else{
		$sql='select id,pl_id,title,img_sl,px,wtime,read_num,pass from '.table($conf['pl']['table']).' where pl_id='.$_SESSION[$conf['pl']['sesname']].' and sy_id='.$conf['pl']['sy_id'].' order by px desc,id asc';
	}
	$rss=$db->getrss($sql);
	if ($rss){
?>
<form id="form1" name="form1" action="pl_make.php?act=px&pl_id=<?php echo $pl_id?>" method="post" >
    <table border="0" width="100%" cellspacing="1" cellpadding="2" style="margin-top:5px;" class="border">
    <tr class="title">
        <td width="40" align="center">排序</td>
        <td width="40" align="center">ID</td>
        <td >标题</td>
        <td width="50"  align="center">点击量</td>
        <td width="30" align="center">状态</td>
        <td width="80" align="center">管理操作</td>
    </tr>
    	<?php
            $a=1;
            foreach($rss as $row){
        ?>
      <tr class="tdbg">
        <td align="center"><input name="px[<?php echo $row['id']?>]" type="text" id="px[<?php echo $row['id']?>]" value="<?php echo $row['px']?>" class="num"/></td>
        <td align="center"><?php echo $row['id']?></td>
        <td>
		<?php 
		echo $row['title'].(($row['img_sl']!='')?'<a href="../../../'.$row['img_sl'].'"  target=_blank><img src="../../images/img.gif" border="0"/></a>':'');
		?>
        </td>
        <td align="center"><?php echo $row['read_num']?></td>
        <td><table align="center"><tr><td><?php echo ($row['pass']==1)?'<a class="icon b" href="pl_make.php?id='.$row["id"].'&pl_id='.$pl_id.'&act=pass2" title="点击成为屏蔽"></a>':'<a class="icon bn" href="pl_make.php?id='.$row["id"].'&pl_id='.$pl_id.'&act=pass1" title="点击取消屏蔽"></a>';?></td></tr></table></td>
        <td align="center">
        <a href="javascript:;" onclick="parent.tanchuchuang('pl_info_tool/pl_edit.php?id=<?php echo $row['id']?>&pl_id=<?php echo $row['pl_id']?>',820,490);">修改</a> | <a href="pl_make.php?id=<?php echo $row['id']?>&pl_id=<?php echo $pl_id?>&act=del"  onClick="return confirm(\'确定要删除该数据吗?\')" >删除</a>
        </td>
      </tr>
        <?php
            $a++;
            }
        ?>
    </table>
    <input name="" type="submit"  class="btn" value="排序" style="margin:5px 0 0 1px;" />
</form>
<?php
	}
}
?>
</body>
</html>