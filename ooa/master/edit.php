<?php
require('../../include/common.inc.php');
checklogin();
checkaction('master_view');

$id=isset($_GET['id'])?$_GET['id']:'';
$url=(previous())?previous():'default.php';
if ($id==''||!checknum($id)){
	msg('参数错误！');
}

$row=$db->getrs('select * from '.table('master').' where `id`='.$id.'');
if (!$row){
	msg('该信息不存在或已删除');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改管理员</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/function.js"></script>
<script src="../scripts/jquery.js"></script>
</head>

<body>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">修改管理员</td>
  </tr>
  <tr class="tdbg">
    <td width="70" height="26" align="right"><strong>管理导航：</strong></td>
    <td><a href="default.php">管理首页</a>&nbsp;|&nbsp;<a href="add.php">添加管理员</a></td>
  </tr>
</table>
<br />
<FORM id="form1" name="form1" onSubmit="return checkForm('form1')" action="editt.php" method="post">
<input name="id" type="hidden" id="id" value="<?php echo $id?>"/>
<input name="url" type="hidden" id="url" value="<?php echo $url?>"/>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="title">
    <td colspan="2">&nbsp;</td>
  </tr>
    <tr>
    <td width="120" align="right" class="tdbg">用户名： </td>
    <td  class="tdbg"><?php echo $row['username']?></td>
  </tr>
  <tr>
    <td width="120" align="right" class="tdbg">密&nbsp;&nbsp;&nbsp; 码： </td>
    <td  class="tdbg">
    <input  name="password" type="password" style="width:160px;"  size="25" maxlength="50" canEmpty="Y" checkType="password,4,20" checkStr="密码" /> 为空时不修改密码    </td>
  </tr>
  <tr>
    <td width="120" align="right" class="tdbg">姓&nbsp;&nbsp;&nbsp; 名：  </td>
    <td  class="tdbg">
    <input name="rename" type="text" size="25"  style="width:160px;" maxlength="50" value="<?php echo $row['rename']?>" >    </td> 
  </tr>
    <tr>
    <td width="120" align="right" class="tdbg">分配权限：</td>
    <td class="tdbg">
        <table border="0" cellpadding="2" cellspacing="1" >
        <?php
        //把所有权限放到$rss数组里
        $rss=$db->getrss('select * from '.table('master_menu').' where fid=0 and pass=1 order by `px` asc,`id` asc');
        $rowa=$db->getrss('select * from '.table('master_action').' where pass=1 order by `px` asc,`id` asc');
        foreach($rowa as $rs){
            $rows[$rs['fid']][]=$rs;
        }
        if (!empty($rss)){
            foreach($rss as $v){
        ?>
          <tr class="tdbg">
            <td width="150" valign="top" style="padding-top:5px;">
            <input type="checkbox" class="checkbox yi" name="menu_list[]" rel="aa_<?php echo $v['id']?>" val="<?php echo $v['id']?>" value="<?php echo $v['id'];?>" <?php if ($row['menu_list']=='all'||strpos(','.$row['menu_list'].',',','.$v['id'].',')!==false){ echo 'checked="checked"';}?> /> <strong><?php echo $v['title'];?></strong>
            </td>
            <td width="600" style="padding-top:5px;">
            <ul class="action_list">
            <?php
                if (!empty($rows[$v['id']])){
                    foreach($rows[$v['id']] as $ev){
            ?>
                    <li><input type="checkbox" class="checkbox er" name="action_list[]"  rel="a_<?php echo $v['id']?>"  val="<?php echo $v['id']?>" value="<?php echo $ev['title_val'];?>"<?php if ($row['action_list']=='all'||strpos(','.$row['action_list'].',',','.$ev['title_val'].',')!==false){ echo 'checked="checked"';}?> /> <?php echo $ev['title'];?></li>
            <?php
                    }
                }
            ?>
            </ul>
            </td>
          </tr>
      <?php
            }
        }
      ?> 
        </table>
    </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="1" cellpadding="2" style="margin-top:3px;">
  <tr>
    <td width="120">&nbsp;</td>
    <td><input type="submit" name="Submit" value="保 存" class="btn"> &nbsp; &nbsp; &nbsp;<input name="Cancel" type="button" id="Cancel" value="取 消" onClick="location.href='default.php';" class="btn"></td>
  </tr>
</table>
</FORM>
<script>
$(".yi").click(function(){
	var fobj=$(this).is(':checked')
	str="a_"+$(this).attr('val');
	$('input[rel='+str+']').each(function(){
		$(this).prop("checked",fobj);
	});
})

$(".er").click(function(){
	fobj=false;
	str2="a_"+$(this).attr('val');
	$('input[rel='+str2+']').each(function(){
		if($(this).is(':checked')){
			fobj=true;
		}
	});
	str1="aa_"+$(this).attr('val');
	$('input[rel='+str1+']').prop("checked",fobj);
})
</script>
</body>
</html>
