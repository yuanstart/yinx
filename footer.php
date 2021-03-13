<!-- footer start -->

	<!-- 灰色横条 -->
<?php $arr = getzlrs('tol_co' , 2); ?>

<div id="comm_layout_footer" class="layout  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">

                <div class="view_contents">

                                <div id="text_style_01_1575602059365" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">

                <div names="text" class="view_contents">

                    <a href="http://baidu.com" target="" style="color:inherit" class="editor-view-extend link-type-3-"><?php echo $arr['f_body'] ?></div></a>

                </div>

            </div>
<?php $twocode = getzlrss('tol_co' , 5 , false); ?>

<div id="div_a_includeBlock_1578304240250" class="view a_includeBlock div  none includeView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
    <div names="div" class="view_contents">


<?php foreach ($twocode as $key => $value): ?>
    <?php if ($key == 0){ ?>
        <?php $id_1 = 'text_style_01_1578304240487'; ?>
        <?php $id_2 = 'image_style_01_1578304752776'; ?>
    <?php }else{ ?>
        <?php $id_1 = 'text_style_01_1578304868358'; ?>
        <?php $id_2 = 'image_style_01_1578304855901'; ?>
    <?php }?>
        <div id="<?php echo $id_1 ?>" class="view style_01 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
            <div names="text" class="view_contents"><?php echo $value['title'] ?></div>
        </div>

        <div id="<?php echo $id_2 ?>" class="view style_01 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">
            <div names="image" class="view_contents">
                <div class="imgStyle CompatibleImg picSet">
                    <img class="link-type-" src="<?php echo $value['img_sl'] ?>" title="" alt="描述" id="imageModeShow">
                </div>
            </div>
        </div>
<?php endforeach ?>
    </div>
</div>






<style>

    #image_style_01_1578304752776 .CompatibleImg img{width:auto; height:100%; position:relative; top:0; left:50%;-webkit-transform:translate(-50%,0);-o-transform:translate(-50%,0);-moz-transform:translate(-50%,0);-ms-transform:translate(-50%,0);transform:translate(-50%,0);}@media screen and (min-width:641px) and (max-width:1200px) {#image_style_01_1578304752776 .CompatibleImg img{width:auto; height:100%; position:relative; top:0; left:50%;-webkit-transform:translate(-50%,0);-o-transform:translate(-50%,0);-moz-transform:translate(-50%,0);-ms-transform:translate(-50%,0);transform:translate(-50%,0);}}@media screen and (max-width:640px) {#image_style_01_1578304752776 .CompatibleImg img{width:100%; height:100%}}</style>

<style>

#image_style_01_1578304752776 a{

    cursor: default;

}

</style>

<style>

.imgStyle { height:100%; width:100%; overflow: hidden; box-sizing: border-box;}

.imgStyle>a{overflow: hidden; width: 100%; height: 100%;}

.imgStyle img{box-sizing: border-box;}

</style>

<!-- 新加的js  -->

<style>

    #image_style_01_1578304855901 .CompatibleImg img{width:auto; height:100%; position:relative; top:0; left:50%;-webkit-transform:translate(-50%,0);-o-transform:translate(-50%,0);-moz-transform:translate(-50%,0);-ms-transform:translate(-50%,0);transform:translate(-50%,0);}@media screen and (min-width:641px) and (max-width:1200px) {#image_style_01_1578304855901 .CompatibleImg img{width:auto; height:100%; position:relative; top:0; left:50%;-webkit-transform:translate(-50%,0);-o-transform:translate(-50%,0);-moz-transform:translate(-50%,0);-ms-transform:translate(-50%,0);transform:translate(-50%,0);}}@media screen and (max-width:640px) {#image_style_01_1578304855901 .CompatibleImg img{width:100%; height:100%}}</style>

<style>

#image_style_01_1578304855901 a{

    cursor: default;

}

</style>

<style>

.imgStyle { height:100%; width:100%; overflow: hidden; box-sizing: border-box;}

.imgStyle>a{overflow: hidden; width: 100%; height: 100%;}

.imgStyle img{box-sizing: border-box;}

</style>

<!-- 新加的js  -->




                    <div id="qqol_style_01_1575620923404" class="view style_01 qqol  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">

                <div names="qqol" class="view_contents">



<div class="online-service online-template online-service-style01" style="display: none;">

    <div class="wrapper">

        <div class="close">×</div>

    </div>

    <div class="button">

        <div><img style="margin-bottom: 1px; width: 12px;" alt="<" src="img/member-1-white.png">在线客服<img style="margin-top: 3px; width: 12px;" alt="<" src="img/links-6-white-rev.png"></div>

    </div>

</div>



