<?php
require('../../include/common.inc.php');
checklogin();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>系统设置</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/function.js"></script>
<script src="../scripts/jquery.js"></script>
</head>

<body>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">本系统设置</td>
  </tr>
</table>
<?php
//加载系统配置文件
if($conf=read_config('config')){
?>
<br />
<FORM name="form1" method="post" action="setconfigg.php">
<div class="subnav">
    <ul>
        <li id="tit_1" onclick="setdiv('tit_1','con_1')" class="tit cur" >系统设置</li>
        <li id="tit_2" onclick="setdiv('tit_2','con_2')" class="tit">分类设置</li>
        <li id="tit_3" onclick="setdiv('tit_3','con_3')" class="tit">信息设置</li>
    </ul>
</div>

<div id="con_1" class="con">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
  <tr class="tdbg">
    <td width="180" align="right">系统ID：</td>
    <td><input name="id" type="text" size="20" maxlength="50" value="<?php echo $conf['sy']['id']?>"> 每个系统的id是唯一的，id用于区分每个系统的多图、相关信息、相关文件等等</td>
  </tr>
  <tr class="tdbg">
    <td width="180" align="right">系统名称：</td>
    <td><input name="name" type="text" id="name" size="20" maxlength="50" value="<?php echo $conf['sy']['name']?>"></td>
  </tr>
  <tr class="tdbg">
    <td width="180" align="right">权限前缀：</td>
    <td><input name="pre" type="text" id="pre" size="20" maxlength="50" value="<?php echo $conf['sy']['pre']?>"> 每个系统的权限前缀标识 &nbsp;例如：新闻系统的权限前缀为news</td>
  </tr>
  <tr class="tdbg">
    <td  align="right">分类表名：</td>
    <td><input name="table_lm" type="text" id="table_lm" size="20" maxlength="50" value="<?php echo $conf['sy']['table_lm']?>"></td>
  </tr>
  <tr class="tdbg">
    <td  align="right">信息表名：</td>
    <td><input name="table_co" type="text" id="table_co" size="20" maxlength="50" value="<?php echo $conf['sy']['table_co']?>"></td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否需要分类：</td>
    <td>
        <input name="need_lm" type="radio" class="radio" id="need_lm" value="true" <?php if ($conf['sy']['need_lm']==true){echo' checked="checked"';}?>/>
        需要分类
        <input name="need_lm" type="radio" class="radio" id="need_lm2" value="false" <?php if ($conf['sy']['need_lm']==false){echo' checked="checked"';}?> />
        不需要分类    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">最多几级分类：</td>
    <td>
	<input name="level_lm" type="text" id="level_lm" size="10" maxlength="50" value="<?php echo $conf['sy']['level_lm']?>"> 0为不限制</td>
  </tr>
</table>
</div>

<div id="con_2" class="con" style="display:none;">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
  <tr class="tdbg">
    <td width="180" align="right">是否启用多语言：</td>
    <td>
        <input name="mlang_lm" type="radio" class="radio" id="mlang_lm" value="true" <?php if ($conf['lm']['mlang']==true){echo' checked="checked"';}?> />
        启用
        <input name="mlang_lm" type="radio" class="radio" id="mlang_lm2" value="false" <?php if ($conf['lm']['mlang']==false){echo' checked="checked"';}?> />
        不启用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否启用 分类seo：</td>
    <td>
        <input name="seo_lm" type="radio" class="radio" id="seo_lm" value="true" <?php if ($conf['lm']['seo']==true){echo' checked="checked"';}?> />
        启用
        <input name="seo_lm" type="radio" class="radio" id="seo_lm2" value="false" <?php if ($conf['lm']['seo']==false){echo' checked="checked"';}?> />
        不启用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否可以 添加分类：</td>
    <td>
        <input name="add_lm" type="radio" class="radio" id="add_lm" value="true" <?php if ($conf['lm']['add_lm']==true){echo' checked="checked"';}?> />
        可以
        <input name="add_lm" type="radio" class="radio" id="add_lm2" value="false" <?php if ($conf['lm']['add_lm']==false){echo' checked="checked"';}?>/>
        不可以    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">分类是否使用 页面名称：</td>
    <td>
        <input name="apname_lm" type="radio" class="radio"  value="true"  <?php if ($conf['lm']['apname_lm']==true){echo' checked="checked"';}?> />
        使用
        <input name="apname_lm" type="radio" class="radio" value="false" <?php if ($conf['lm']['apname_lm']==false){echo' checked="checked"';}?> />
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">分类是否使用 链接地址：</td>
    <td>
        <input name="url_lm" type="radio" class="radio" id="url_lm" value="true"  <?php if ($conf['lm']['url_lm']==true){echo' checked="checked"';}?> />
        使用
        <input name="url_lm" type="radio" class="radio" id="url_lm2" value="false" <?php if ($conf['lm']['url_lm']==false){echo' checked="checked"';}?> />
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">分类是否使用 简要介绍：</td>
    <td>
        <input name="f_body_lm" type="radio" class="radio" id="f_body_lm" value="true"  <?php if ($conf['lm']['f_body_lm']==true){echo' checked="checked"';}?> />
        使用
        <input name="f_body_lm" type="radio" class="radio" id="f_body_lm2" value="false" <?php if ($conf['lm']['f_body_lm']==false){echo' checked="checked"';}?> />
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">分类是否使用 详细介绍：</td>
    <td>
        <input name="z_body_lm" type="radio" class="radio" id="z_body_lm" value="true"  <?php if ($conf['lm']['z_body_lm']==true){echo' checked="checked"';}?> />
        使用
        <input name="z_body_lm" type="radio" class="radio" id="z_body_lm2" value="false" <?php if ($conf['lm']['z_body_lm']==false){echo' checked="checked"';}?>/>
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">分类是否使用 图片上传：</td>
    <td>
        <input name="img_sl_lm" type="radio" class="radio" id="img_sl_lm" value="true" onclick="disdiv('ul')" <?php if ($conf['lm']['img_sl_lm']==true){echo' checked="checked"';}?> />
        使用
        <input name="img_sl_lm" type="radio" class="radio" id="img_sl_lm2" value="false" onclick="clodiv('ul')" <?php if ($conf['lm']['img_sl_lm']==false){echo' checked="checked"';}?>  />
        不使用
		<?php
        //加载分类图片上传的配置文件
        if ($conf_ul=read_config('conf_ul')){
        ?>
        <table border="0" cellpadding="2" cellspacing="1" id="ul" <?php if ($conf['lm']['img_sl_lm']!=true){echo' style="display:none;"';}?>>
          <tr class="tdbg2">
            <td align="right">上传目录：</td>
            <td><input name="ul_path" type="text" size="20" maxlength="50" value="<?php echo $conf_ul['up']['path']?>"> 放在网站目录下的文件夹</td>
          </tr>
          <tr class="tdbg2">
            <td align="right" >上传大小：</td>
            <td ><input name="ul_maxsize" type="text"  size="20" maxlength="50" value="<?php echo $conf_ul['up']['maxsize']?>">
            B</td>
          </tr>
          <tr class="tdbg2">
            <td align="right">上传提醒：</td>
            <td><input name="ul_text" type="text"  size="40" maxlength="50" value="<?php echo $conf_ul['up']['text']?>"></td>
          </tr>
          <tr class="tdbg2">
            <td align="right" valign="top">缩&nbsp; 略&nbsp; 图：</td>
            <td>
              <input name="ul_sm" type="radio" class="radio"  value="true" onclick="disdiv('ul_tb_s')" <?php if ($conf_ul['up']['sm']==true){echo' checked="checked"';}?> >
              是
              <input name="ul_sm" type="radio" class="radio"  value="false" onclick="clodiv('ul_tb_s')" <?php if ($conf_ul['up']['sm']==false){echo' checked="checked"';}?> >
              否 生成缩略图
            <table border="0" cellspacing="0" cellpadding="2" id="ul_tb_s" <?php if ($conf_ul['up']['sm']!=true){echo ' style="display:none;"';}?>>
            <tbody>
            <tr><td colspan="9" style="color:#0000FF;">原图：默认名称为d，列表图：默认名称为空，其他缩略图名称可自取</td></tr>
            <?php
            foreach($conf_ul['sm'] as $k=>$v){ 
            ?>
               <tr>
                  <td>名称</td>
                  <td><input name="ul_s_nam[]" type="text" size="8" maxlength="50" value="<?php echo $v['s_nam']?>"></td>
                  <td>类型</td>
                  <td>
                    <select name="ul_s_typ[]" >
                        <option value="true"  <?php if ($v['s_typ']==true){echo' selected="selected"';}?>>固定尺寸</option>
                        <option value="false" <?php if ($v['s_typ']==false){echo' selected="selected"';}?>>不超过尺寸</option>
                    </select>
                  </td>
                  <td>宽度</td>
                  <td><input name="ul_s_wid[]"  type="text" size="8" value="<?php echo $v['s_wid']?>"/></td>
                  <td>高度</td>
                  <td><input name="ul_s_hei[]"  type="text" size="8" value="<?php echo $v['s_hei']?>"/></td>
                  <?php
                  if ($k==0){
                  ?>
                      <td><a class="icon jia" onclick="add_tr(this,'ul')"></a></td>
                  <?php
                  }else{
                  ?>
                      <td><a class="icon jian" onclick="del_tr(this)"></a></td>
                  <?php
                  }
                  ?>
              </tr>
             <?php
            }
             ?>
              </tbody>
            </table>
            </td>
          </tr>
        </table>
        <?php
        }
		?>
   </td>
  </tr>
  <tr class="tdbg">
    <td align="right">分类是否显示 分类属性：</td>
    <td>
        <input name="con_att_lm" type="radio" class="radio" id="con_att_lm" value="true"  <?php if ($conf['lm']['con_att']==true){echo' checked="checked"';}?> />
        显示
        <input name="con_att_lm" type="radio" class="radio" id="con_att_lm2" value="false" <?php if ($conf['lm']['con_att']==false){echo' checked="checked"';}?> />
        不显示    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">分类是否显示 推荐按钮：</td>
    <td>
        <input name="tuijian_lm" type="radio" class="radio" id="tuijian_lm" value="true"  <?php if ($conf['lm']['tuijian']==true){echo' checked="checked"';}?> />
        显示
        <input name="tuijian_lm" type="radio" class="radio" id="tuijian_lm2" value="false" <?php if ($conf['lm']['tuijian']==false){echo' checked="checked"';}?> />
        不显示    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">分类是否显示 热门按钮：</td>
    <td>
        <input name="hot_lm" type="radio" class="radio" id="hot_lm" value="true"  <?php if ($conf['lm']['hot']==true){echo' checked="checked"';}?> />
        显示
        <input name="hot_lm" type="radio" class="radio" id="hot_lm2" value="false" <?php if ($conf['lm']['hot']==false){echo' checked="checked"';}?>/>
        不显示    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">分类是否显示 屏蔽按钮：</td>
    <td>
        <input name="pass_lm" type="radio" class="radio" id="pass_lm" value="true"  <?php if ($conf['lm']['pass']==true){echo' checked="checked"';}?> />
        显示
        <input name="pass_lm" type="radio" class="radio" id="pass_lm2" value="false" <?php if ($conf['lm']['pass']==false){echo' checked="checked"';}?>/>
        不显示    </td>
  </tr>
</table>
</div>

<div id="con_3" class="con" style="display:none;">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border_tab">
  <tr class="tdbg">
    <td width="180" align="right">是否启用多语言：</td>
    <td>
        <input name="mlang" type="radio" class="radio" id="mlang" value="true" <?php if ($conf['co']['mlang']==true){echo' checked="checked"';}?> />
        启用
        <input name="mlang" type="radio" class="radio" id="mlang2" value="false" <?php if ($conf['co']['mlang']==false){echo' checked="checked"';}?> />
        不启用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否启用 信息seo：</td>
    <td>
        <input name="seo" type="radio" class="radio" id="seo" value="true"  <?php if ($conf['co']['seo']==true){echo' checked="checked"';}?> />
        启用
        <input name="seo" type="radio" class="radio" id="seo2" value="false" <?php if ($conf['co']['seo']==false){echo' checked="checked"';}?>/>
        不启用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否可以 添加信息：</td>
    <td>
        <input name="add_xx" type="radio" class="radio" id="add_xx" value="true" <?php if ($conf['co']['add_xx']==true){echo' checked="checked"';}?> />
        可以
        <input name="add_xx" type="radio" class="radio" id="add_xx2" value="false" <?php if ($conf['co']['add_xx']==false){echo' checked="checked"';}?>/>
        不可以    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 页面名称：</td>
    <td>
        <input name="apname" type="radio" class="radio" value="true" <?php if ($conf['co']['apname']==true){echo' checked="checked"';}?> />
        使用
        <input name="apname" type="radio" class="radio" value="false" <?php if ($conf['co']['apname']==false){echo' checked="checked"';}?>/>
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 关键字：</td>
    <td>
        <input name="keyword" type="radio" class="radio" id="keyword" value="true" <?php if ($conf['co']['keyword']==true){echo' checked="checked"';}?> />
        使用
        <input name="keyword" type="radio" class="radio" id="keyword2" value="false" <?php if ($conf['co']['keyword']==false){echo' checked="checked"';}?>/>
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 链接地址：</td>
    <td>
        <input name="link_url" type="radio" class="radio" id="link_url" value="true" <?php if ($conf['co']['link_url']==true){echo' checked="checked"';}?> />
        使用
        <input name="link_url" type="radio" class="radio" id="link_url2" value="false" <?php if ($conf['co']['link_url']==false){echo' checked="checked"';}?>/>
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 简要介绍：</td>
    <td>
        <input name="f_body" type="radio" class="radio" id="f_body" value="true" <?php if ($conf['co']['f_body']==true){echo' checked="checked"';}?> />
        使用
        <input name="f_body" type="radio" class="radio" id="f_body2" value="false" <?php if ($conf['co']['f_body']==false){echo' checked="checked"';}?>/>
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 详细介绍：</td>
    <td>
        <input name="z_body" type="radio" class="radio" id="z_body" value="true" <?php if ($conf['co']['z_body']==true){echo' checked="checked"';}?> />
        使用
        <input name="z_body" type="radio" class="radio" id="z_body2" value="false" <?php if ($conf['co']['z_body']==false){echo' checked="checked"';}?>/>
        不使用    
      </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 图片上传：</td>
    <td>
        <input name="img_sl" type="radio" class="radio" id="img_sl" value="true" onclick="disdiv('um')" <?php if ($conf['co']['img_sl']==true){echo' checked="checked"';}?> />
        使用
        <input name="img_sl" type="radio" class="radio" id="img_sl2" value="false" onclick="clodiv('um')" <?php if ($conf['co']['img_sl']==false){echo' checked="checked"';}?>/>
        不使用
		<?php
        //加载信息图片上传的配置文件
        if ($conf_um=read_config('conf_um','../')){
        ?>
        <table border="0" cellpadding="2" id="um" <?php if ($conf['co']['img_sl']!=true){echo' style="display:none;"';}?>>
          <tr class="tdbg2">
            <td align="right">上传目录：</td>
            <td><input name="um_path" type="text" size="20" maxlength="50" value="<?php echo $conf_um['up']['path']?>"> 放在网站目录下的文件夹</td>
          </tr>
          <tr class="tdbg2">
            <td align="right" >上传大小：</td>
            <td ><input name="um_maxsize" type="text"  size="20" maxlength="50" value="<?php echo $conf_um['up']['maxsize']?>">
            B</td>
          </tr>
          <tr class="tdbg2">
            <td align="right">上传提醒：</td>
            <td><input name="um_text" type="text"  size="40" maxlength="50" value="<?php echo $conf_um['up']['text']?>"></td>
          </tr>
          <tr class="tdbg2">
            <td align="right" valign="top" >缩&nbsp; 略&nbsp; 图：</td>
            <td>
              <input name="um_sm" type="radio" class="radio"  value="true" onclick="disdiv('um_tb_s')" <?php if ($conf_um['up']['sm']==true){echo' checked="checked"';}?> >
              是
              <input name="um_sm" type="radio" class="radio"  value="false" onclick="clodiv('um_tb_s')" <?php if ($conf_um['up']['sm']==false){echo' checked="checked"';}?> >
              否 
            <table border="0" cellspacing="0" cellpadding="2" id="um_tb_s" <?php if ($conf_um['up']['sm']!=true){echo ' style="display:none;"';}?>>
            <tbody>
            <tr><td colspan="9" style="color:#0000FF;">原图：默认名称为d，列表图：默认名称为空，其他缩略图名称可自取</td></tr>
            <?php
            foreach($conf_um['sm'] as $k=>$v){
            ?>
                  <tr>
                      <td>名称</td>
                      <td><input name="um_s_nam[]" type="text" size="8" maxlength="50" value="<?php echo $v['s_nam']?>"></td>
                      <td>类型</td>
                      <td>
                        <select name="um_s_typ[]" >
                            <option value="true"  <?php if ($v['s_typ']==true){echo' selected="selected"';}?>>固定尺寸</option>
                            <option value="false" <?php if ($v['s_typ']==false){echo' selected="selected"';}?>>不超过尺寸</option>
                        </select>
                      </td>
                      <td>宽度</td>
                      <td><input name="um_s_wid[]"  type="text" size="8" value="<?php echo $v['s_wid']?>"/></td>
                      <td>高度</td>
                      <td><input name="um_s_hei[]"  type="text" size="8" value="<?php echo $v['s_hei']?>"/></td>
                  <?php
                  if ($k==0){
                  ?>
                      <td><a class="icon jia" onclick="add_tr(this,'um')"></a></td>
                  <?php
                  }else{
                  ?>
                      <td><a class="icon jian" onclick="del_tr(this)"></a></td>
                  <?php
                  }
                  ?>
                  </tr>
             <?php
             }
             ?>
            </tbody>
          </table>
         </td>
       </tr>
       </table>
		<?php
        }
        ?>
     </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 多图上传：</td>
    <td>
        <input name="image" type="radio" class="radio" id="image" value="true" onclick="disdiv('pm')" <?php if ($conf['co']['image']==true){echo' checked="checked"';}?> />
        使用
        <input name="image" type="radio" class="radio" id="image2" value="false" onclick="clodiv('pm')" <?php if ($conf['co']['image']==false){echo' checked="checked"';}?>/>
        不使用
		<?php
        //加载多图上传的配置文件
        if($conf_pm=read_config('conf_pm','../')){
        ?>
        <table border="0" cellpadding="2" id="pm" <?php if ($conf['co']['image']!=true){echo' style="display:none;"';}?>>
          <tr class="tdbg2">
            <td align="right">表名：</td>
            <td><input name="pm_table" type="text" size="20" maxlength="50" value="<?php echo $conf_pm['pl']['table']?>"></td>
          </tr>
          <tr class="tdbg2">
            <td align="right">session：</td>
            <td><input name="pm_sesname" type="text" size="20" maxlength="50" value="<?php echo $conf_pm['pl']['sesname']?>"></td>
          </tr>
          <tr class="tdbg2">
            <td align="right">多语言：</td>
            <td>
            <input name="pm_mlang" type="radio" class="radio" value="true" <?php if ($conf_pm['pl']['mlang']==true){echo' checked="checked"';}?> />
            启用
            <input name="pm_mlang" type="radio" class="radio" value="false" <?php if ($conf_pm['pl']['mlang']==false){echo' checked="checked"';}?> />
            不启用
             </td>
          </tr>
          <tr class="tdbg2">
            <td align="right">显示标题：</td>
            <td>
            <input name="pm_title" type="radio" class="radio" value="true" <?php if ($conf_pm['pl']['title']==true){echo' checked="checked"';}?> />
            显示
            <input name="pm_title" type="radio" class="radio" value="false" <?php if ($conf_pm['pl']['title']==false){echo' checked="checked"';}?>/>
            不显示 
            </td>
          </tr>
          <tr class="tdbg2">
            <td align="right">显示排序：</td>
            <td>
            <input name="pm_px" type="radio" class="radio" value="true" <?php if ($conf_pm['pl']['px']==true){echo' checked="checked"';}?> />
            显示
            <input name="pm_px" type="radio" class="radio" value="false" <?php if ($conf_pm['pl']['px']==false){echo' checked="checked"';}?>/>
            不显示 
            </td>
          </tr>
          <tr class="tdbg2">
            <td align="right">上传目录：</td>
            <td><input name="pm_path" type="text" size="20" maxlength="50" value="<?php echo $conf_pm['up']['path']?>"> 放在网站目录下的文件夹</td>
          </tr>
          <tr class="tdbg2">
            <td align="right" >上传大小：</td>
            <td ><input name="pm_maxsize" type="text"  size="20" maxlength="50" value="<?php echo $conf_pm['up']['maxsize']?>">
            B</td>
          </tr>
          <tr class="tdbg2">
            <td align="right" >上传数量：</td>
            <td ><input name="pm_allownum" type="text"  size="20" maxlength="50" value="<?php echo $conf_pm['up']['allownum']?>">
            0为不限制</td>
          </tr>
          <tr class="tdbg2">
            <td align="right">上传提醒：</td>
            <td><input name="pm_text" type="text"  size="40" maxlength="50" value="<?php echo $conf_pm['up']['text']?>"></td>
          </tr>
          <tr class="tdbg2">
            <td align="right" valign="top" >缩&nbsp; 略&nbsp; 图：</td>
            <td>
              <input name="pm_sm" type="radio" class="radio"  value="true" onclick="disdiv('pm_tb_s')" <?php if ($conf_pm['up']['sm']==true){echo' checked="checked"';}?> >
              是
              <input name="pm_sm" type="radio" class="radio"  value="false" onclick="clodiv('pm_tb_s')" <?php if ($conf_pm['up']['sm']==false){echo' checked="checked"';}?> >
              否 
            <table border="0" cellspacing="0" cellpadding="2" id="pm_tb_s" <?php if ($conf_pm['up']['sm']!=true){echo ' style="display:none;"';}?>>
            <tbody>
            <tr><td colspan="9" style="color:#0000FF;">原图：默认名称为d，列表图：默认名称为空，其他缩略图名称可自取</td></tr>
            <?php
            foreach($conf_pm['sm'] as $k=>$v){
            ?>
                  <tr>
                      <td>名称</td>
                      <td><input name="pm_s_nam[]" type="text" size="8" maxlength="50" value="<?php echo $v['s_nam']?>"></td>
                      <td>类型</td>
                      <td>
                        <select name="pm_s_typ[]" >
                            <option value="true"  <?php if ($v['s_typ']==true){echo' selected="selected"';}?>>固定尺寸</option>
                            <option value="false" <?php if ($v['s_typ']==false){echo' selected="selected"';}?>>不超过尺寸</option>
                        </select>
                      </td>
                      <td>宽度</td>
                      <td><input name="pm_s_wid[]"  type="text" size="8" value="<?php echo $v['s_wid']?>"/></td>
                      <td>高度</td>
                      <td><input name="pm_s_hei[]"  type="text" size="8" value="<?php echo $v['s_hei']?>"/></td>
                  <?php
                  if ($k==0){
                  ?>
                      <td><a class="icon jia" onclick="add_tr(this,'pm')"></a></td>
                  <?php
                  }else{
                  ?>
                      <td><a class="icon jian" onclick="del_tr(this)"></a></td>
                  <?php
                  }
                  ?>
                  </tr>
             <?php
             }
             ?>
              </tbody>
            </table>
            </td>
          </tr>
        </table>
        <?php
        }
		?>
    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 相关信息：</td>
    <td>
        <input name="info" type="radio" class="radio" id="info" value="true" onclick="disdiv('pi')" <?php if ($conf['co']['info']==true){echo' checked="checked"';}?>/>
        使用
        <input name="info" type="radio" class="radio" id="infol2" value="false" onclick="clodiv('pi')" <?php if ($conf['co']['info']==false){echo' checked="checked"';}?>/>
        不使用
		<?php
        //加载多图上传的配置文件
        if($conf_pi=read_config('conf_pi','../')){
        ?>
        <table border="0" cellpadding="2" id="pi" <?php if ($conf['co']['info']!=true){echo' style="display:none;"';}?>>
          <tr class="tdbg2">
            <td align="right">表名：</td>
            <td><input name="pi_table" type="text" size="20" maxlength="50" value="<?php echo $conf_pi['pl']['table']?>"></td>
          </tr>
          <tr class="tdbg2">
            <td align="right">session：</td>
            <td><input name="pi_sesname" type="text" size="20" maxlength="50" value="<?php echo $conf_pi['pl']['sesname']?>"></td>
          </tr>
          <tr class="tdbg2">
            <td align="right">多语言：</td>
            <td>
            <input name="pi_mlang" type="radio" class="radio" value="true" <?php if ($conf_pi['pl']['mlang']==true){echo' checked="checked"';}?> />
            启用
            <input name="pi_mlang" type="radio" class="radio" value="false" <?php if ($conf_pi['pl']['mlang']==false){echo' checked="checked"';}?> />
            不启用
             </td>
          </tr>
          <tr class="tdbg2">
            <td align="right">SEO：</td>
            <td>
            <input name="pi_seo" type="radio" class="radio" value="true" <?php if ($conf_pi['pl']['seo']==true){echo' checked="checked"';}?> />
            使用
            <input name="pi_seo" type="radio" class="radio" value="false" <?php if ($conf_pi['pl']['seo']==false){echo' checked="checked"';}?>/>
            不使用 
            </td>
          </tr>
          <tr class="tdbg2">
            <td align="right">连接地址：</td>
            <td>
            <input name="pi_link_url" type="radio" class="radio" value="true" <?php if ($conf_pi['pl']['link_url']==true){echo' checked="checked"';}?> />
            使用
            <input name="pi_link_url" type="radio" class="radio" value="false" <?php if ($conf_pi['pl']['link_url']==false){echo' checked="checked"';}?>/>
            不使用 
            </td>
          </tr>
          <tr class="tdbg2">
            <td align="right" valign="top">图片上传：</td>
            <td>
            <input name="pi_img_sl" type="radio" class="radio" value="true" onclick="disdiv('pi_tb_i')" <?php if ($conf_pi['pl']['img_sl']==true){echo' checked="checked"';}?> />
            使用
            <input name="pi_img_sl" type="radio" class="radio" value="false" onclick="clodiv('pi_tb_i')" <?php if ($conf_pi['pl']['img_sl']==false){echo' checked="checked"';}?>/>
            不使用 
            <table border="0" cellspacing="0" cellpadding="0" id="pi_tb_i" <?php if ($conf_pi['pl']['img_sl']!=true){echo' style="display:none;"';}?>>
              <tr class="tdbg2">
                <td align="right">上传目录：</td>
                <td><input name="pi_path" type="text" size="20" maxlength="50" value="<?php echo $conf_pi['up']['path']?>"> 放在网站目录下的文件夹</td>
              </tr>
              <tr class="tdbg2">
                <td align="right" >上传大小：</td>
                <td ><input name="pi_maxsize" type="text"  size="20" maxlength="50" value="<?php echo $conf_pi['up']['maxsize']?>">
                B</td>
              </tr>
              <tr class="tdbg2">
                <td align="right">上传提醒：</td>
                <td><input name="pi_text" type="text"  size="40" maxlength="50" value="<?php echo $conf_pi['up']['text']?>"></td>
              </tr>
              <tr class="tdbg2">
                <td align="right" valign="top" >缩&nbsp; 略&nbsp; 图：</td>
                <td>
                  <input name="pi_sm" type="radio" class="radio"  value="true" onclick="disdiv('pi_tb_s')" <?php if ($conf_pi['up']['sm']==true){echo' checked="checked"';}?> >
                  是
                  <input name="pi_sm" type="radio" class="radio"  value="false" onclick="clodiv('pi_tb_s')" <?php if ($conf_pi['up']['sm']==false){echo' checked="checked"';}?> >
                  否 
                <table border="0" cellspacing="0" cellpadding="2" id="pi_tb_s" <?php if ($conf_pi['up']['sm']!=true){echo ' style="display:none;"';}?>>
                <tbody>
                <tr><td colspan="9" style="color:#0000FF;">原图：默认名称为d，列表图：默认名称为空，其他缩略图名称可自取</td></tr>
                <?php
                foreach($conf_pi['sm'] as $k=>$v){
                ?>
                      <tr>
                          <td>名称</td>
                          <td><input name="pi_s_nam[]" type="text" size="8" maxlength="50" value="<?php echo $v['s_nam']?>"></td>
                          <td>类型</td>
                          <td>
                            <select name="pi_s_typ[]" >
                                <option value="true"  <?php if ($v['s_typ']==true){echo' selected="selected"';}?>>固定尺寸</option>
                                <option value="false" <?php if ($v['s_typ']==false){echo' selected="selected"';}?>>不超过尺寸</option>
                            </select>
                          </td>
                          <td>宽度</td>
                          <td><input name="pi_s_wid[]"  type="text" size="8" value="<?php echo $v['s_wid']?>"/></td>
                          <td>高度</td>
                          <td><input name="pi_s_hei[]"  type="text" size="8" value="<?php echo $v['s_hei']?>"/></td>
					  <?php
                      if ($k==0){
                      ?>
                          <td><a class="icon jia" onclick="add_tr(this,'pi')"></a></td>
                      <?php
                      }else{
                      ?>
                          <td><a class="icon jian" onclick="del_tr(this)"></a></td>
                      <?php
                      }
                      ?>
                      </tr>
                 <?php
                 }
                 ?>
                  </tbody>
                </table>
                </td>
              </tr>
            </table>
            </td>
          </tr>
        </table>
        <?php
        }
		?>
    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 相关文件：</td>
    <td>
        <input name="file" type="radio" class="radio" id="file" value="true" onclick="disdiv('pf')" <?php if ($conf['co']['file']==true){echo' checked="checked"';}?> />
        使用
        <input name="file" type="radio" class="radio" id="file2" value="false" onclick="clodiv('pf')" <?php if ($conf['co']['file']==false){echo' checked="checked"';}?>/>
        不使用
		<?php
        //加载多图上传的配置文件
        if($conf_pf=read_config('conf_pf','../')){
        ?>
        <table border="0" cellpadding="2" id="pf" <?php if ($conf['co']['file']!=true){echo' style="display:none;"';}?>>
          <tr class="tdbg2">
            <td align="right">表名：</td>
            <td><input name="pf_table" type="text" size="20" maxlength="50" value="<?php echo $conf_pf['pl']['table']?>"></td>
          </tr>
          <tr class="tdbg2">
            <td align="right">session：</td>
            <td><input name="pf_sesname" type="text" size="20" maxlength="50" value="<?php echo $conf_pf['pl']['sesname']?>"></td>
          </tr>
          <tr class="tdbg2">
            <td align="right">多语言：</td>
            <td>
            <input name="pf_mlang" type="radio" class="radio" value="true" <?php if ($conf_pf['pl']['mlang']==true){echo' checked="checked"';}?> />
            启用
            <input name="pf_mlang" type="radio" class="radio" value="false" <?php if ($conf_pf['pl']['mlang']==false){echo' checked="checked"';}?> />
            不启用
             </td>
          </tr>
          <tr class="tdbg2">
            <td align="right">SEO：</td>
            <td>
            <input name="pf_seo" type="radio" class="radio" value="true" <?php if ($conf_pf['pl']['seo']==true){echo' checked="checked"';}?> />
            使用
            <input name="pf_seo" type="radio" class="radio" value="false" <?php if ($conf_pf['pl']['seo']==false){echo' checked="checked"';}?>/>
            不使用 
            </td>
          </tr>
          <tr class="tdbg2">
            <td align="right">连接地址：</td>
            <td>
            <input name="pf_link_url" type="radio" class="radio" value="true" <?php if ($conf_pf['pl']['link_url']==true){echo' checked="checked"';}?> />
            使用
            <input name="pf_link_url" type="radio" class="radio" value="false" <?php if ($conf_pf['pl']['link_url']==false){echo' checked="checked"';}?>/>
            不使用 
            </td>
          </tr>
          <tr class="tdbg2">
            <td align="right">详细介绍：</td>
            <td>
            <input name="pf_z_body" type="radio" class="radio" value="true" <?php if ($conf_pf['pl']['z_body']==true){echo' checked="checked"';}?> />
            使用
            <input name="pf_z_body" type="radio" class="radio" value="false" <?php if ($conf_pf['pl']['z_body']==false){echo' checked="checked"';}?>/>
            不使用 
            </td>
          </tr>
          <tr class="tdbg2">
            <td align="right" valign="top">图片上传：</td>
            <td>
            <input name="pf_img_sl" type="radio" class="radio" value="true" onclick="disdiv('pf_tb_i')" <?php if ($conf_pf['pl']['img_sl']==true){echo' checked="checked"';}?> />
            使用
            <input name="pf_img_sl" type="radio" class="radio" value="false" onclick="clodiv('pf_tb_i')" <?php if ($conf_pf['pl']['img_sl']==false){echo' checked="checked"';}?>/>
            不使用 
            <table border="0" cellspacing="0" cellpadding="0" id="pf_tb_i" <?php if ($conf_pf['pl']['img_sl']!=true){echo' style="display:none;"';}?>>
              <tr class="tdbg2">
                <td align="right">上传目录：</td>
                <td><input name="pf_path" type="text" size="20" maxlength="50" value="<?php echo $conf_pf['up']['path']?>"> 放在网站目录下的文件夹</td>
              </tr>
              <tr class="tdbg2">
                <td align="right" >上传大小：</td>
                <td ><input name="pf_maxsize" type="text"  size="20" maxlength="50" value="<?php echo $conf_pf['up']['maxsize']?>">
                B</td>
              </tr>
              <tr class="tdbg2">
                <td align="right">上传提醒：</td>
                <td><input name="pf_text" type="text"  size="40" maxlength="50" value="<?php echo $conf_pf['up']['text']?>"></td>
              </tr>
              <tr class="tdbg2">
                <td align="right" valign="top" >缩&nbsp; 略&nbsp; 图：</td>
                <td>
                  <input name="pf_sm" type="radio" class="radio"  value="true" onclick="disdiv('pf_tb_s')" <?php if ($conf_pf['up']['sm']==true){echo' checked="checked"';}?> >
                  是
                  <input name="pf_sm" type="radio" class="radio"  value="false" onclick="clodiv('pf_tb_s')" <?php if ($conf_pf['up']['sm']==false){echo' checked="checked"';}?> >
                  否 
                <table border="0" cellspacing="0" cellpadding="2" id="pf_tb_s" <?php if ($conf_pf['up']['sm']!=true){echo ' style="display:none;"';}?>>
                <tbody>
                <tr><td colspan="9" style="color:#0000FF;">原图：默认名称为d，列表图：默认名称为空，其他缩略图名称可自取</td></tr>
                <?php
                foreach($conf_pf['sm'] as $k=>$v){
                ?>
                      <tr>
                          <td>名称</td>
                          <td><input name="pf_s_nam[]" type="text" size="8" maxlength="50" value="<?php echo $v['s_nam']?>"></td>
                          <td>类型</td>
                          <td>
                            <select name="pf_s_typ[]" >
                                <option value="true"  <?php if ($v['s_typ']==true){echo' selected="selected"';}?>>固定尺寸</option>
                                <option value="false" <?php if ($v['s_typ']==false){echo' selected="selected"';}?>>不超过尺寸</option>
                            </select>
                          </td>
                          <td>宽度</td>
                          <td><input name="pf_s_wid[]"  type="text" size="8" value="<?php echo $v['s_wid']?>"/></td>
                          <td>高度</td>
                          <td><input name="pf_s_hei[]"  type="text" size="8" value="<?php echo $v['s_hei']?>"/></td>
					  <?php
                      if ($k==0){
                      ?>
                          <td><a class="icon jia" onclick="add_tr(this,'pf')"></a></td>
                      <?php
                      }else{
                      ?>
                          <td><a class="icon jian" onclick="del_tr(this)"></a></td>
                      <?php
                      }
                      ?>
                      </tr>
                 <?php
                 }
                 ?>
                  </tbody>
                </table>
                </td>
              </tr>
            </table>
            </td>
          </tr>
          <tr class="tdbg2">
            <td align="right" valign="top" >文件上传：</td>
            <td >
            <table border="0" cellpadding="0" cellspacing="0">
              <tr class="tdbg2">
                <td align="right">上传目录：</td>
                <td><input name="file_pf_path" type="text" size="20" maxlength="50" value="<?php echo $conf_pf['file']['up']['path']?>"> 放在网站目录下的文件夹</td>
              </tr>
              <tr class="tdbg2">
                <td align="right" >上传大小：</td>
                <td ><input name="file_pf_maxsize" type="text"  size="20" maxlength="50" value="<?php echo $conf_pf['file']['up']['maxsize']?>">
                B</td>
              </tr>
              <tr class="tdbg2">
                <td align="right">上传提醒：</td>
                <td><input name="file_pf_text" type="text"  size="40" maxlength="50" value="<?php echo $conf_pf['file']['up']['text']?>"></td>
              </tr>
              <tr class="tdbg2">
                <td align="right">保留原名：</td>
                <td>
                <input name="file_pf_kname" type="radio" class="radio" value="true"  <?php if ($conf_pf['file']['up']['kname']==true){echo' checked="checked"';}?> />
                保留
                <input name="file_pf_kname" type="radio" class="radio" value="false" <?php if ($conf_pf['file']['up']['kname']==false){echo' checked="checked"';}?>/>
                不保留
                </td>
              </tr>
            </table>            
            </td>
          </tr>
        </table>
        <?php
        }
		?>
    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 相关视频：</td>
    <td>
        <input name="video" type="radio" class="radio" id="video" value="true" onclick="disdiv('pv')" <?php if ($conf['co']['video']==true){echo' checked="checked"';}?>/>
        使用
        <input name="video" type="radio" class="radio" id="video2" value="false" onclick="clodiv('pv')" <?php if ($conf['co']['video']==false){echo' checked="checked"';}?>/>
        不使用
		<?php
        //加载多图上传的配置文件
        if($conf_pv=read_config('conf_pv','../')){
        ?>
        <table border="0" cellpadding="2" id="pv" <?php if ($conf['co']['video']!=true){echo' style="display:none;"';}?>>
          <tr class="tdbg2">
            <td align="right">表名：</td>
            <td><input name="pv_table" type="text" size="20" maxlength="50" value="<?php echo $conf_pv['pl']['table']?>"></td>
          </tr>
          <tr class="tdbg2">
            <td align="right">session：</td>
            <td><input name="pv_sesname" type="text" size="20" maxlength="50" value="<?php echo $conf_pv['pl']['sesname']?>"></td>
          </tr>
          <tr class="tdbg2">
            <td align="right">多语言：</td>
            <td>
            <input name="pv_mlang" type="radio" class="radio" value="true" <?php if ($conf_pv['pl']['mlang']==true){echo' checked="checked"';}?> />
            启用
            <input name="pv_mlang" type="radio" class="radio" value="false" <?php if ($conf_pv['pl']['mlang']==false){echo' checked="checked"';}?> />
            不启用
             </td>
          </tr>
          <tr class="tdbg2">
            <td align="right">SEO：</td>
            <td>
            <input name="pv_seo" type="radio" class="radio" value="true" <?php if ($conf_pv['pl']['seo']==true){echo' checked="checked"';}?> />
            使用
            <input name="pv_seo" type="radio" class="radio" value="false" <?php if ($conf_pv['pl']['seo']==false){echo' checked="checked"';}?>/>
            不使用 
            </td>
          </tr>
          <tr class="tdbg2">
            <td align="right">连接地址：</td>
            <td>
            <input name="pv_link_url" type="radio" class="radio" value="true" <?php if ($conf_pv['pl']['link_url']==true){echo' checked="checked"';}?> />
            使用
            <input name="pv_link_url" type="radio" class="radio" value="false" <?php if ($conf_pv['pl']['link_url']==false){echo' checked="checked"';}?>/>
            不使用 
            </td>
          </tr>
          <tr class="tdbg2">
            <td align="right">详细介绍：</td>
            <td>
            <input name="pv_z_body" type="radio" class="radio" value="true" <?php if ($conf_pv['pl']['z_body']==true){echo' checked="checked"';}?> />
            使用
            <input name="pv_z_body" type="radio" class="radio" value="false" <?php if ($conf_pv['pl']['z_body']==false){echo' checked="checked"';}?>/>
            不使用 
            </td>
          </tr>
          <tr class="tdbg2">
            <td align="right" valign="top">图片上传：</td>
            <td>
            <input name="pv_img_sl" type="radio" class="radio" value="true" onclick="disdiv('pv_tb_i')" <?php if ($conf_pv['pl']['img_sl']==true){echo' checked="checked"';}?> />
            使用
            <input name="pv_img_sl" type="radio" class="radio" value="false" onclick="clodiv('pv_tb_i')" <?php if ($conf_pv['pl']['img_sl']==false){echo' checked="checked"';}?>/>
            不使用 
            <table border="0" cellspacing="0" cellpadding="0" id="pv_tb_i" <?php if ($conf_pv['pl']['img_sl']!=true){echo' style="display:none;"';}?>>
              <tr class="tdbg2">
                <td align="right">上传目录：</td>
                <td><input name="pv_path" type="text" size="20" maxlength="50" value="<?php echo $conf_pv['up']['path']?>"> 放在网站目录下的文件夹</td>
              </tr>
              <tr class="tdbg2">
                <td align="right" >上传大小：</td>
                <td ><input name="pv_maxsize" type="text"  size="20" maxlength="50" value="<?php echo $conf_pv['up']['maxsize']?>">
                B</td>
              </tr>
              <tr class="tdbg2">
                <td align="right">上传提醒：</td>
                <td><input name="pv_text" type="text"  size="40" maxlength="50" value="<?php echo $conf_pv['up']['text']?>"></td>
              </tr>
              <tr class="tdbg2">
                <td align="right" valign="top" >缩&nbsp; 略&nbsp; 图：</td>
                <td>
                  <input name="pv_sm" type="radio" class="radio"  value="true" onclick="disdiv('pv_tb_s')" <?php if ($conf_pv['up']['sm']==true){echo' checked="checked"';}?> >
                  是
                  <input name="pv_sm" type="radio" class="radio"  value="false" onclick="clodiv('pv_tb_s')" <?php if ($conf_pv['up']['sm']==false){echo' checked="checked"';}?> >
                  否 
                <table border="0" cellspacing="0" cellpadding="2" id="pv_tb_s" <?php if ($conf_pv['up']['sm']!=true){echo ' style="display:none;"';}?>>
                <tbody>
                <tr><td colspan="9" style="color:#0000FF;">原图：默认名称为d，列表图：默认名称为空，其他缩略图名称可自取</td></tr>
                <?php
                foreach($conf_pv['sm'] as $k=>$v){
                ?>
                      <tr>
                          <td>名称</td>
                          <td><input name="pv_s_nam[]" type="text" size="8" maxlength="50" value="<?php echo $v['s_nam']?>"></td>
                          <td>类型</td>
                          <td>
                            <select name="pv_s_typ[]" >
                                <option value="true"  <?php if ($v['s_typ']==true){echo' selected="selected"';}?>>固定尺寸</option>
                                <option value="false" <?php if ($v['s_typ']==false){echo' selected="selected"';}?>>不超过尺寸</option>
                            </select>
                          </td>
                          <td>宽度</td>
                          <td><input name="pv_s_wid[]"  type="text" size="8" value="<?php echo $v['s_wid']?>"/></td>
                          <td>高度</td>
                          <td><input name="pv_s_hei[]"  type="text" size="8" value="<?php echo $v['s_hei']?>"/></td>
					  <?php
                      if ($k==0){
                      ?>
                          <td><a class="icon jia" onclick="add_tr(this,'pv')"></a></td>
                      <?php
                      }else{
                      ?>
                          <td><a class="icon jian" onclick="del_tr(this)"></a></td>
                      <?php
                      }
                      ?>
                      </tr>
                 <?php
                 }
                 ?>
                  </tbody>
                </table>
                </td>
              </tr>
            </table>
            </td>
          </tr>
          <tr class="tdbg2">
            <td align="right" valign="top" >视频上传：</td>
            <td >
            <table border="0" cellpadding="0" cellspacing="0">
              <tr class="tdbg2">
                <td align="right">上传目录：</td>
                <td><input name="video_pv_path" type="text" size="20" maxlength="50" value="<?php echo $conf_pv['video']['up']['path']?>"> 放在网站目录下的文件夹</td>
              </tr>
              <tr class="tdbg2">
                <td align="right" >上传大小：</td>
                <td ><input name="video_pv_maxsize" type="text"  size="20" maxlength="50" value="<?php echo $conf_pv['video']['up']['maxsize']?>">
                B</td>
              </tr>
              <tr class="tdbg2">
                <td align="right">上传提醒：</td>
                <td><input name="video_pv_text" type="text"  size="40" maxlength="50" value="<?php echo $conf_pv['video']['up']['text']?>"></td>
              </tr>
            </table>            
            </td>
          </tr>
        </table>
        <?php
        }
		?>
    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 组图上传：</td>
    <td>
        <input name="zu" type="radio" class="radio" id="zu" value="true" onclick="disdiv('pz')" <?php if ($conf['co']['zu']==true){echo' checked="checked"';}?> />
        使用
        <input name="zu" type="radio" class="radio" id="zu2" value="false" onclick="clodiv('pz')" <?php if ($conf['co']['zu']==false){echo' checked="checked"';}?>/>
        不使用
		<?php
        //加载多图上传的配置文件
        if($conf_pz=read_config('conf_pz','../')){
        ?>
        <table border="0" cellpadding="2" id="pz" <?php if ($conf['co']['zu']!=true){echo' style="display:none;"';}?>>
          <tr class="tdbg2">
            <td align="right">表名：</td>
            <td><input name="pz_table" type="text" size="20" maxlength="50" value="<?php echo $conf_pz['pl']['table']?>"></td>
          </tr>
          <tr class="tdbg2">
            <td align="right">session：</td>
            <td><input name="pz_sesname" type="text" size="20" maxlength="50" value="<?php echo $conf_pz['pl']['sesname']?>"></td>
          </tr>
          <tr class="tdbg2">
            <td align="right">多语言：</td>
            <td>
            <input name="pz_mlang" type="radio" class="radio" value="true" <?php if ($conf_pz['pl']['mlang']==true){echo' checked="checked"';}?> />
            启用
            <input name="pz_mlang" type="radio" class="radio" value="false" <?php if ($conf_pz['pl']['mlang']==false){echo' checked="checked"';}?> />
            不启用
             </td>
          </tr>
          <tr class="tdbg2">
            <td align="right">显示标题：</td>
            <td>
            <input name="pz_title" type="radio" class="radio" value="true" <?php if ($conf_pz['pl']['title']==true){echo' checked="checked"';}?> />
            显示
            <input name="pz_title" type="radio" class="radio" value="false" <?php if ($conf_pz['pl']['title']==false){echo' checked="checked"';}?>/>
            不显示 
            </td>
          </tr>
          <tr class="tdbg2">
            <td align="right">显示排序：</td>
            <td>
            <input name="pz_px" type="radio" class="radio" value="true" <?php if ($conf_pz['pl']['px']==true){echo' checked="checked"';}?> />
            显示
            <input name="pz_px" type="radio" class="radio" value="false" <?php if ($conf_pz['pl']['px']==false){echo' checked="checked"';}?>/>
            不显示 
            </td>
          </tr>
          <tr class="tdbg2">
            <td align="right">分组上传目录：</td>
            <td><input name="image_pz_path" type="text" size="20" maxlength="50" value="<?php echo $conf_pz['image']['up']['path']?>"> 放在网站目录下的文件夹</td>
          </tr>
          <tr class="tdbg2">
            <td align="right" >分组上传大小：</td>
            <td ><input name="image_pz_maxsize" type="text"  size="20" maxlength="50" value="<?php echo $conf_pz['image']['up']['maxsize']?>">
            B</td>
          </tr>
          <tr class="tdbg2">
            <td align="right">分组上传提醒：</td>
            <td><input name="image_pz_text" type="text"  size="40" maxlength="50" value="<?php echo $conf_pz['image']['up']['text']?>"></td>
          </tr>
          <tr class="tdbg2">
            <td align="right" valign="top" >分组缩略图：</td>
            <td>
              <input name="image_pz_sm" type="radio" class="radio"  value="true" onclick="disdiv('image_pz_tb_s')" <?php if ($conf_pz['image']['up']['sm']==true){echo' checked="checked"';}?> >
              是
              <input name="image_pz_sm" type="radio" class="radio"  value="false" onclick="clodiv('image_pz_tb_s')" <?php if ($conf_pz['image']['up']['sm']==false){echo' checked="checked"';}?> >
              否 
            <table border="0" cellspacing="0" cellpadding="2" id="image_pz_tb_s" <?php if ($conf_pz['image']['up']['sm']!=true){echo ' style="display:none;"';}?>>
            <tbody>
            <tr><td colspan="9" style="color:#0000FF;">原图：默认名称为d，列表图：默认名称为空，其他缩略图名称可自取</td></tr>
            <?php
            foreach($conf_pz['image']['sm'] as $k=>$v){
            ?>
                  <tr>
                      <td>名称</td>
                      <td><input name="image_pz_s_nam[]" type="text" size="8" maxlength="50" value="<?php echo $v['s_nam']?>"></td>
                      <td>类型</td>
                      <td>
                        <select name="image_pz_s_typ[]" >
                            <option value="true"  <?php if ($v['s_typ']==true){echo' selected="selected"';}?>>固定尺寸</option>
                            <option value="false" <?php if ($v['s_typ']==false){echo' selected="selected"';}?>>不超过尺寸</option>
                        </select>
                      </td>
                      <td>宽度</td>
                      <td><input name="image_pz_s_wid[]"  type="text" size="8" value="<?php echo $v['s_wid']?>"/></td>
                      <td>高度</td>
                      <td><input name="image_pz_s_hei[]"  type="text" size="8" value="<?php echo $v['s_hei']?>"/></td>
					  <?php
                      if ($k==0){
                      ?>
                          <td><a class="icon jia" onclick="add_tr(this,'image_pz')"></a></td>
                      <?php
                      }else{
                      ?>
                          <td><a class="icon jian" onclick="del_tr(this)"></a></td>
                      <?php
                      }
                      ?>
                  </tr>
             <?php
             }
             ?>
            </tbody>
          </table>
         </td>
         </tr>
          <tr class="tdbg2">
            <td align="right">组图上传目录：</td>
            <td><input name="pz_path" type="text" size="20" maxlength="50" value="<?php echo $conf_pz['up']['path']?>"> 放在网站目录下的文件夹</td>
          </tr>
          <tr class="tdbg2">
            <td align="right" >组图上传大小：</td>
            <td ><input name="pz_maxsize" type="text"  size="20" maxlength="50" value="<?php echo $conf_pz['up']['maxsize']?>">
            B</td>
          </tr>
          <tr class="tdbg2">
            <td align="right" >组图上传数量：</td>
            <td ><input name="pz_allownum" type="text"  size="20" maxlength="50" value="<?php echo $conf_pz['up']['allownum']?>">
            0为不限制</td>
          </tr>
          <tr class="tdbg2">
            <td align="right">组图上传提醒：</td>
            <td><input name="pz_text" type="text"  size="40" maxlength="50" value="<?php echo $conf_pz['up']['text']?>"></td>
          </tr>
          <tr class="tdbg2">
            <td align="right" valign="top" >组图缩略图：</td>
            <td>
              <input name="pz_sm" type="radio" class="radio"  value="true" onclick="disdiv('pz_tb_s')" <?php if ($conf_pz['up']['sm']==true){echo' checked="checked"';}?> >
              是
              <input name="pz_sm" type="radio" class="radio"  value="false" onclick="clodiv('pz_tb_s')" <?php if ($conf_pz['up']['sm']==false){echo' checked="checked"';}?> >
              否 
            <table border="0" cellspacing="0" cellpadding="2" id="pz_tb_s" <?php if ($conf_pz['up']['sm']!=true){echo ' style="display:none;"';}?>>
            <tbody>
            <tr><td colspan="9" style="color:#0000FF;">原图：默认名称为d，列表图：默认名称为空，其他缩略图名称可自取</td></tr>
            <?php
            foreach($conf_pz['sm'] as $k=>$v){
            ?>
                  <tr>
                      <td>名称</td>
                      <td><input name="pz_s_nam[]" type="text" size="8" maxlength="50" value="<?php echo $v['s_nam']?>"></td>
                      <td>类型</td>
                      <td>
                        <select name="pz_s_typ[]" >
                            <option value="true"  <?php if ($v['s_typ']==true){echo' selected="selected"';}?>>固定尺寸</option>
                            <option value="false" <?php if ($v['s_typ']==false){echo' selected="selected"';}?>>不超过尺寸</option>
                        </select>
                      </td>
                      <td>宽度</td>
                      <td><input name="pz_s_wid[]"  type="text" size="8" value="<?php echo $v['s_wid']?>"/></td>
                      <td>高度</td>
                      <td><input name="pz_s_hei[]"  type="text" size="8" value="<?php echo $v['s_hei']?>"/></td>
					  <?php
                      if ($k==0){
                      ?>
                          <td><a class="icon jia" onclick="add_tr(this,'pz')"></a></td>
                      <?php
                      }else{
                      ?>
                          <td><a class="icon jian" onclick="del_tr(this)"></a></td>
                      <?php
                      }
                      ?>
                  </tr>
             <?php
             }
             ?>
              </tbody>
            </table>
            </td>
          </tr>
        </table>
        <?php
        }
		?>
    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否使用 发布时间：</td>
    <td>
        <input name="wtime" type="radio" class="radio" id="wtime" value="true" <?php if ($conf['co']['wtime']==true){echo' checked="checked"';}?> />
        使用
        <input name="wtime" type="radio" class="radio" id="wtime2" value="false" <?php if ($conf['co']['wtime']==false){echo' checked="checked"';}?>/>
        不使用    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否显示 信息属性：</td>
    <td>
        <input name="con_att" type="radio" class="radio" id="con_att" value="true"  <?php if ($conf['co']['con_att']==true){echo' checked="checked"';}?> />
        显示
        <input name="con_att" type="radio" class="radio" id="con_att2" value="false" <?php if ($conf['co']['con_att']==false){echo' checked="checked"';}?> />
        不显示    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否显示 置顶按钮：</td>
    <td>
        <input name="ding" type="radio" class="radio" id="ding" value="true" <?php if ($conf['co']['ding']==true){echo' checked="checked"';}?> />
        显示
        <input name="ding" type="radio" class="radio" id="ding2" value="false" <?php if ($conf['co']['ding']==false){echo' checked="checked"';}?>/>
        不显示    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否显示 推荐按钮：</td>
    <td>
        <input name="tuijian" type="radio" class="radio" id="tuijian" value="true" <?php if ($conf['co']['tuijian']==true){echo' checked="checked"';}?> />
        显示
        <input name="tuijian" type="radio" class="radio" id="tuijian2" value="false" <?php if ($conf['co']['tuijian']==false){echo' checked="checked"';}?>/>
        不显示    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否显示 热门按钮：</td>
    <td>
        <input name="hot" type="radio" class="radio" id="hot" value="true" <?php if ($conf['co']['hot']==true){echo' checked="checked"';}?> />
        显示
        <input name="hot" type="radio" class="radio" id="hot2" value="false" <?php if ($conf['co']['hot']==false){echo' checked="checked"';}?>/>
        不显示    </td>
  </tr>
  <tr class="tdbg">
    <td align="right">是否显示 屏蔽按钮：</td>
    <td>
        <input name="pass" type="radio" class="radio" id="pass" value="true" <?php if ($conf['co']['pass']==true){echo' checked="checked"';}?> />
        显示
        <input name="pass" type="radio" class="radio" id="pass2" value="false" <?php if ($conf['co']['pass']==false){echo' checked="checked"';}?>/>
        不显示    </td>
  </tr>
</table>
</div>


<table width="100%" border="0" cellspacing="1" cellpadding="2" style="margin-top:3px;">
  <tr>
    <td width="180">&nbsp;</td>
    <td><input type="submit" name="Submit" value=" 保 存 " class="btn"></td>
  </tr>
</table>
</FORM>

<script>
function add_tr(obj,name){
	str ='<tr>';
	str+='<td>名称</td>';
	str+='<td><input name="'+name+'_s_nam[]" type="text" size="8" maxlength="50" value=""></td>';
	str+='<td>类型</td>';
	str+='<td>';
	str+='<select name="'+name+'_s_typ[]" >';
	str+='<option value="true">固定尺寸</option>';
	str+='<option value="false" selected="selected">不超过尺寸</option>';
	str+='</select>';
	str+='</td>';
	str+='<td>宽度</td>';
	str+='<td><input name="'+name+'_s_wid[]"  type="text" size="8"/></td>';
	str+='<td>高度</td>';
	str+='<td><input name="'+name+'_s_hei[]"  type="text" size="8"/></td>';
	str+='<td><a class="icon jian" onclick="del_tr(this)"></a></td>';
	str+='</tr>';
	$(obj).parent().parent().parent().append(str);
}

function del_tr(obj){
	$(obj).parent().parent().remove();
}

function setdiv(tit_obj,con_obj){
	$('.tit').removeClass('cur');
	$('#'+tit_obj).addClass('cur');
	$('.con').css('display','none');
	$('#'+con_obj).css('display','');
}

function disdiv(tit_obj){
	$('#'+tit_obj).css('display','');
}
function clodiv(tit_obj){
	$('#'+tit_obj).css('display','none');
}
</script>
<?php
}
?>
</body>
</html>
