<?php
require('../../include/common.inc.php');

checklogin();

$id=isset($_GET['id'])?$_GET['id']:'';
$act=isset($_GET['act'])?$_GET['act']:'';

if ($id==''||!checknum($id)||$act==''){
	msg('参数错误');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>复制导航</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/function.js"></script>
<SCRIPT language="JavaScript" type="text/JavaScript">
function check(){
	if(gt('title').value==''){
		alert('导航名称不能为空');
		gt('title').focus();
		return false;
	}
	if(gt('px').value==''){
		alert('导航的显示顺序不能为空');
		gt('px').focus();
		return false;
	}
}
</SCRIPT>
</head>

<body>
<?php
$nav=2;
require('menu.php');
?>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">添加导航</td>
  </tr>
  <tr class="tdbg">
    <td width="70" height="26" align="right"><strong>管理导航：</strong></td>
    <td><a href="m_default.php">管理首页</a>&nbsp;|&nbsp;<a href="m_add.php">添加导航</a></td>
  </tr>
</table>
<?php
if ($act==1){
?>   
	<?php
    $row=$db->getrs('select * from '.table('master_menu').' where id='.$id.'');
	if ($row){
	?>
    <br />
    <FORM name="form1" method="post" action="m_copyy.php" onSubmit="return check()">
    <input type="hidden" name="act" value="<?php echo $act?>" />
    <div id="tits" class="subnav">
    <ul></ul>
    </div>
    <table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
      <tr class="tdbg">
        <td width="120" align="right">上级导航：</td>
        <td><INPUT name="ftitle" type="text" id="ftitle" size="30" maxlength="100" value="<?php echo $row['title']?>"></td>
      </tr>
      <tr class="tdbg">
        <td width="120" align="right">导航状态：</td>
        <td>
        <input name="fpass" type="radio" class="radio" id="fpass" value="1" <?php if ($row['pass']==1){echo' checked="checked"';}?>>
        启用
        <input name="fpass" type="radio" class="radio" id="fpass" value="0" <?php if ($row['pass']==0){echo' checked="checked"';}?>>			
        停用
        </td>
      </tr>
      <tr class="tdbg">
        <td width="120" align="right">显示顺序：</td>
        <td><INPUT name="fpx" type="text" id="fpx" value="<?php echo $row['px']?>" size="5" maxlength="11" >
         <span class="red">* (从小到大排序)</span></td>
      </tr>
      <?php
		$rows=$db->getrss('select * from '.table('master_menu').' where fid='.$row['id'].' order by px asc,id asc');
		foreach($rows as $k=>$v){
			if ($k%2==0){
				$class=' class="tdbgc"';
			}else{
				$class=' class="tdbg"';
			}
	  ?>
      <tr<?php echo $class;?>>
        <td width="120" align="right">导航类型：</td>
        <td>
         <input name="ty<?php echo $v['id']?>" type="radio" class="radio"  value="1" <?php if ($v['ty']==1){echo' checked="checked"';}?> />
            普通导航连接
         <input name="ty<?php echo $v['id']?>" type="radio" class="radio"  value="2" <?php if ($v['ty']==2){echo' checked="checked"';}?> />
            系统设置连接
         <input name="ty<?php echo $v['id']?>" type="radio" class="radio"  value="3" <?php if ($v['ty']==3){echo' checked="checked"';}?>/>
           SEO设置连接
        </td>
      </tr>
          <tr<?php echo $class;?>>
            <td width="120" align="right">导航名称：</td>
            <td>
            <input type="hidden" name="id[]" value="<?php echo $v['id']?>" />
            <INPUT name="title[]" type="text" id="title[]" size="30" maxlength="100" value="<?php echo $v['title']?>"> 
            <span class="red">*</span>&nbsp; 导航名称：
            <input name="title2[]" type="text" id="title2[]" size="30" maxlength="100" value="<?php echo $v['title2']?>" />
            </td>
          </tr>
          <tr<?php echo $class;?>>
            <td width="120" align="right">连接地址：</td>
            <td>
            <INPUT name="link_url[]" type="text" id="link_url[]" size="30" maxlength="100" value="<?php echo $v['link_url']?>">
            &nbsp;&nbsp;&nbsp; 连接地址：
            <input name="link_url2[]" type="text" id="link_url2[]" size="30" maxlength="100" value="<?php echo $v['link_url2']?>" />
            </td>
          </tr>
          <tr<?php echo $class;?>>
            <td width="120" align="right">导航状态：</td>
            <td>
            <input name="pass<?php echo $v['id']?>" type="radio" class="radio" id="pass<?php echo $v['id']?>" value="1"  <?php if ($v['pass']==1){echo' checked="checked"';}?>>
            启用
            <input name="pass<?php echo $v['id']?>" type="radio" class="radio" id="pass<?php echo $v['id']?>" value="0" <?php if ($v['pass']==0){echo' checked="checked"';}?>>			
            停用            </td>
          </tr>
            <tr<?php echo $class;?>>
            <td width="120" align="right">显示顺序：</td>
            <td><INPUT name="px[]" type="text" id="px[]" value="<?php echo $v['px']?>" size="5" maxlength="11" >
             <span class="red">* (从小到大排序)</span></td>
          </tr>
    <?php
		}
	?>
    </table>
    <table width="100%" border="0" cellspacing="1" cellpadding="2" style="margin-top:3px;">
      <tr>
        <td width="122">&nbsp;</td>
        <td><input type="submit" name="Submit" value=" 提 交 " class="btn"> &nbsp; &nbsp; &nbsp;<input name="Cancel" type="button" id="Cancel" value=" 取 消 " onClick="location.href='m_default.php';" class="btn"></td>
      </tr>
    </table>
    </FORM>
    <?php
	}
	?>
<?php
}elseif ($act==2){
?>
	<?php
    $row=$db->getrs('select * from '.table('master_menu').' where id='.$id.'');
	if ($row){
	?>
    <br />
<FORM name="form1" method="post" action="m_copyy.php?act=2" onSubmit="return check()">
    <input type="hidden" name="fid" value="<?php echo $row['fid']?>" />
    <input type="hidden" name="act" value="<?php echo $act?>" />
    <div id="tits" class="subnav">
    <ul></ul>
    </div>
  <table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
    <tr class="tdbg">
      <td width="120" align="right">上级导航：</td>
      <td>
        <select name="fid" id="fid">
            <?php
            $rss=$db->getrss('select * from '.table('master_menu').' where fid=0 order by `px` asc,`id` asc');
            foreach($rss as $rs){
                echo'<option value="'.$rs["id"].'">• '.$rs["title"].'</option>'."\n";
            }
            ?>
        </select>
        <script>
        gt('fid').value='<?php echo $row['fid']?>';
        </script> 
      </td>
    </tr>
      <tr class="tdbg">
        <td width="120" align="right">导航类型：</td>
        <td>
         <input name="ty" type="radio" class="radio" id="ty1" value="1" <?php if ($row['ty']==1){echo' checked="checked"';}?> />
            普通导航连接
         <input name="ty" type="radio" class="radio" id="ty2" value="2" <?php if ($row['ty']==2){echo' checked="checked"';}?> />
            系统设置连接
         <input name="ty" type="radio" class="radio" id="ty3" value="3" <?php if ($row['ty']==3){echo' checked="checked"';}?>/>
            SEO设置连接
        </td>
      </tr>
    <tr class="tdbg">
      <td width="120" align="right">导航名称：</td>
      <td><INPUT name="title" type="text" id="title" size="30" maxlength="100" value="<?php echo $row['title']?>"> 
        <span class="red">*&nbsp;</span> 导航名称：
        <input name="title2" type="text" id="title2" size="30" maxlength="100" value="<?php echo $row['title2']?>" />
      </td>
    </tr>
    <tr class="tdbg">
      <td width="120" align="right">连接地址：</td>
      <td><INPUT name="link_url" type="text" id="link_url" size="30" maxlength="100" value="<?php echo $row['link_url']?>">
     &nbsp;&nbsp;&nbsp; 连接地址：
      <input name="link_url2" type="text" id="link_url2" size="30" maxlength="100" value="<?php echo $row['link_url2']?>" /></td>
    </tr>
    <tr class="tdbg" >
      <td width="120" align="right">导航状态：</td>
      <td>
        <input name="pass" type="radio" class="radio" id="pass" value="1" <?php if ($row['pass']==1){echo' checked="checked"';}?>>
        启用
        <input name="pass" type="radio" class="radio" id="pass2" value="0" <?php if ($row['pass']==0){echo' checked="checked"';}?>>			
      停用    </td>
    </tr>
      <tr class="tdbg">
        <td width="120" align="right">显示顺序：</td>
        <td><INPUT name="px" type="text" id="px" size="5" maxlength="11" value="<?php echo $row['px']?>" >
        <span class="red">* (从小到大排序)</span></td>
    </tr>
  </table>
    <table width="100%" border="0" cellspacing="1" cellpadding="2" style="margin-top:3px;">
      <tr>
        <td width="122">&nbsp;</td>
        <td><input type="submit" name="Submit" value=" 提 交 " class="btn"> &nbsp; &nbsp; &nbsp;<input name="Cancel" type="button" id="Cancel" value=" 取 消 " onClick="location.href='m_default.php';" class="btn"></td>
      </tr>
    </table>
</FORM>
    <?php
	}
	?>
<?php
}
?>
</body>
</html>