<script>

    //购物车

    if(typeof showcart !== 'function'){

        function showcart(){

            var langid = 0;

            if (langid==0 && BodyIsFt) langid = 1;

            if(window.screen.width<767 || ($('body').width() > 0 && $('body').width() < 767)){

            location.href = "//admin.mifwl.com/exusers/u_cart.php?idweb=58999&act=show&lang="+langid+"&ismobile=1";

            }else{

            document.getElementById("boxName").innerHTML="查看购物车";

            if(document.getElementById("boxClose")) document.getElementById("boxClose").innerHTML="×";

            document.getElementById("showiframe").src="//admin.mifwl.com/exusers/u_cart.php?idweb=58999&act=show&lang="+langid+"&v=9";

            box.Show({width:'1000px', height:'600px'});

            }

        }

    }

    //判断是否是手机,用于处理QQ电脑端及手机端链接不一致问题

    var mobile_flag = isMobile();

    if(mobile_flag){

                    $('#qqol_style_01_1575620923404 .qq-btn-pc').hide();

            $('#qqol_style_01_1575620923404 .qq-btn-mobile').show();

            }

    function isMobile() {

      var userAgentInfo = navigator.userAgent;

      var mobileAgents = [ "Android", "iPhone", "SymbianOS", "Windows Phone", "iPad","iPod"];

      var mobile_flag = false;

      //根据userAgent判断是否是手机

      for (var v = 0; v < mobileAgents.length; v++) {

          if (userAgentInfo.indexOf(mobileAgents[v]) > 0) {

              mobile_flag = true;

              break;

          }

      }

      var screen_width = window.screen.width;

      var screen_height = window.screen.height;

       //根据屏幕分辨率判断是否是手机

       if(screen_width < 500 && screen_height < 800){

           mobile_flag = true;

      }

      return mobile_flag;

    }

