<link rel="stylesheet" type="text/css" href="qq/css/kefu.css">
<script type="text/javascript">
	$(function(){
		$("#aFloatTools_Show").click(function(){
			$('#divFloatToolsView').animate({width:'show',opacity:'show'},100,function(){$('#divFloatToolsView').show();});
			$('#aFloatTools_Show').hide();
			$('#aFloatTools_Hide').show();				
		});
		$("#aFloatTools_Hide").click(function(){
			$('#divFloatToolsView').animate({width:'hide', opacity:'hide'},100,function(){$('#divFloatToolsView').hide();});
			$('#aFloatTools_Show').show();
			$('#aFloatTools_Hide').hide();	
		});
	});
</script>

<div id="floatTools" class="rides-cs" style="height:246px;">
  <div class="floatL">
  	<a style="display:block" id="aFloatTools_Show" class="btnOpen" title="查看在线客服" style="top:20px" href="javascript:void(0);">展开</a>
  	<a style="display:none" id="aFloatTools_Hide" class="btnCtn" title="关闭在线客服" style="top:20px" href="javascript:void(0);">收缩</a>
  </div>
  <div id="divFloatToolsView" class="floatR" style="display: none;height:237px;width: 140px;">
    <div class="cn">
      <h3 class="titZx">兴泰集团</h3>
      <ul>
<?php
$sql='select `id`,`title`,`rename` from `'.$tablepre.'kf_co` where `lx`=1 order by `px` desc,`id` desc';
$result=$db->query($sql);
while ($row=$db->getrow($result)){
?>
        <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $row["title"]?>&site=qq&menu=yes"><li><span><?php echo $row["rename"]?></span> <img border="0" src="images/online.png" alt="点击这里给我发消息" title="点击这里给我发消息"/> </li></a>
<?php
}
$db->freeresult($result);
?>
        <li style="border:none;"><span>电话：400 088 0233</span> </li>
      </ul>
    </div>
  </div>
</div>