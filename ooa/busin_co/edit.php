<?php
require('../../include/common.inc.php');
checklogin();//检查登录
$cong=load_config('setup');//加载整站配置文件
$conf=read_config('config','../');//读取本系统配置文件
checkaction($conf['sy']['pre'].'_co_view');//检查权限

$id=isset($_GET['id'])?$_GET['id']:'';
$url=(previous())?previous():'default.php';

if ($id==''||!checknum($id)){
	msg('参数错误');
}

$id_lm='';
$add_xx='';
$row=$db->getrs('select * from '.table($conf['sy']['table_co']).' where `id`='.$id.'');
if (!$row){
	msg('该信息不存在或已删除');
}else{
	$rs=$db->getrs('select * from '.table($conf['sy']['table_lm']).' where `id_lm`='.$row["lm"].'');
	if ($rs){
		$id_lm=$rs['id_lm'];
		$add_xx=$rs['add_xx'];
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改<?php echo $conf['sy']['name'];?></title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/function.js"></script>
<script src="../scripts/jquery.js"></script>
<SCRIPT language="JavaScript" type="text/JavaScript">
function check(){
	<?php
	if ($conf['sy']['need_lm']==true){
	?>
	if (gt('lm').value=="0"){
		alert("请选择分类");
		gt('lm').focus();
		return false;
	}
	<?php
	}
	?>
	if (gt('lm').value=="no"){
		alert("所选分类不允许添加信息");
		gt('lm').focus();
		return false;
	}
	<?php
	foreach ($cong['mlang'] as $k=>$v){
		if ($v['must']==true){
	?>
	if(gt('title<?php echo $v['lang']?>').value==''){
		alert('<?php echo $v['name']?>标题不能为空');
		gt('title<?php echo $v['lang']?>').focus();
		return false;
	}
	<?php
		}
		if ($conf['co']['mlang']!=true){
			break;
		}
	}
	?>
	if(gt('px').value==''){
		alert('显示顺序不能为空');
		gt('px').focus();
		return false;
	}
}

function tanchuchuang(url,width,height) {
	tit='';
	var winWinth = $(window).width(), winHeight = $(document).height();
	$("body").append("<div class='winbj'></div>");
	$("body").append("<div class='tanChu' style='z-index:100;'><div class='winIframe' ></div></div>");
	str='<iframe id="fra_add" name="fra_add" src="'+url+'" style="width:'+width+'px; height:'+height+'px;" frameborder="0" scrolling="auto"></iframe>';
	$(".winIframe").html(str);
	$(".winbj").css({ width: winWinth, height: winHeight, background: "#000", position: "absolute", left: "0", top: "0" });
	$(".winbj").fadeTo(0, 0.3);
	var tanchuLeft = $(window).width() / 2 - width / 2;
	var tanchuTop = $(window).height() / 2 - height / 2 + $(window).scrollTop();
	$(".tanChu").css({ width: width, height: height, border: "3px #ccc solid",padding:"0px", left: tanchuLeft, top: tanchuTop, background: "#fff", position: "absolute"});
	var winIframeHeight = height - 26;

	$(".tanchuCancle").click(function() {
		$(".winbj").remove();
		$(".tanChu").remove();
		$(".winIframe").remove();
		return false
	});
}

function tanchuCancle(){
	$(".winbj").remove();
	$(".tanChu").remove();
	$(".winIframe").remove();
}
</SCRIPT>
</head>

<body>
<DIV id=popImageLayer style="VISIBILITY: hidden; WIDTH: 267px; CURSOR: hand; POSITION: absolute; HEIGHT: 260px; background-image:url(../images/bbg.gif); z-index: 100;" align=center  name="popImageLayer"  ></DIV>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">修改<?php echo $conf['sy']['name'];?></td>
  </tr>
  <tr class="tdbg" <?php if ($conf['co']['add_xx']==false){echo ' style="display:none;"';}?>>
    <td width="70" height="26" align="right"><strong>管理导航：</strong></td>
    <td><a href="default.php">管理首页</a>&nbsp;|&nbsp;<a href="add.php">添加<?php echo $conf['sy']['name'];?></a></td>
  </tr>
</table>
<br />
<FORM name="form1" method="post" action="editt.php" onSubmit="return check()">
<input name="id" type="hidden" id="id" value="<?php echo $id?>"/>
<input name="url" type="hidden" id="url" value="<?php echo $url?>"/>
<div id="tits" class="subnav">
    <ul>
    	<?php
        if ($cong['sy_seo']==true&&$conf['co']['seo']==true){
			echo '<li onclick="settab(\'tits\',\'con\',1)" class="cur" >详细信息</li>';
			echo '<li onclick="settab(\'tits\',\'con\',2)" class="">seo设置</li>';
        }
		?>
    </ul>
</div>
<div id="con_1">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
  <tr class="tdbg" <?php if ($conf['sy']['need_lm']==false){echo ' style="display:none;"';}?>>
    <td width="120" align="right">所属分类：</td>
    <td>
    <select name="lm" id="lm">
      <option value="0" selected="selected">请选择分类</option>
    	<?php
		//把所有分类放到$rss数组里
        $rss=$db->getrss('select * from '.table($conf['sy']['table_lm']).' order by `px` desc,`id_lm` asc');
		//无限级分类开始
		addlm($rss,0,'');
		//通过$fid来判读当前循环哪个级别，然后不断地递归循环
		function addlm($rss,$fid,$i){
			global $id_lm,$add_xx;
			//通过判断$i为空设定一级分类的标志为"• "，同时为二级判断留下标志
			if ($i==''){
				$i='• ';
			//通过判断$i为"• "设定二级分类的标志为" 　|—"
			}elseif ($i=='• '){
				$i=' 　|—';
			//其他级别的标志全部都是" 　|"加上上一级的标志
			}else{
				$i=' 　|'.$i;
			}
			//遍历所有分类数组根据传入的$fid来显示哪个级别，同时继续执行自己
			foreach($rss as $rs){
				if($rs['fid']==$fid){
					if($rs['add_xx']=='yes'||($rs['id_lm']==$id_lm&&$add_xx=='no')){
						echo'<option value="'.$rs["id_lm"].'">'.$i.$rs["title_lm"].'</option>'."\n";	
					}else{
						echo'<option value="no">'.$i.$rs["title_lm"].'×</option>'."\n";
					}
					addlm($rss,$rs['id_lm'],$i);
				}
			}
		}
		?>
    </select>
    <?php
    if($add_xx=='no'){
		echo '<script>gt("lm").value="'.$row['lm'].'";gt("lm").disabled="disabled";</script>'."\n";	
		echo'<input name="lm" id="lm" type="hidden" value="'.$row["lm"].'"/>';	
	}else{
		echo '<script>gt("lm").value="'.$row['lm'].'";</script>'."\n";		
	}
	?>    </td>
  </tr>
  <?php
  foreach ($cong['mlang'] as $k=>$v){
  ?>
  <tr class="tdbg">
    <td width="120" align="right"><?php if ($v['name']!=''){echo $v['name'].'标题';}else{echo '标　　题';}?>：</td>
    <td><INPUT name="title<?php echo $v['lang']?>" type="text" id="title<?php echo $v['lang']?>" size="50" maxlength="150" value="<?php echo $row['title'.$v['lang']]?>" <?php if($add_xx=='no'){echo' readonly="readonly" style="background-color:#e4e4e4;"';}?>>
    <?php 
	if ($v['must']==true){
		echo '<span class="red">*</span>';
	}
	?>
    </td>
  </tr>
  <?php
	if ($conf['co']['mlang']!=true){
		break;
	}
  }
  ?>
  <?php
  if ($conf['co']['apname']==true){
  ?>
  <tr class="tdbg">
    <td width="120" align="right">页面名称：</td>
    <td><INPUT name="apname" type="text" id="apname" size="50" maxlength="50" value="<?php echo $row['apname']?>"></td>
  </tr>
  <?php
  }
  ?>
  <?php
  if ($conf['co']['keyword']==true){
  	foreach ($cong['mlang'] as $k=>$v){
  ?>
  <tr class="tdbg">
    <td width="120" align="right"><?php echo $v['name']?>关键字：</td>
    <td><INPUT name="keyword<?php echo $v['lang']?>" type="text" id="keyword<?php echo $v['lang']?>" size="50" maxlength="50" value="<?php echo $row['keyword'.$v['lang']]?>"></td>
  </tr>
  <?php
		if ($conf['co']['mlang']!=true){
			break;
		}
  	}
  }
  ?>
  <?php
  if ($conf['co']['link_url']==true){
  ?>
  <tr class="tdbg">
    <td width="120" align="right">连接地址：</td>
    <td><INPUT name="link_url" type="text" id="link_url" size="57" maxlength="250" value="<?php echo $row['link_url']?>"></td>
  </tr>
  <?php
  }
  ?>
  <?php
  if ($conf['co']['f_body']==true){
  	foreach ($cong['mlang'] as $k=>$v){
  ?>
  <tr class="tdbg">
    <td align="right"><?php echo $v['name']?>简要介绍：</td>
    <td ><textarea name="f_body<?php echo $v['lang']?>" rows="4" id="f_body<?php echo $v['lang']?>" style="width:450px;"><?php echo rehtml($row['f_body'.$v['lang']])?></textarea></td>
  </tr>
  <?php
		if ($conf['co']['mlang']!=true){
			break;
		}
  	}
  }
  ?>
  <?php
  if ($conf['co']['z_body']==true){
  	foreach ($cong['mlang'] as $k=>$v){
  ?>
  <tr class="tdbg">
    <td width="120" align="right"><?php echo $v['name']?>详细介绍：</td>
    <td><textarea id="z_body<?php echo $v['lang']?>" name="z_body<?php echo $v['lang']?>" style="width:670px;height:300px;display:none;"><?php echo $row['z_body'.$v['lang']]?></textarea></td>
  </tr>
  <?php
		if ($conf['co']['mlang']!=true){
			break;
		}
  	}
  ?>
  <link rel="stylesheet" href="../kd_html/themes/default/default.css" />
  <script charset="utf-8" src="../kd_html/kindeditor.js"></script>
  <script charset="utf-8" src="../kd_html/lang/zh_CN.js"></script>
  <script>
		//设置参数
        var options = {
			allowFileManager : true,
			newlineTag : 'br'
		};
        KindEditor.ready(function(K) {
            //如需创建多个编辑器：
			//1.添加一个文本区域
			//2.只要复制多下面这行代码"K.create('textarea[name="z_body"]',options);"
			//3.然后改一下文本区域的名字
		  <?php
		   foreach ($cong['mlang'] as $k=>$v){
		  ?>
			K.create('textarea[name="z_body<?php echo $v['lang']?>"]',options);
		  <?php
			if ($conf['co']['mlang']!=true){
				break;
			}
		  }
		  ?>
        });
  </script>
  <?php
  }
  ?>
  
  <?php
  if ($conf['co']['img_sl']==true&&$conf_um=read_config('conf_um')){
  ?>
  <tr class="tdbg" >          
    <td width="120" align="right">图片上传：</td>          
    <td >
    <iframe name="frame1" id="frame1" src="up_image_tool/uploadd.php?frameid=frame1&kuang=img_sl&img_sl=<?php echo $row['img_sl']?>" style="margin-top:2px; width:auto; width:380px; height:22px; overflow:hidden;" frameborder="0"  scrolling="no"></iframe>  			    
    <input type="hidden" name="img_sl" id="img_sl" value="<?php echo $row['img_sl']?>" />
    <?php
    if(!empty($conf_um['up']['text'])){
	?>
        <br /><span class="red"><?php echo $conf_um['up']['text']?></span>
    <?php
    }
	?>
    </td>
  </tr>
  <?php
  }
  ?>
  <?php
  if ($conf['co']['pic_sl']==true&&$conf_up=read_config('conf_up')){
  ?>
  <tr class="tdbg" >          
    <td width="120" align="right">图片2上传：</td>          
    <td >
    <iframe name="frame4" id="frame4" src="up_pic_tool/uploadd.php?frameid=frame4&kuang=pic_sl&img_sl=<?php echo $row['pic_sl']?>" style="margin-top:2px; width:auto; width:380px; height:22px; overflow:hidden;" frameborder="0"  scrolling="no"></iframe>  			    
    <input type="hidden" name="pic_sl" id="pic_sl" value="<?php echo $row['pic_sl']?>" />
    <?php
    if(!empty($conf_up['up']['text'])){
	?>
        <br /><span class="red"><?php echo $conf_up['up']['text']?></span>
    <?php
    }
	?>
    </td>
  </tr>
  <?php
  }
  ?>
  <?php
  if ($conf['co']['fil_sl']==true&&$conf_uf=read_config('conf_uf')){
  ?>
   <tr class="tdbg"> 
    <td width="120" align="right" valign="top">
        <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>链接地址：</td>
          </tr>
          <tr>
            <td>上传文件：</td>
          </tr>
        </table>    </td>          
    <td >
        <table border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td><input type="text" name="fil_sl" id="fil_sl" maxlength="250" style="width:380px;"  value="<?php echo $row['fil_sl']?>"></td>
            </tr>
            <tr>
                <td><iframe name="frame2" id="frame2" src="up_file_tool/uploadd.php?frameid=frame2&kuang=fil_sl&img_sl=<?php echo $row['fil_sl']?>" style="margin-top:2px; width:auto;width:380px; height:22px; overflow:hidden;" frameborder="0"  scrolling="no"></iframe>
					<?php
                    if(!empty($conf_uf['up']['text'])){
                    ?>
                        <br /><span class="red"><?php echo $conf_uf['up']['text']?></span>
                    <?php
                    }
                    ?>
                    </td>
            </tr>
        </table></td>
  </tr>
  <?php
  }
  ?>
  <?php
  if ($conf['co']['vid_sl']==true&&$conf_uv=read_config('conf_uv')){
  ?>
    <tr class="tdbg">          
        <td width="120" align="right" valign="top">
        <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>链接地址：</td>
          </tr>
          <tr>
            <td>上传视频：</td>
          </tr>
        </table>        </td>          
        <td >
        <table border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td><input type="text" name="vid_sl" id="vid_sl" maxlength="250" style="width:380px;"  value="<?php echo $row['vid_sl']?>"></td>
            </tr>
            <tr>
                <td><iframe name="frame3" id="frame3" src="up_video_tool/uploadd.php?frameid=frame3&kuang=vid_sl&img_sl=<?php echo $row['vid_sl']?>" style="margin-top:2px; width:auto;width:380px; height:22px; overflow:hidden;" frameborder="0"  scrolling="no"></iframe>
					<?php
                    if(!empty($conf_uv['up']['text'])){
                    ?>
                        <br /><span class="red"><?php echo $conf_uv['up']['text']?></span>
                    <?php
                    }
                    ?>
                </td>
            </tr>
        </table></td>
    </tr>
  <?php
  }
  ?>
  <?php
  if ($conf['co']['image']==true){
  ?>
  <tr class="tdbg">
    <td width="120" align="right">多图上传：</td>
    <td >
    <iframe id="fra_image" name="fra_image" src="pl_image_tool/pl_default.php?pl_id=<?php echo $id?>" style="width:670px; height:285px;" frameborder="0" scrolling="auto"></iframe>    </td>
  </tr>
  <?php
  }
  ?>
  <?php
  if ($conf['co']['info']==true){
  ?>
  <tr class="tdbg">
    <td width="120" align="right">相关信息：</td>
    <td >
	<iframe id="fra_info" name="fra_info" src="pl_info_tool/pl_default.php?pl_id=<?php echo $id?>" style="width:670px; height:285px;" frameborder="0" scrolling="auto"></iframe>    </td>
  </tr>
  <?php
  }
  ?>
  <?php
  if ($conf['co']['file']==true){
  ?>
  <tr class="tdbg">
    <td width="120" align="right">相关文件：</td>
    <td >
	<iframe id="fra_file" name="fra_file" src="pl_file_tool/pl_default.php?pl_id=<?php echo $id?>" style="width:670px; height:285px;" frameborder="0" scrolling="auto"></iframe>    </td>
  </tr>
  <?php
  }
  ?>
  <?php
  if ($conf['co']['video']==true){
  ?>
  <tr class="tdbg">
    <td width="120" align="right">相关视频：</td>
    <td >
	<iframe id="fra_video" name="fra_video" src="pl_video_tool/pl_default.php?pl_id=<?php echo $id?>" style="width:670px; height:285px;" frameborder="0" scrolling="auto"></iframe>    </td>
  </tr>
  <?php
  }
  ?>
  <?php
  if ($conf['co']['zu']==true){
  ?>
  <tr class="tdbg">
    <td width="120" align="right">组图上传：</td>
    <td >
	<iframe id="fra_zu" name="fra_zu" src="pl_zu_tool/pl_default.php?pl_id=<?php echo $id?>" style="width:670px; height:285px;" frameborder="0" scrolling="auto"></iframe>    </td>
  </tr>
  <?php
  }
  ?>
  <tr class="tdbg" <?php if ($conf['co']['wtime']==false){echo ' style="display:none"';}?>>
    <td width="120" align="right">发布时间：</td>
    <td ><input name="wtime" type="text" id="wtime" value="<?php echo date('Y-m-d H:i:s',$row['wtime'])?>" maxlength="50">              时间格式为“年-月-日 时:分:秒”，如：<font color="#0000FF">2003-5-12 12:32:47</font></td>
  </tr>

    <tr class="tdbg">
    <td width="120" align="right">显示顺序：</td>
    <td><INPUT name="px" type="text" id="px" size="5" maxlength="11" value="<?php echo $row['px']?>" >
     <span class="red">* (从大到小排序)</span></td>
  </tr>
</table>
</div>
<div id="con_2" style="display:none;">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
<?php
foreach($cong['mlang'] as $k=>$v){
?>
  <tr class="tdbg">
    <td width="120" height="22" align="right"><?php echo $v['name']?>页面标题：</td>
    <td>
    <textarea name="ym_tit<?php echo $v['lang']?>" cols="80" rows="3"><?php echo rehtml($row['ym_tit'.$v['lang']])?></textarea><br />
	建议填写不超过80个字，不要使用“回车键”换行
    </td>
  </tr>
<?php
	if ($conf['co']['mlang']!=true){
		break;
	}
}
?>
<?php
foreach($cong['mlang'] as $k=>$v){
?>
  <tr class="tdbg">
    <td width="120" height="22" align="right" ><?php echo $v['name']?>页面关键字：</td>
    <td >
    <textarea name="ym_key<?php echo $v['lang']?>" cols="80" rows="3"><?php echo rehtml($row['ym_key'.$v['lang']])?></textarea><br />
	建议填写不超过100个字，不要使用“回车键”换行
    </td>
  </tr>
<?php
	if ($conf['co']['mlang']!=true){
		break;
	}
}
?>
<?php
foreach($cong['mlang'] as $k=>$v){
?>
  <tr class="tdbg">
    <td width="120" height="22" align="right" class="tdbg"><?php echo $v['name']?>页面描述：</td>
    <td><textarea name="ym_des<?php echo $v['lang']?>" cols="80" rows="3"><?php echo rehtml($row['ym_des'.$v['lang']])?></textarea><br />
    建议填写不超过200个字，不要使用“回车键”换行
    </td>
  </tr>
<?php
	if ($conf['co']['mlang']!=true){
		break;
	}
}
?>
</table>
</div>
<table width="100%" border="0" cellspacing="1" cellpadding="2" style="margin-top:3px;">
  <tr>
    <td width="120">&nbsp;</td>
    <td><input type="submit" name="Submit" value=" 保 存 " class="btn"> &nbsp; &nbsp; &nbsp;<input name="Cancel" type="button" id="Cancel" value=" 取 消 " onClick="location.href='<?php echo $url?>';" class="btn"></td>
  </tr>
</table>
</FORM>
</body>
</html>