</script>               </div>

            </div>

                    <div id="button_style_04_1578627329765" class="view style_04 button  none lockHeightView" data-wow-duration="2s" data-wow-delay="0.25s" data-wow-offset="0" data-wow-iteration="1">

                <div names="button" class="view_contents">

                    <style>.button_default04 { width: 100%; height:40px; background: #ffd9e4; color: #000;border-width: 0px; box-sizing: border-box; border-radius: 40px; font-size: 14px; cursor: pointer; transition: all ease-in .1s; -webkit-transition: all ease-in .1s; -moz-transition: all ease-in .1s; -o-transition: all ease-in .1s; }</style><script>function btnTop(){$("html,body").animate({scrollTop:"0px"},1000);}function btnBottom(){var bodyH = $("html,body").height();$("html,body").animate({scrollTop:bodyH},1000);}</script><button type="button" class="button_default04  btnaSet" onclick="btnTop();">返回顶部</button>

<style>

    #button_style_04_1578627329765 .button_default .buttonImg {width:auto; height:100%; position:relative; top:0; left:50%;-webkit-transform:translate(-50%,0);-o-transform:translate(-50%,0);-moz-transform:translate(-50%,0);-ms-transform:translate(-50%,0);transform:translate(-50%,0);}@media screen and (min-width:641px) and (max-width:1200px) {#button_style_04_1578627329765 .button_default .buttonImg {width:auto; height:100%; position:relative; top:0; left:50%;-webkit-transform:translate(-50%,0);-o-transform:translate(-50%,0);-moz-transform:translate(-50%,0);-ms-transform:translate(-50%,0);transform:translate(-50%,0);}}@media screen and (max-width:640px) {#button_style_04_1578627329765 .button_default .buttonImg {width:auto; height:100%; position:relative; top:0; left:50%;-webkit-transform:translate(-50%,0);-o-transform:translate(-50%,0);-moz-transform:translate(-50%,0);-ms-transform:translate(-50%,0);transform:translate(-50%,0);}}</style>

<script type="text/javascript">

    if(typeof showcart !== 'function'){

        function showcart(){

            if(window.screen.width<767 || ($('body').width() > 0 && $('body').width() < 767)){

                location.href = "//admin.mifwl.com/exusers/u_cart.php?idweb=58999&act=show&lang=0&v=9";

            }else{

                document.getElementById("boxName").innerHTML="";

                if(document.getElementById("boxClose")) document.getElementById("boxClose").innerHTML="×";

                document.getElementById("showiframe").src="//admin.mifwl.com/exusers/u_cart.php?idweb=58999&act=show&lang=0&v=9";

                box.Show({width:'1000px', height:'600px'});

            }

        }

    }

</script>               </div>

            </div>



                    <div id="image_logo_1613884536975" class="view logo image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">

                <div names="image" class="view_contents">

                    <style>.logoStyle *{box-sizing: border-box;}</style><div class="logoStyle modSet">

<a href="" target="_self"><img class="imgSet" src="img/logo58999.png" title="" alt="" style="width:100%; height:auto"></a>

</div><style>

.logoStyle { height:100%; width:100%; overflow: hidden; box-sizing: border-box;}

.logoStyle>a{overflow: hidden; width: 100%;height: 100%; display: block;}

.logoName{white-space: nowrap;}

/* position: relative;top: 50%; transform: translateY(-50%); -webkit-transform: translateY(-50%); float: right;*/

</style>                </div>

            </div>

                    <div id="dh_style_03_1613884651125" class="view style_03 dh  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">

                <div names="dh" class="view_contents">

                    <style>.menuStyle_3 {position: relative; width: 100%; height: 100%;}

.menuStyle_3 *{transition:all ease .3s; -webkit-transition:all ease .3s; -moz-transition:all ease .3s; -o-transition:all ease .3s; box-sizing: border-box;}

.menuStyle_3 .ddsmoothmenu-v {display:block}

.menuStyle_3 .ddsmoothmenu-v ul{ background: #414141;}

.menuStyle_3 .ddsmoothmenu-v ul li { line-height: 36px; height: 36px; border-bottom: 1px solid #333; border-right: 1px solid #333;color: white;}

.menuStyle_3 .ddsmoothmenu-v ul li:hover {background:#000;}

.menuStyle_3 .menuLi01 { position: relative;}

.menuStyle_3 .menuLi01:hover .menuUl02{display:block;}

.menuStyle_3 .menuLi01 a { display:block; color: inherit;  padding-left: 15px; padding-right: 15px;}

.menuStyle_3 .menuUl02 { display:none; position: absolute; left: 100%; top: 0; white-space: nowrap;}

.menuStyle_3 #hot>a{background:#ffcc00;}

.menuStyle_3 .mobi_top { display:none; width: 100%; height: 32px; position: relative; cursor: pointer; font-size:40px;}

.menuStyle_3 .icoFont { position: absolute; top: calc(50% - 2px); left: 0%; transform: translateY(-50%); -webkit-transform: translateY(-50%); -ms-transform: translateY(-50%); -moz-transform: translateY(-50%); -o-transform: translateY(-50%);}

.menuStyle_3 .header_nav { width: 100%; height: calc(100% - 40px); overflow: hidden;}

.menuStyle_3 .header_nav li { position: relative; line-height: 180%; color: #fff;}

.menuStyle_3 .header_nav li a { color: inherit; display: block; padding: 15px;}

.menuStyle_3 .header_scroll { overflow-y: scroll; height: 100%; width: calc(100% + 17px);}

.menuStyle_3 .mobi_title { height: 40px; line-height: 40px; border-bottom: 1px solid #333; color: #fff; text-align: center; overflow: hidden;}

.menuStyle_3 .m_icoFont { width:50px; height: 100%; display: block; float: right; border-left: 1px solid #333; cursor: pointer; font-size: 22px;}

.menuStyle_3 .mobi_main { display:none; position: fixed; left: 0; top: 0; background: #414141; width: 100vw; height: 100vh; z-index: 999;}

.menuStyle_3 .mobi_border { position: relative; border-bottom: 1px solid #333; line-height: 120%;}

.menuStyle_3 .mobi_more { position: absolute; top: 0; right: 17px; width: 50px; height: 100%; color: #fff; border-left: 1px solid #333; cursor: pointer; text-align: center;}

.menuStyle_3 .mobi_add { display: block; font-size: 22px; position: relative; top: 50%; transform: translateY(-50%); -webkit-transform: translateY(-50%); -ms-transform: translateY(-50%); -moz-transform: translateY(-50%); -o-transform: translateY(-50%);}

.menuStyle_3 .mobi_menuLi02 .mobi_border { padding-left: 30px;}

.menuStyle_3 .mobi_menuUl02 { display: none;}

</style>

<div class="menuStyle_3">

    <div class="ddsmoothmenu-v">

      <ul class="menuUl01 columnSet">

        <li id="hot" class="menuLi01 mainMenuSet">

        <a href="index.php">首页</a>

        </li>

        <li class="menuLi01 mainMenuSet">

        <a href="about.php">公司概况</a>

        </li>

        <li class="menuLi01 mainMenuSet">

        <a href="product.php">产品中心</a>

        </li>

        <!-- <li class="menuLi01 mainMenuSet">

        <a href="/sysTools.php?mod=diy&amp;act=preview&amp;&amp;pageid=2056139&amp;">业务领域</a>

        </li> -->

        <li class="menuLi01 mainMenuSet">

        <a href="case.php">工程案例</a>

        </li>

        <li class="menuLi01 mainMenuSet">

        <a href="news.php">新闻动态</a>

        </li>

        <li class="menuLi01 mainMenuSet">

        <a href="human.php">人力资源</a>

        </li>

      </ul>

    </div>

    <div class="mobi_top" onclick="setDhListen('style_03',this,'mobi_top')">

        <i class="icoFont">=</i>

    </div>

    <div class="mobi_main">

        <div class="mobi_title"><i class="m_icoFont" onclick="setDhListen('style_03',this,'m_icoFont')">×</i></div>

        <div class="header_nav">

            <div class="header_scroll">

            <ul class="mobi_menuUl01">

                <li class="mobi_menuLi01">

                <div class="mobi_border"><a href="index.php">首页</a>

                </div></li>

                <li class="mobi_menuLi01">

                <div class="mobi_border"><a href="about.php">公司概况</a>

                </div></li>

                <li class="mobi_menuLi01">

                <div class="mobi_border"><a href="product.php">产品中心</a>

                </div></li>

<!--                 <li class="mobi_menuLi01">

                <div class="mobi_border"><a href="/sysTools.php?mod=diy&amp;act=preview&amp;&amp;pageid=2056139&amp;">业务领域</a>

                </div></li> -->

                <li class="mobi_menuLi01">

                <div class="mobi_border"><a href="case.php">工程案例</a>

                </div></li>

                <li class="mobi_menuLi01">

                <div class="mobi_border"><a href="news.php">新闻动态</a>

                </div></li>

                <li class="mobi_menuLi01">

                <div class="mobi_border"><a href="human.php">人力资源</a>

                </div></li>

            </ul>

            </div>

        </div>

    </div>

</div>

<!-- 菜单区域 End-->

<!-- 导航栏目有下级时禁止跳转 -->

<script>

/*pc,手机显示隐藏*/

function is_mobile(){

    return window.screen.width<767 || ($('body').width() > 0 && $('body').width() < 767);

}

$(function(){

    $("#dh_style_03_1613884651125 li").each(function(){

          });

})

</script>

<!-- 二级菜单宽度自适应 -->

<style type="text/css">

#dh_style_03_1613884651125 .menuUl02 .subMenu02>a .fa{position: absolute;top: 0;right: 0;}

</style>

<style type="text/css">

@media screen and (max-width:640px) {

    .menuStyle_3 .ddsmoothmenu-v {display:none;}

    .menuStyle_3 .mobi_top {display:block;}

}

</style>

                </div>

            </div>

                    <div id="text_style_02_1613884697794" class="view style_02 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">

                <div names="text" class="view_contents">

                    <?php echo $arr['z_body'] ?>

                </div>

            </div>

                    <div id="image_style_01_1613884465402" class="view style_01 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">

                <div names="image" class="view_contents">

                    <style></style><div class="imgStyle CompatibleImg picSet">

            <img class="link-type-" src="img/7c3681ea1c7654a673d25055d5e7bfa2.png" title="" alt="描述" id="imageModeShow">

</div><style>

    #image_style_01_1613884465402 .CompatibleImg img{width:auto; height:100%; position:relative; top:0; left:50%;-webkit-transform:translate(-50%,0);-o-transform:translate(-50%,0);-moz-transform:translate(-50%,0);-ms-transform:translate(-50%,0);transform:translate(-50%,0);}@media screen and (min-width:641px) and (max-width:1200px) {#image_style_01_1613884465402 .CompatibleImg img{null}}@media screen and (max-width:640px) {#image_style_01_1613884465402 .CompatibleImg img{null}}</style>

<style>

#image_style_01_1613884465402 a{

    cursor: default;

}

</style>

<style>

.imgStyle { height:100%; width:100%; overflow: hidden; box-sizing: border-box;}

.imgStyle>a{overflow: hidden; width: 100%; height: 100%;}

.imgStyle img{box-sizing: border-box;}

</style>

<!-- 新加的js  -->

                </div>

            </div>

                    <div id="image_style_01_1613884465399" class="view style_01 image  none" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">

                <div names="image" class="view_contents">

                    <style></style><div class="imgStyle CompatibleImg picSet">

            <img class="link-type-" src="img/8b8d0c78bde65e37200ccc6b66c4c9de.png" title="" alt="描述" id="imageModeShow">

</div><style>

    #image_style_01_1613884465399 .CompatibleImg img{width:auto; height:100%; position:relative; top:0; left:50%;-webkit-transform:translate(-50%,0);-o-transform:translate(-50%,0);-moz-transform:translate(-50%,0);-ms-transform:translate(-50%,0);transform:translate(-50%,0);}@media screen and (min-width:641px) and (max-width:1200px) {#image_style_01_1613884465399 .CompatibleImg img{width:auto; height:100%; position:relative; top:0; left:50%;-webkit-transform:translate(-50%,0);-o-transform:translate(-50%,0);-moz-transform:translate(-50%,0);-ms-transform:translate(-50%,0);transform:translate(-50%,0);}}@media screen and (max-width:640px) {#image_style_01_1613884465399 .CompatibleImg img{width:auto; height:100%; position:relative; top:0; left:50%;-webkit-transform:translate(-50%,0);-o-transform:translate(-50%,0);-moz-transform:translate(-50%,0);-ms-transform:translate(-50%,0);transform:translate(-50%,0);}}</style>

<style>

#image_style_01_1613884465399 a{

    cursor: default;

}

</style>

<style>

.imgStyle { height:100%; width:100%; overflow: hidden; box-sizing: border-box;}

.imgStyle>a{overflow: hidden; width: 100%; height: 100%;}

.imgStyle img{box-sizing: border-box;}

</style>

<!-- 新加的js  -->

                </div>

            </div>
<?php $arr = getplrss('' , 2 , 'pl_info' , 1); ?>

<?php foreach ($arr as $key => $value): ?>
    <?php if ($key == 0){ ?>
        <?php $id = 'text_style_02_1613884465404'; ?>
    <?php }else{ ?>
        <?php $id = 'text_style_02_1613884465396'; ?>
    <?php }?>
                    <div id="<?php echo $id ?>" class="view style_02 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">

                <div names="text" class="view_contents">
                    <?php echo $value['title'] ?>：
                    <?php echo $value['z_body'] ?>

                </div>

            </div>
<?php endforeach ?>

<!--                     <div id="text_style_02_1613884465396" class="view style_02 text  none lockHeightView" data-wow-duration="0s" data-wow-delay="0s" data-wow-offset="0" data-wow-iteration="1">

                <div names="text" class="view_contents">

                    Email：yimin@mail.com

                </div>

            </div> -->



                        </div>

            </div>

<script>
/*
 * ***************************************************************
 * 片段列表类
 */
function FragmentList(config) {
    this._default = {
        'prefix':'fragment-',
        'css':{}
    };
    config = $.extend(true, this._default, config);
    this.config = config;
    this.list = [];
    this.object = $('<div></div>');
    // 执行配置
    this.init(config);
}
/*
 * 初始化
 */
FragmentList.prototype.init = function(config) {
    config.css && this.object.css(config.css);
};
/*
 * 添加
 */
FragmentList.prototype.append = function (fragment) {
    this.list.push(fragment);
};
/*
 * 获取jquery对象
 */
FragmentList.prototype.get = function () {
    this.object.addClass(this.config.prefix + 'list').children().remove();
    for(var i = 0, len = this.list.length, html = ''; i < len; ++i) {
        html += this.list[i].html();
    }
    return this.object.html(html);
};
/*
 * 输出
 */
FragmentList.prototype.html = function () {
    return this.get().prop('outerHTML');
};
/*
 * ***************************************************************
 * 片段类
 */
Fragment.prototype.prefix = 'fragment-';
function Fragment(config) {
    (!config.init || Util.prototype.type(config.init) != 'function') && (config.init = function () {});
    !config.html && (config.html = '<div></div>');
    this._default = {
        'name':'item'
    };
    config = $.extend(true, this._default, config);
    // 创建jquery对象
    config.data && (config.html = Util.prototype.replace(config.html, Util.prototype.toArray(config.data)));
    this.object = $(config.html).addClass((config.name != 'item' ? this.prefix + 'item': '') + ' ' + this.prefix + config.name);
    config.init(this.object);
    delete config.html; // jquery对象创建后, config.html 不再使用
    this.config = config;
    // 执行配置
    this.init(config);
}
/*
 * 复制
 */
Fragment.prototype.clone = function () {
    return new Fragment($.extend(true, {}, this.config));
};
/*
 * 初始化
 */
Fragment.prototype.init = function(config) {
    config.css && this.object.css(config.css);
};
/*
 * 修改样式
 */
Fragment.prototype.css = function(css) {
    css && this.object.css(css);
    return this;
};
/*
 * 输出
 */
Fragment.prototype.html = function () {
    return this.object.prop('outerHTML');
};
/*
 * 使用指定数据更新自己
 */
Fragment.prototype.data = function (data) {
    this.object.html(Util.prototype.replace(this.html(), Util.prototype.toArray(data)));
    return this;
};
/*
 * ***************************************************************
 * 边栏类
 */
function Sidebar(config) {
    this._default = {
        // 默认配置, 常量, 不应该修改, 对象初始化时可覆盖
        'template':'sidebar',
        'expand':true,    // 默认展开还是隐藏
        'css':undefined,
        'main':{'width':'120px', 'position':'right'},
        'border':{'width':'1px', 'color':'#ccc', 'radius':'2px'},
        'button':{'width':'26px', 'color':'#333', 'font-size':'12px', 'background-color':'#ececec', 'radius':'5px'},
        'close':{'hide':false, 'height':'25px', 'font-size':'12px', 'padding':'0 .6em 0 .3em'},
        'show':{'start':undefined, 'end':undefined},   // 显示开始和结束时要执行的函数
        'end':{'start':undefined, 'end':undefined}   // 隐藏开始和结束时要执行的函数
    };
    config = $.extend(true, this._default, config);
    this.config = config;
    // dom 结构
    var temp = $('.'+config.template+':first');
    temp.hide();
    this.main = temp.clone().removeClass(config.template).show();
    this.main.data('instance', this);    // dom 结构的 data 中保存类对象
    config.css && this.main.addClass(config.css);
    // 主要属性
    this.width = config.main.width;
    this.position = config.main.position;
    this.main.addClass(this.position);
    this.position_rev = this.position == 'right' ? 'left' : 'right';
    this.wrapper = this.main.children('.wrapper');
    this._close = this.wrapper.children('.close');
    this.button = this.main.children('.button');
    // 子元素的 dom 结构的 data 中保存类对象
    this._close.data('parent', this);
    this.button.data('parent', this);
    // 执行配置
    this.init(config);
}
/*
 * 初始化
 */
Sidebar.prototype.init = function(config) {
    this.initMain();
    this.initWrapper(config);
    this.initButton(config);
    // 垂直居中后, 移动到body最后
    this.verticalCenter().appendTo('body');
    config.expand ? this.show(false) : this.hide(false);
    this.main.show();
    // 存储所有的对象到window中 (后期会使用)
    !window.online_service_list && (window.online_service_list = []);
    window.online_service_list.push(this);
    $(window).resize(this.onWindowResize);
};
/*
 * 初始化 - main
 */
Sidebar.prototype.initMain = function() {
    this.main.hide().css({
        'height':'auto',
        'position':'fixed',
        'z-index':'100000000',
        'top':'0px',
        'width':this.width
    });
    this.main.css(this.position, '0px');
    // 移入移出时
    this.main.hover(
        function () {
            $(this).data('instance').show();
        },
        function () {
            if(!$(this).hasClass('animate-showing')) {
                $(this).data('instance').hide();
            }
        }
    );
};
/*
 * 初始化 - wrapper
 */
Sidebar.prototype.initWrapper = function(config) {
    this.wrapper.css({
        'border': config.border.width +' solid ' + config.border.color,
        'border-radius':config.border.radius,
        '-moz-border-radius':config.border.radius
    });
    this._close.css({
        'display':config.close.hide ? 'none' : 'block',
        'position':'absolute',
        'top':'0px',
        'right':'0px',
        'height':config.close.height,
        'line-height':config.close.height,
        'font-size':config.close['font-size'],
        'padding':config.close.padding,
        'cursor':'pointer'
    }).click(function () {
        var instance = $(this).data('parent');
        Sidebar.prototype.hide.call(instance);
        if(typeof($("img").lazyload)=="function"){
            //异步加载图片
            setTimeout(function(){
                $("img").lazyload({effect: "fadeIn",threshold:0,failure_limit:20,skip_invisible:false});
            },500);
        }
    }).attr({'onselectstart':'return false', 'unselectable':'on'});   // [兼容]禁止选择文本
};
/*
 * 隐藏Sidebar
 * animate: 是否带动画
 */
Sidebar.prototype.hide = function (animate) {
    animate === undefined && (animate = true);
    var instance = this, width = '-'+this.width, end = this.position == 'right' ? {right :width} : {left :width},
        btn_width = '-'+instance.config.button.width, btn_end = instance.position == 'right' ? {left :btn_width} : {right :btn_width};
    instance.onHide('start');
    if(animate) {
        instance.main.animate(end, 'fast', function() {
            instance.button.show().animate(btn_end, 'fast');
            instance.onHide('end');
        });
    } else {
        instance.main.css(end);
        instance.button.show().css(btn_end);
        instance.onHide('end');
    }
};
/*
 * 隐藏Sidebar开始和结束时
 */
Sidebar.prototype.onHide = function (status) {
    var func;
    if(this.config.hide) {
        switch(status) {
            case 'start':
                Util.prototype.type(func = this.config.hide.start) == 'function' && func();  // 执行自定义函数
                break;
            case 'end':
                Util.prototype.type(func = this.config.hide.end) == 'function' && func();  // 执行自定义函数
                break;
        }
    }
};
/*
 * 初始化 - button
 */
Sidebar.prototype.initButton = function(config) {
    var width = config.button.width;
    this.button.hide().css({
        'position':'absolute',
        'top':'0%',
        'width':width,
        'line-height':'1.35em',
        'padding':'.5em 0',
        'font-size':config.close['font-size'],
        'color':config.button.color,
        'background-color':config.button['background-color'],
        'cursor':'pointer',
        'word-wrap':'break-word',
        'word-break':'break-all'
    });
    var radius = config.button.radius;
    if(this.position == 'right') {
        this.button.css({
            'border-top-left-radius':radius,
            'border-bottom-left-radius':radius
        });
    } else {
        this.button.css({
            'border-top-right-radius':radius,
            'border-bottom-right-radius':radius
        });
    }
    this.button.css(this.position_rev, '0px');
    // 点击时
    this.button.click(function () {
        var instance = $(this).data('parent');
        Sidebar.prototype.show.call(instance);
    }).attr({'onselectstart':'return false', 'unselectable':'on'});   // [兼容]禁止选择文本
};
/*
 * 显示Sidebar
 * animate: 是否带动画
 */
Sidebar.prototype.show = function (animate) {
    animate === undefined && (animate = true);
    var instance = this, end = instance.position == 'right' ? {right :0} : {left :0};
    instance.onShow('start');
    if(animate) {
        instance.onAnimate('showing');
        instance.main.animate(end, 'fast', function() {
            instance.onAnimate();
            instance.button.hide(); // Bug修复: 额外隐藏一次
            instance.onShow('end');
        });
    } else {
        instance.main.css(end);
        instance.onShow('end');
    }
    // 显示开始后, 不管是否有动画, 按钮应该马上隐藏
    instance.button.hide();
    instance.button.css(instance.position_rev,'0px');
};
/*
 * 显示Sidebar开始和结束时
 */
Sidebar.prototype.onShow = function (status) {
    var func;
    if(this.config.show) {
        switch (status) {
            case 'start':
                Util.prototype.type(func = this.config.show.start) == 'function' && func();  // 执行自定义函数
                break;
            case 'end':
                Util.prototype.type(func = this.config.show.end) == 'function' && func();  // 执行自定义函数
                break;
        }
    }
};
/*
 * 设置实时动画状态
 * status: 为空时表示动画结束
 */
Sidebar.prototype.onAnimate = function(status) {
    Util.prototype.removeClass(this.main, 'animate-');
    status && this.main.addClass('animate-'+status);
};
/*
 * 窗口大小改变时
 */
Sidebar.prototype.onWindowResize = function() {
    for(var i = 0, len = window.online_service_list.length; i < len; ++i) {
        window.online_service_list[i].verticalCenter();
    }
};
/*
 * 在窗口垂直居中
 */
Sidebar.prototype.verticalCenter = function() {
    var h1 = this.main.height(), h2 =$(window).height();
    if(h1 && h2) {
        this.main.css('top', ((h2 - h1) / 2) + 'px');
    }
    return this.main;
};
/*
 * 添加内容
 */
Sidebar.prototype.append = function(obj) {
    this.wrapper.append(obj);
    this.verticalCenter();
};
/*
 * ***************************************************************
 * 工具类
 */
function Util() {
}
/*
 * 返回对象类型
 */
Util.prototype.type = function(obj) {
    var type = obj === undefined ? 'undefined' : (obj === null ? 'null' : undefined);   // 兼容旧版js解析器
    return type ? type : Object.prototype.toString.call(obj).slice(8, -1).toLowerCase();
};
/*
 * 检测对象类型
 */
Util.prototype.is = function(obj, type) {
    var cls = this.type(obj);
    return obj !== undefined && obj !== null && cls.toLowerCase() === type.toLowerCase();
};
/*
 * 属性扩展( 增强版 )
 * 注意: 一般深度复制, 可直接使用 $.extend(true, target, source)
 */
Util.prototype.extend = function(target, source, is_deep, is_add) {
    is_deep === undefined && (is_deep = true);   // 如果值也是对象, 是否对值也调用extend
    is_add === undefined && (is_add = true);     // 如果目标对象中没有源对象的键, 是否允许新增键值
    for (var p in source) {
        if (source.hasOwnProperty(p) && (is_add || target.hasOwnProperty(p))) {
            // 执行extend
            if(is_deep && this.is(target[p], 'object') && this.is(source[p], 'object')) {
                this.extend(target[p], source[p]);
            } else {
                target[p] = source[p];
            }
        }
    }
    return target;
};
/*
 * 删除class( 删除指定名称的class和所有以指定名称开头的class )
 */
Util.prototype.removeClass = function(obj, rm) {
    obj.attr('class', function () {
        var regExp = new RegExp(rm + '\\S*', 'g');
        return Util.prototype.clear($(this).attr('class').replace(regExp, ''));
    });
    return obj;
};
/*
 * 删除前后空白
 */
Util.prototype.trim = function(s){
    return s.replace(/(^\s*)|(\s*$)/g,'');
};
/*
 * 合并中间多个空白为一个
 */
Util.prototype.clear = function(s){
    return s.replace(/(^\s*)|(\s*$)|(\s{2,})/g,'');
};
/*
 * 对象转数组
 */
Util.prototype.toArray = function(obj) {
    var array = [], p, item;
    for (p in obj) {
        if (obj.hasOwnProperty(p)) {
            item = [p];
            item.push(this.is(obj[p], 'object') ? this.toArray(obj[p]) : obj[p]);
            array.push(item);
        }
    }
    return array;
};
/*
 * 使用指定的键值数组替换一个字符串
 * 备注: 字符串中键以{{}}标记
 * 备注: data: 二维数组, 一维数组的每一项是一个长度为二的内层数组, 内层数组的第一项为键, 第二项为值
 */
Util.prototype.replace = function(s, data) {
    var i, len, reg_str = [], reg;
    for(i = 0, len = data.length; i < len; ++i) {
        reg_str.push('({{' + data[i][0] + '}})');
    }
    // 正则替换
    reg = new RegExp(reg_str.join('|'), 'g');
    return s.replace(reg, replace);
    // 执行替换的函数
    function replace(){
        // arguments 中包含的是: 字符串中当前位置匹配到的字符串, 第0个()匹配到的字符串, ..., 第n-1个()匹配到的字符串, 当前匹配的位置, 整个字符串
        // 从索引为1开始, 第一个不为undefined的项的索引值减一即为匹配到的键的索引
        for(var i = 1, len = arguments.length; i < len; ++i) {
            if(arguments[i] !== undefined) {
                return data[--i][1];
            }
        }
    }
};
</script>
<div class="online-service online-template online-service-style01" style="display: none;">
    <div class="wrapper">
        <div class="close">×</div>
    </div>
    <div class="button">
        <div><img style="margin-bottom: 1px; width: 12px;" alt="<" src="img/member-1-white.png">在线客服<img style="margin-top: 3px; width: 12px;" alt="<" src="img/links-6-white-rev.png"></div>
    </div>
</div>
<script type="application/javascript">
    function remove_qqol_qqol_style_01_1575620923404(){
        $('body > .online-service.qqol-qqol_style_01_1575620923404').remove();
    }
    // 创建在线客服
    $(function () {
        // 清理旧的
        remove_qqol_qqol_style_01_1575620923404();
        // 创建边栏
        var sidebar = new Sidebar({
            'template': 'online-template',
            'css': 'qqol-qqol_style_01_1575620923404',
            'expand': false,
            'main': {'width':'200px', 'position': 'right'},
            'border': {'color': '#005bad', 'width': '3px', 'radius': '10px'},
            'button': {'color': '#fff', 'background-color': '#005bad', 'radius': '5px'},
            'close': {'hide': false}
        });
        // 片段模板
        var qqOnlineStr = '<div class="clearfix">' +
                '<a class="qq-btn qq-btn-pc" target="_blank" href="//wpa.qq.com/msgrd?v=3&uin={{qq}}&site=qq&menu=yes">' +
                '<img border="0" src="//wpa.qq.com/pa?p=2:{{qq}}:{{style}}" alt="{{title}}" title="{{title}}"  ' +
                'onerror="javascript:this.src=\'//admin.mifwl.com/images/qq_icon/icon-{{style}}.gif\';">' +
                '{{text}}</a>' +
                '<a class="qq-btn qq-btn-mobile" target="_blank" href="mqqwpa://im/chat?chat_type=wpa&uin={{qq}}&version=1&src_type=web&web_src=oicqzone.com">' +
                '<img border="0" src="//wpa.qq.com/pa?p=2:{{qq}}:{{style}}" alt="{{title}}" title="{{title}}"  ' +
                'onerror="javascript:this.src=\'//admin.mifwl.com/images/qq_icon/icon-{{style}}.gif\';">' +
                '{{text}}</a>' +
                '</div>';   // 图标不能显示时, 更换QQ号码让其显示
        // 创建片段
        Fragment.prototype.prefix = 'ol-';
        // 创建片段列表
        var fragmentList = new FragmentList({
            'prefix':'ol-',
            'css':{'padding':'0 12px'}
        });
                        fragmentList.append(new Fragment({
                    'name': 'text',
                    'html': '<div>工作时间</div>',
                    'css':{'margin':'.5em 0'}
                }));
                            fragmentList.append(new Fragment({
                    'name': 'text',
                    'html': '<div>周一至周日 ：8:00-18:00</div>',
                    'css':{'margin':'.5em 0'}
                }));
                            fragmentList.append(new Fragment({
                    'name':'separator',
                    'css':{'height':'2px', 'background-color':'#a0a0a0'}
                }));
                            fragmentList.append(new Fragment({
                    'name': 'text',
                    'html': '<div>联系方式</div>',
                    'css':{'margin':'.5em 0'}
                }));
                            fragmentList.append(new Fragment({
                    'name': 'text',
                    'html': '<div>电话1：13573245870</div>',
                    'css':{'margin':'.5em 0'}
                }));
                            fragmentList.append(new Fragment({
                    'name': 'text',
                    'html': '<div>电话2： 13573245870</div>',
                    'css':{'margin':'.5em 0'}
                }));
                            fragmentList.append(new Fragment({
                    'name': 'text',
                    'html': '<div>微信： 13573245870</div>',
                    'css':{'margin':'.5em 0'}
                }));
                            fragmentList.append(new Fragment({
                    'name': 'text',
                    'html': '<div>QQ：1370224171</div>',
                    'css':{'margin':'.5em 0'}
                }));
                            fragmentList.append(new Fragment({
                    'name': 'text',
                    'html': '<div>QQ：1370224171</div>',
                    'css':{'margin':'.5em 0'}
                }));
                            fragmentList.append(new Fragment({
                    'name': 'text',
                    'html': '<div>邮箱：1370224171@qq.com</div>',
                    'css':{'margin':'.5em 0'}
                }));
                    // 添加到边栏
        var list = fragmentList.get();
        !list.children().length && list.html('<p>内容列表为空！</p>');
        sidebar.append(list);
        if(typeof($("img").lazyload)=="function"){
            $("img").lazyload({effect: "fadeIn",threshold:0,failure_limit:20,skip_invisible:false});
        }
    });
</script>