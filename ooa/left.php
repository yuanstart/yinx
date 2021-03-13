<?php 
require('../include/common.inc.php');
chklogin();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台左侧</title>
<script src="scripts/function.js"></script>
<style>
html,BODY {SCROLLBAR-FACE-COLOR: #65A8E5;SCROLLBAR-HIGHLIGHT-COLOR: #65A8E5;SCROLLBAR-SHADOW-COLOR: #BDD6EE;SCROLLBAR-3DLIGHT-COLOR: #ffffff;SCROLLBAR-ARROW-COLOR: #ffffff;SCROLLBAR-TRACK-COLOR:#BDD6EE;SCROLLBAR-DARKSHADOW-COLOR: #65A8E5; font-family:Arial, Helvetica, sans-serif;overflow:scroll; overflow-x:auto;}
body{background: #fbfbfb url(images/aa_left1.gif) no-repeat left top; margin:0px; width:181px; height:100%; font-size:12px;overflow-x:auto; overflow-y:hidden;}
ul,li{list-style:none; margin:0px; padding:0px;}
a {COLOR: #000000;  TEXT-DECORATION: none}
a:link {COLOR: #000000;  TEXT-DECORATION: none}
a:visited {COLOR: #000000;  TEXT-DECORATION: none}
a:active {COLOR: #000000;  TEXT-DECORATION: none}
a:hover {COLOR: #000000; TEXT-DECORATION: underline}
#left_main{ width:158px; border-left:1px solid #808080;border-right:1px solid #808080;border-bottom:1px solid #808080;margin:0px 0 0 8px; background-color:#f8f8f8;}
#left_main h3{ padding:0 0 0 8px; margin:0px; height:25px; line-height:25px; font-size:12px; color:#494949; background:url(images/title_bg_show.gif) no-repeat left top;}
#left_main ul{ padding:2px 0 3px;}
#left_main ul li{ background:url(images/project2.gif) no-repeat 6px 2px; padding:3px 0 1px 26px;}
#left_main ul .li_01{background:url(images/news_catch_up.gif) no-repeat 6px 2px;}
#left_main ul .li_02{background:url(images/mail_send_all.gif) no-repeat 6px 2px;}
#left_main ul .li_02 a{ color:#FF0000; font-weight:bold;}
#left_main ul .li_03{background:url(images/favorites.gif) no-repeat 6px 2px;}
</style>
</head>

<body>
<div style="height:9px;"></div>
<div id="left_main">
<?php
	//判断该管理员可以管理哪些导航菜单
	$sq='';
	if($_SESSION['menu_list']!=''&&$_SESSION['menu_list']!='all'){
		$sq.=' and (id in ('.$_SESSION['menu_list'].') or fid in ('.$_SESSION['menu_list'].'))';
	}
	$arr=array();
	$rss=$db->getrss('select * from '.table('master_menu').' where pass=1 '.$sq.' order by px asc,id asc');
	foreach($rss as $rs){
		$arr[$rs['fid']][]=$rs;
	}
	if (!empty($arr[0])){
		foreach($arr[0] as $v){
?>
        <h3><?php echo $v['title']?></h3>
			<?php
            if (!empty($arr[$v['id']])){
            ?>
                <ul>
                    <?php
                    foreach($arr[$v['id']] as $ev){
                    ?>
                        <li class="li_03">
                        <a href="<?php echo $ev['link_url']?>" target="mainFrame"><?php echo $ev['title']?></a>
                        <?php
                        if ($ev['title2']!=''){
                        ?>
                            | <a href="<?php echo $ev['link_url2']?>"  target="mainFrame"><?php echo $ev['title2']?></a>
                        <?php
                        }
                        ?>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
<?php
			}
		}
	}
?>
	<h3>Instant Messenger</h3>
    <ul>
    	<li class="li_01">
			<SCRIPT LANGUAGE="JavaScript">
				<!--
				document.write("Javascript 可执行") 
				//-->
            </SCRIPT>
            <noscript>Javascript 不执行</noscript>
        </li>
    	<li class="li_01">
			<SCRIPT LANGUAGE="JavaScript">   
				<!--  
				function chkFlash() {
					var isIE = (navigator.appVersion.indexOf("MSIE") >= 0);
					var hasFlash = true;
				
					if(isIE) {
						try{
							var objFlash = new ActiveXObject("ShockwaveFlash.ShockwaveFlash");
						} catch(e) {
							hasFlash = false;
						}
					} else {
						if(!navigator.plugins["Shockwave Flash"]) {
							hasFlash = false;
						}
					}
					return hasFlash;
				}
				(chkFlash)?document.write('Flash 插件已安装'):document.write('Flash 插件未安装');          
				//-->       
            </SCRIPT>
  		</li>
    </ul>
</div>
</body>
</html>
