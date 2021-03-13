<?php
require('../../../include/common.inc.php');
require('pl_config.php');
$cong=load_config('setup');//加载整站配置文件
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
<style>
html{overflow-x:hidden;}
body{margin:0px; padding:0px;overflow-x:hidden;}

.filelist{ width:600px;}
.filelist li{width:80px;float:left; margin:3px 6px 0 6px; padding:0px; list-style:none;position:relative; display:inline;}
.filelist b{ display:block;height:5px; overflow:hidden;}
.filelist .del_btn{ width:8px; height:8px; overflow:hidden;background:url(../../../include/plupload/del.png);position:absolute; top:8px; right:1px; cursor:pointer; }
.filelist p{ margin:2px 0 0 0; padding:1px; border:1px solid #ccc; background-color:#fff; display:block;}
.filelist p img{ width:76px; height:76px;}
.inputclass { width:45px; height:15px; line-height:15px; margin-top:1px; padding:1px;}
</style>
<script>
function submit_pl(form,pl_id,act){
	var formu=document.getElementById(form);
	if (act=='edit'){
		formu.action='pl_img_make.php?act=edit&pl_id='+pl_id;
		formu.submit();
	}else if(act=='pass1'){
		formu.action='pl_img_make.php?act=pass1&pl_id='+pl_id;
		formu.submit();
	}else if(act=='pass2'){
		formu.action='pl_img_make.php?act=pass2&pl_id='+pl_id;
		formu.submit();
	}else if(act=='del'){
		formu.action='pl_img_make.php?act=del&pl_id='+pl_id;
		formu.submit();
	}
}
</script>
</head>

<body>
<div style="margin:5px 0 0 0px;">
<input type="button" name="Submit1" value="添加分组" class="btn" onclick="parent.tanchuchuang('pl_zu_tool/pl_add.php?pl_id=<?php echo $pl_id?>',520,170);"> 
</div>
<?php
//把图片列出来
if (($pl_id!=''&&checknum($pl_id))||(isset($_SESSION[$conf['pl']['sesname']])&&$_SESSION[$conf['pl']['sesname']]!=''&&checknum($_SESSION[$conf['pl']['sesname']]))){
	if ($pl_id!=''){
		$sql='select id,pl_id,title,img_sl,px,pass from '.table($conf['pl']['table']).' where fid=0 and pl_id='.$pl_id.' and sy_id='.$conf['pl']['sy_id'].' order by px desc,id asc';
	}else{
		$sql='select id,pl_id,title,img_sl,px,pass from '.table($conf['pl']['table']).' where fid=0 and pl_id='.$_SESSION[$conf['pl']['sesname']].' and sy_id='.$conf['pl']['sy_id'].' order by px desc,id asc';
	}
	$rss=$db->getrss($sql);
	if ($rss){
?>

	<?php
        $a=1;
        foreach($rss as $row){
    ?>
        <div style="margin-top:10px; padding:4px 4px 4px 0; border:1px dotted #FF0000;">
        <form id="form_<?php echo $row['id']?>" name="form_<?php echo $row['id']?>" action="pl_make.php?act=edit&pl_id=<?php echo $pl_id?>" method="post" >
        <table border="0" cellspacing="1" cellpadding="2" style="margin-left:4px;">
          <tr>
          	<td width="20" align="left"><?php echo $row['px'];?></td>
            <td><a href="../../../<?php echo $row['img_sl'];?>"  target=_blank><img width="30" height="30" src="../../../<?php echo $row['img_sl'];?>" border="0"/></a></td>
            <td ><?php echo $row['title'];?></td>
            <td align="center">
            <input type="button" class="btn" value="修改" onclick="parent.tanchuchuang('pl_zu_tool/pl_edit.php?id=<?php echo $row['id']?>&pl_id=<?php echo $row['pl_id']?>',520,170);">&nbsp;<?php 
		if ($row['pass']==1){
		?><input name="32" type="button" value="停用" onclick="location='pl_make.php?act=pass2&id=<?php echo $row['id']?>&pl_id=<?php echo $pl_id?>'"  class="btn"  />&nbsp;<?php 
		}else{
		?><input name="32" type="button" value="启用" onclick="location='pl_make.php?act=pass1&id=<?php echo $row['id']?>&pl_id=<?php echo $pl_id?>'"  class="btnn"  />&nbsp;<?php
        }
		?><input type="button" class="btn" value="删除"  onclick="if (confirm('确定要删除该分组吗?\n\n该分组下的所有图片将被删除！')){location='pl_make.php?id=<?php echo $row['id']?>&pl_id=<?php echo $row['pl_id']?>&act=del'}" >
            </td>
          </tr>
        </table>
        </form>
        <FORM name="formu_<?php echo $row['id']?>" id="formu_<?php echo $row['id']?>" method="post" action="" style="border:1px dotted #ccc; margin-left:4px;">
		<?php
        $sql='select * from '.table($conf['pl']['table']).' where fid='.$row['id'].' and pl_id='.$row['pl_id'].' and sy_id='.$conf['pl']['sy_id'].' order by px desc,id asc';
        $rows=$db->getrss($sql);
        if ($rows){
        ?>
            
            <table border="0" cellspacing="0" cellpadding="0" style="margin-top:4px; margin-left:4px; ">
              <tr>
                <?php
                $a=1;
                foreach($rows as $rs){
                ?>
                <td width="92" style="padding-bottom:4px;">
                <table  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="80" colspan="2" align="center" valign="middle" style="border:1px solid #e4e4e4"><img src="../../../<?php echo $rs['img_sl']?>" border="0" width="78" height="78" /></td>
                    </tr>
					<?php 
                    if ($conf['pl']['title']==true){
                      foreach ($cong['mlang'] as $k=>$v){
                    ?>
                    <tr>
                        <td height="23" align="center">标题</td>
                        <td align="center"><input name="title<?php echo $v['lang']?>[<?php echo $rs['id']?>]" type="text" class="inputclass" value="<?php echo $rs['title'.$v['lang']]?>" /></td>
                    </tr>
                    <?php
                        if ($conf['pl']['mlang']!=true){
                            break;
                        }
                      }
                    }
                    ?>
                <tr <?php if ($conf['pl']['px']==false){echo ' style="display:none;"';}?>>
                    <td align="center" height="23">排序</td>
                    <td align="center"><input name="px[<?php echo $rs['id']?>]" type="text" class="inputclass" value="<?php echo $rs['px']?>" /></td>
                </tr>
                  <tr>
                    <td height="23" colspan="2" align="center"><input name="12" type="button" value="重" onclick="location='pl_img_edit.php?id=<?php echo $rs['id']?>&pl_id=<?php echo $row['pl_id'];?>'" class="btn" style="width:22px;padding:0px 0px; overflow:hidden;" />&nbsp;<?php 
		if ($rs['pass']==1){
		?><input name="32" type="button" value="停" onclick="location='pl_img_make.php?act=pass2&id=<?php echo $rs['id']?>&pl_id=<?php echo $pl_id?>'"  class="btn" style="width:22px;padding:0px 0px; overflow:hidden;" />&nbsp;<?php 
		}else{
		?><input name="32" type="button" value="启" onclick="location='pl_img_make.php?act=pass1&id=<?php echo $rs['id']?>&pl_id=<?php echo $pl_id?>'"  class="btnn" style="width:22px;padding:0px 0px; overflow:hidden;" />&nbsp;<?php
        }
		?><input name="32" type="button" value="删" onclick="location='pl_img_make.php?act=del&id=<?php echo $rs['id']?>&pl_id=<?php echo $row['pl_id'];?>'"  class="btn" style="width:22px;padding:0px 5px; overflow:hidden;" /><input name="id[<?php echo $rs['id']?>]" type="hidden" class="inputclass" value="<?php echo $rs['id']?>"></td>
                    </tr>
                </table>
                </td>
                <?php
                    if($a%7==0){
                        echo'</tr><tr>';
                    }
                    $a++;
                }
                ?>
              </tr>
            </table>

        <?php
         }
        ?>  
        	<table border="0" cellspacing="0" cellpadding="0" style="margin:4px 0 4px 2px;">
              <tr>
				<td><input type="button" class="btn" value="批量上传" onclick="parent.tanchuchuang('pl_zu_tool/pl_img_add.php?pl_id=<?php echo $row['pl_id']?>&zu_id=<?php echo $row['id']?>',670,390);">&nbsp;</td>
                <?php
				if ($rows){
					//如果图片标题和图片排序都隐藏的话，批量更新的按钮也隐藏
					if (!($conf['pl']['title']==false&&$conf['pl']['px']==false)){
					?>
					<td><input type="button" name="button2" value="批量修改" class="btn" onclick="submit_pl('formu_<?php echo $row['id']?>','<?php echo $row['pl_id'];?>','edit')" />&nbsp;</td>
					<?php
					}
					?>
                    <td><input type="button" name="button3" value="批量启用" class="btn" onclick="submit_pl('formu_<?php echo $row['id']?>','<?php echo $row['pl_id'];?>','pass1')"  />&nbsp;</td>
                    <td><input type="button" name="button4" value="批量停用" class="btn" onclick="submit_pl('formu_<?php echo $row['id']?>','<?php echo $row['pl_id'];?>','pass2')"  />&nbsp;</td>
					<td><input type="button" name="button2" value="批量删除" class="btn" onclick="if (confirm('确定要删除该数据吗?')){submit_pl('formu_<?php echo $row['id']?>','<?php echo $row['pl_id'];?>','del')}"  />&nbsp;</td>
                <?php
                }
				?>
              </tr>
            </table>
        </FORM>
    </div>
<?php
		$a++;
		}
	}
}
?>
</body>
</html>