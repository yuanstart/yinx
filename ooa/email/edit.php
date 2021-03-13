<?php
require('../../include/common.inc.php');
checklogin();
checkaction('email_co_view');

$id=isset($_GET['id'])?$_GET['id']:'';
$url=(previous())?previous():'default.php';

if ($id==''||!checknum($id)){
	msg('参数错误！');
}

$row=$db->getrs('select * from '.table('email_co').' where `id`='.$id.'');
if (!$row){
	msg('该信息不存在或已删除');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改邮件</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/function.js"></script>
<script src="../scripts/jquery.js"></script>
<script src="../scripts/calendar.js"></script>
<script>
function subm(str){
	if (checkForm('form1')){
		if (str==1){
			gt('form1').action='editt.php?act=1';
		}else if(str==2){
			if (gt('r_sel')==null&&gt('r_sel_email').value==''){
				alert('请填写收件箱');
				return false;
			}
			gt('form1').action='editt.php?act=2';
		}
		gt('form1').submit();
	}
}
</script>
</head>

<body>
<DIV id=popImageLayer style="VISIBILITY: hidden; WIDTH: 267px; CURSOR: hand; POSITION: absolute; HEIGHT: 260px; background-image:url(../images/bbg.gif); z-index: 100;" align=center  name="popImageLayer"  ></DIV>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">修改邮件</td>
  </tr>
  <tr class="tdbg">
    <td width="70" height="26" align="right"><strong>管理导航：</strong></td>
    <td><a href="default.php">管理首页</a>&nbsp;|&nbsp;<a href="add.php">添加邮件</a></td>
  </tr>
</table>
<br />
<FORM name="form1" id="form1" method="post" action="editt.php" onSubmit="return checkForm('form1')">
<input name="id" type="hidden" id="id" value="<?php echo $id?>"/>
<input name="url" type="hidden" id="url" value="<?php echo $url?>"/>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="title">
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="120" align="right" class="tdbg">收&nbsp; 件&nbsp; 箱：</td>
    <td class="tdbg">
    <div style="width:662px;">
    <label for="select_dy"  class="btn-primary">选择订阅邮箱</label>
    <label for="select_hy"  class="btn-primary">选择会员邮箱</label>
    <div class="clear"></div>
    <div class="tj_list">
    <?php
    if ($row['r_sel']==2){
		echo '<a><input type="hidden" name="r_sel" id="r_sel" value="2"/>全部订阅邮箱<span class="icon_btn"></span></a>';
	}elseif($row['r_sel']==3){
		if ($row['r_sel_stime']==''){
			$stime_val='开始';
		}else{
			$stime_val=$row['r_sel_stime'];
		}
		if ($row['r_sel_etime']==''){
			$etime_val='现在';
		}else{
			$etime_val=$row['r_sel_etime'];
		}
		echo '<a><input type="hidden" name="r_sel" id="r_sel" value="3"/><input type="hidden" name="r_sel_stime" id="r_sel_stime" value="'.$row['r_sel_stime'].'"/><input type="hidden" name="r_sel_etime" id="r_sel_etime" value="'.$row['r_sel_etime'].'"/>订阅时间从 '.$stime_val.' 到 '.$etime_val.' 的邮箱<span class="icon_btn"></span></a>';
	}
	?>
    </div>
    <textarea name="r_sel_email" rows="4" id="r_sel_email" style="width:665px;clear:both;"><?php echo $row['r_sel_email']?></textarea><br />
    多个邮箱用英文的","隔开
    </div>
    </td>
  </tr>
  <tr>
    <td width="120" align="right" class="tdbg">邮件标题：</td>
    <td class="tdbg">
    <input name="title" type="text" class="input_m" size="70" maxlength="100" canEmpty="N" checkType="string,," checkStr="邮件标题" value="<?php echo $row['title']?>" />
    <span class="red">*</span> &nbsp; <input name="save_mb" class="checkbox" id="save_mb" type="checkbox" value="1" /> <label for="save_mb">存为邮件模板</label>
    </td>
  </tr>
  <tr class="tdbg">
    <td width="120" align="right">邮件内容：</td>
    <td>
    <textarea id="z_body" name="z_body" style="width:670px;height:300px;display:none;"  canEmpty="N" checkType="string,," checkStr="邮件内容"><?php echo $row['z_body']?></textarea>
    </td>
  </tr>
  <link rel="stylesheet" href="../kd_html/themes/default/default.css" />
  <script charset="utf-8" src="../kd_html/kindeditor.js"></script>
  <script charset="utf-8" src="../kd_html/lang/zh_CN.js"></script>
  <script>
		//设置参数
        var options = {
			allowFileManager : true,
			newlineTag : 'br',
			afterBlur : function(){  
               this.sync();  
            }  
		};
        KindEditor.ready(function(K) {
            //如需创建多个编辑器：
			//1.添加一个文本区域
			//2.只要复制多下面这行代码"K.create('textarea[name="z_body"]',options);"
			//3.然后改一下文本区域的名字
			K.create('textarea[name="z_body"]',options);
        });
  </script>
   <tr class="tdbg"> 
    <td width="120" align="right" valign="top">附件上传：</td>          
    <td >
      <iframe name="frame2" id="frame2" src="up_file_tool/uploadd.php?frameid=frame2&kuang=fil_sl&img_sl=<?php echo $row['fil_sl']?>" style="margin-top:2px; width:auto;width:380px; height:22px; overflow:hidden;" frameborder="0"  scrolling="no"></iframe>
      	<input type="hidden" name="fil_sl" id="fil_sl" maxlength="250" value="<?php echo $row['fil_sl']?>" >
		<?php
		require('up_file_tool/upcon.php');
		if(!empty($conf_uf['up']['text'])){
		?>
			<br /><span class="red"><?php echo $conf_uf['up']['text']?></span>
		<?php
		}
		?>   
     </td>
  </tr>
  
  <tr>
    <td width="120" align="right" class="tdbg">发&nbsp; 件&nbsp; 箱：</td>
    <td class="tdbg">
		<?php
        $rss=$db->getrss('select * from '.table('email_fj').' where pass=1 order by `id` desc');
		if (count($rss)>3){
        ?>
    	<input type="checkbox" class="checkbox yi" name="s_email_all"/>全选
        <?php
        }
		?>
        <ul class="email_list" style="width:690px;">
        <?php
		foreach($rss as $v){
		?>
            <li title="<?php echo $v['email'];?>"><input type="checkbox" class="checkbox er" name="s_email[]" value="<?php echo $v['id'];?>" <?php if (strpos(','.$row['s_email'].',',','.$v['id'].',')!==false){ echo ' checked="checked"';}?> /><?php echo getstr($v['email'],19);?></li>
		<?php
		}
		?>
        </ul>
    </td>
  </tr>
  <tr>
    <td width="120" align="right" class="tdbg">发件称呼：</td>
    <td class="tdbg">
    <input name="s_name" type="text" class="input_m" size="30" maxlength="50"  canEmpty="N" checkType="string,," checkStr="发件称呼" value="<?php echo $row['s_name']?>" /> <span class="red">*</span>
    </td>
  </tr>
  <tr>
    <td width="120" align="right" class="tdbg">每次发送：</td>
    <td class="tdbg">
    <input name="s_num" type="text" class="input_m" size="5" maxlength="3" canEmpty="N" checkType="number,," checkStr="每次发送多少封邮件" value="<?php echo $row['s_num']?>" /> 
    封 发送间隔
    <input name="s_time" type="text" class="input_m" size="5" maxlength="3" canEmpty="N" checkType="number,," checkStr="发送间隔" value="<?php echo $row['s_time']?>" /> 
    秒 <span class="red">*</span>
    </td>
  </tr>

    <tr>
    <td width="120" align="right" class="tdbg">回复邮箱：</td>
    <td class="tdbg">
    <input name="h_email" type="text" class="input_m" size="30" maxlength="50" canEmpty="N" checkType="string,," checkStr="回复邮箱"  value="<?php echo $row['h_email']?>"/> <span class="red">*</span>
    </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="1" cellpadding="2" style="margin-top:3px;">
  <tr>
    <td width="120">&nbsp;</td>
    <td>
    <input type="button" name="Submit" value="保 存" onclick="subm(1)" class="btn"> &nbsp; 
    <input type="button" name="Submit" value="保存并发送" onclick="subm(2)" class="btn"> &nbsp; 
    <input name="Cancel" type="button" id="Cancel" value="取 消" onClick="location.href='default.php';" class="btn">
    </td>
  </tr>
</table>
</FORM>

<script>
var select_a=''; //代表点击的是哪个按钮

$(function(){
	$('label[for="select_dy"],label[for="select_hy"]').click(function(event) {
		select_a=$(this).attr("for");
		show_wind();
		show_list();
	});
});

//弹出框
function show_wind() {
	var width=560;height=450;
	var winWinth = $(window).width(), winHeight = $(document).height();
	var tanchuLeft = $(window).width() / 2 - width / 2;
	var tanchuTop = $(window).height() / 2 - height / 2 + $(window).scrollTop();
	if (select_a=='select_dy'){
		tit='选择订阅邮箱';
	}else{
		tit='选择会员邮箱';
	}
	$("body").append('<div class="winbj"></div>');
	$("body").append('<div class="tanChu" style="z-index:100;"><div class="dialog-body" ></div></div>');
	str='<div class="dialog-shadow"></div>';
	str=str+'<div class="dialog-titlebar"><div class="dialog-title"><span>'+tit+'</span></div><div class="dialog-closebutton"><a title="关闭对话框"></a></div></div>';
	str=str+'<div class="dialog-content" id="dialog-content"></div>';
	str=str+'<div class="dialog-foot"><div class="dialog-buttons"><div id="btn_can" class="edui-button" >取消</div><div id="btn_ok" class="edui-button">确认</div></div></div>';
	$(".dialog-body").html(str);
	$(".winbj").css({ width: winWinth, height: winHeight, background: "#000", position: "absolute", left: "0", top: "0" });
	$(".winbj").fadeTo(0, 0.1);
	$(".tanChu").css({ width: width, height: height, left: tanchuLeft, top: tanchuTop, position: "absolute"});
	//取消按钮
	$(".dialog-closebutton,#btn_can").click(function() {
		$(".winbj").remove();
		$(".tanChu").remove();
		$(".dialog-body").remove();
		return false
	});
	//确认按钮
	$('#btn_ok').click(function(){
		//订阅邮箱点击确认
		if(select_a=='select_dy'){
			//赋值给 .tj_list
			var str='';
			$('input[name="tj_sel"]').each(function(){
				if ($(this).is(':checked')){
					str=$(this).val();
				}
			});
			if (str==2){
				$('.tj_list').html('<a><input type="hidden" name="r_sel" id="r_sel" value="2"/>全部订阅邮箱<span class="icon_btn"></span></a>');
			}else if(str==3){
				if($("#tj_sel_3_stime").val()==''&&$("#tj_sel_3_etime").val()==''){
					alert('请选择订阅时间');
					return false;
				}else{
					if ($("#tj_sel_3_stime").val()==''){
						stime_val='开始';
					}else{
						stime_val=$("#tj_sel_3_stime").val();
					}
					if ($("#tj_sel_3_etime").val()==''){
						etime_val='现在';
					}else{
						etime_val=$("#tj_sel_3_etime").val();
					}
				}
				$('.tj_list').html('<a><input type="hidden" name="r_sel" id="r_sel" value="3"/><input type="hidden" name="r_sel_stime" id="r_sel_stime" value="'+$("#tj_sel_3_stime").val()+'"/><input type="hidden" name="r_sel_etime" id="r_sel_etime" value="'+$("#tj_sel_3_etime").val()+'"/>订阅时间从 '+stime_val+' 到 '+etime_val+' 的邮箱<span class="icon_btn"></span></a>');
			}else{
				$('.tj_list').html('');
			}
			//赋值给 #r_sel_email
			$('#r_sel_email').val($('#lb_sel').val());
			//同时清空已选择的email
			$('#lb_sel').val('');
			//.tj_list a点击删除
			$('.tj_list a').click(function(){
				$(this).remove();
			})
		}else if(select_a=='select_hy'){
			//赋值给 .tj_list
			var str='';
			$('input[name="tj_sel"]').each(function(){
				if ($(this).is(':checked')){
					str=$(this).val();
				}
			});
			if (str==7){
				$('.tj_list').html('<a><input type="hidden" name="r_sel" id="r_sel" value="2"/>全部会员邮箱<span class="icon_btn"></span></a>');
			}else if(str==8){
				if($("#tj_sel_8_stime").val()==''&&$("#tj_sel_8_etime").val()==''){
					alert('请选择注册时间');
					return false;
				}else{
					if ($("#tj_sel_8_stime").val()==''){
						stime_val='开始';
					}else{
						stime_val=$("#tj_sel_8_stime").val();
					}
					if ($("#tj_sel_8_etime").val()==''){
						etime_val='现在';
					}else{
						etime_val=$("#tj_sel_8_etime").val();
					}
				}
				$('.tj_list').html('<a><input type="hidden" name="r_sel" id="r_sel" value="3"/><input type="hidden" name="r_sel_stime" id="r_sel_stime" value="'+$("#tj_sel_8_stime").val()+'"/><input type="hidden" name="r_sel_etime" id="r_sel_etime" value="'+$("#tj_sel_8_etime").val()+'"/>注册时间从 '+stime_val+' 到 '+etime_val+' 的邮箱<span class="icon_btn"></span></a>');
			}else{
				$('.tj_list').html('');
			}
			//赋值给 #r_sel_email
			$('#r_sel_email').val($('#lb_sel').val());
			//同时清空已选择的email
			$('#lb_sel').val('');
			//.tj_list a点击删除
			$('.tj_list a').click(function(){
				$(this).remove();
			})
		}
		select_a='';
		$(".dialog-body").remove();
		$(".tanChu").remove();
		$(".winbj").remove();
	});
}

//弹出框后ajax加载页面
function show_list(){
	$.ajax({
		type:'get',
		url:'ajax_email.php',
		data:{'act':select_a},
		beforeSend:function(){
			$('#dialog-content').html('<img id="loader" src="../images/loading.gif">');
			$('#loader').css({position:'absolute',left:($('#dialog-content').width()/2-8),top:($('#dialog-content').height()/2-8)})
		},
		success:function(data){
			$('#dialog-content').html(data);
			//点击订阅邮箱
			if (select_a=='select_dy'){
				//给条件选择赋值
				if ($('#r_sel').val()!=''){
					$('input[name="tj_sel"]').each(function(){
						if ($(this).val()==$('#r_sel').val()){
							$(this).prop("checked",true);
							if($(this).val()==3){
								$("#tj_sel_3_stime").val($("#r_sel_stime").val());
								$("#tj_sel_3_etime").val($("#r_sel_etime").val());
							}
						}
					});
				}
				//给列表选择赋值
				add_email('lb_sel',$('#r_sel_email').val());
				//执行列表选择的ajax搜索，所有条件为空
				search_dy();
			}else if(select_a=='select_hy'){
				//给条件选择赋值
				if ($('#r_sel').val()!=''){
					$('input[name="tj_sel"]').each(function(){
						if ($(this).val()==$('#r_sel').val()){
							$(this).prop("checked",true);
							if($(this).val()==8){
								$("#tj_sel_8_stime").val($("#r_sel_stime").val());
								$("#tj_sel_8_etime").val($("#r_sel_etime").val());
							}
						}
					});
				}
				//给列表选择赋值
				add_email('lb_sel',$('#r_sel_email').val());
				//执行列表选择的ajax搜索，所有条件为空
				search_hy();
			}
		}
	});
}

//弹出框ajax加载订阅邮箱页面后"列表选择"的ajax搜索
function search_dy(page){
	$.ajax({
		type:'post',
		url:'ajax_email.php?act=select_dy_post&page='+page,
		data:$('#search_form').serialize(),
		beforeSend:function(){
			$('#sou_result').html('<img id="loader" src="../images/loading.gif">');
			$('#loader').css({position:'absolute',left:250,top:200})
		},
		success:function(data){
			$('#sou_result').html(data);
			$(".sa").click(function(){
				var status=$(this).is(':checked');
				var str='';
				$('.si').each(function(){
					$(this).prop("checked",status);
					str=str+','+$(this).val();
				});
				str=str.substr(1);
				if (status==true){
					add_email('lb_sel',str);
				}else{
					del_email('lb_sel',str);
				}
			});
			$('.si').click(function(){
				var status=$(this).is(':checked');
				str=$(this).val();
				if (status==true){
					add_email('lb_sel',str);
				}else{
					del_email('lb_sel',str);
				}
			});
		}
	});
}

//弹出框ajax加载会员邮箱页面后"列表选择"的ajax搜索
function search_hy(page){
	$.ajax({
		type:'post',
		url:'ajax_email.php?act=select_hy_post&page='+page,
		data:$('#search_form').serialize(),
		beforeSend:function(){
			$('#sou_result').html('<img id="loader" src="../images/loading.gif">');
			$('#loader').css({position:'absolute',left:250,top:200})
		},
		success:function(data){
			$('#sou_result').html(data);
			$(".sa").click(function(){
				var status=$(this).is(':checked');
				var str='';
				$('.si').each(function(){
					$(this).prop("checked",status);
					str=str+','+$(this).val();
				});
				str=str.substr(1);
				if (status==true){
					add_email('lb_sel',str);
				}else{
					del_email('lb_sel',str);
				}
			});
			$('.si').click(function(){
				var status=$(this).is(':checked');
				str=$(this).val();
				if (status==true){
					add_email('lb_sel',str);
				}else{
					del_email('lb_sel',str);
				}
			});
		}
	});
}

//向“列表选择”里已选择的邮箱列表加入邮箱
function add_email(name,v){
	if ($('#'+name)!=null){
		yv=$('#'+name).val();
	}else{
		yv='';
	}
	if (yv==''){
		yv=v;
	}else{
		if (v.indexOf(',')<0){
			if((','+yv+',').indexOf(','+v+',')<0){
				yv=yv+','+v;
			}
		}else{
			arr=v.split(',');
			for(i=0;i<arr.length;i++){
				if((','+yv+',').indexOf(','+arr[i]+',')<0){
					yv=yv+','+arr[i];
				}
			}		
		}
	}
	$('#'+name).val(yv);
}

//向“列表选择”里已选择的邮箱列表中删除邮箱
function del_email(name,v){
	if ($('#'+name)!=null){
		yv=$('#'+name).val();
	}else{
		yv='';
	}
	if (yv!=''){
		if (v.indexOf(',')<0){
			if((','+yv+',').indexOf(','+v+',')>=0){
				yv=(','+yv+',').replace(','+v,'');
				yv=yv.substr(1,(yv.length-2));
			}
		}else{
			arr=v.split(',');
			for(i=0;i<arr.length;i++){
				if((','+yv+',').indexOf(','+arr[i]+',')>=0){
					yv=(','+yv+',').replace(','+arr[i],'');
					yv=yv.substr(1,(yv.length-2));
				}
			}		
		}
	}
	$('#'+name).val(yv);
}

$('.tj_list a').click(function(){
	$(this).remove();
})

//发件箱全选
$(".yi").click(function(){
	var status=$(this).is(':checked');
	$('.er').each(function(){
		$(this).prop("checked",status);
	});
})
</script>
</body>
</html>
