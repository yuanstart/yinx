//主函数
function CheckForm(oForm,type)
{
    var els = oForm.elements;

    var wordsname = $('#wordsname').val();
    var gf_tel = $('.gf_tel').val();
    var gf_email = $('.gf_email').val();
    var gf_code = $('.gf_code').val();
    var message = $('#message').val();
    if (!wordsname) {
        alert('姓名不能为空!');
        return false;
    }else if(!gf_tel && !gf_email){
        alert('手机号和邮箱请填写一个!');
        return false;
    }else if(!gf_code){
        alert('验证码不能为空!');
        return false;
    }else if(!message){
        alert('留言信息不能为空!');
        return false;
    }else{
        //遍历所有表元素
        for(var i=0;i<els.length;i++)
        {
            //判断input是否需要验证
            check=els[i].getAttribute("check"); 
            warning=els[i].getAttribute("warning"); 
            if(check)
            {   
                //取得验证的正则字符串
                var sReg = check;
                //取得表单的值,用通用取值函数
                var sVal = GetValue(els[i]);
                //字符串->正则表达式,不区分大小写
                var reg = new RegExp(sReg,"i");
                if(!reg.test(sVal))
                {
    				var name = els[i].name;
    				//console.log(els);
    				$("input[name='"+name+"']").focus();
                    //验证不通过,弹出提示warning
                    if (gf_tel || gf_email) {
                        return true
                    }else{
                        alert(warning);
                    }
    				//els[i].setAttribute('placeholder',warning);
                    //该表单元素取得焦点,用通用返回函数

                    GoBack(els[i]);  
                    return false;
                }
            }
        }
	return true;
    }
}


//通用取值函数分三类进行取值
//文本输入框,直接取值el.value
//单多选,遍历所有选项取得被选中的个数返回结果"00"表示选中两个
//单多下拉菜单,遍历所有选项取得被选中的个数返回结果"0"表示选中一个
function GetValue(el)
{
    //取得表单元素的类型
    var sType = el.type;
    switch(sType)
    {
        case "checkbox":
        case "radio": return GetValueChoose(el);
        case "select-one":
        case "select-multiple": return GetValueSel(el);
        case "text":
        // el.value=Trim(el.value); bian_hongjun 2017-05-27 remove
        case "hidden":
        case "password":
        case "file":
        case "textarea":
        case "date": default:    // bian_hongjun 2017-05-27 add
            el.value=Trim(el.value);
            return el.value;
    }
    //取得radio,checkbox的选中数,用"0"来表示选中的个数,我们写正则的时候就可以通过0{1,}来表示选中个数
    function GetValueChoose(el)
    {
        var sValue = "";
        //取得第一个元素的name,搜索这个元素组
        var tmpels = document.getElementsByName(el.name);
        for(var i=0;i<tmpels.length;i++)
        {
            if(tmpels[i].checked)
            {
                sValue += "0";
            }
        }
        return sValue;
    }
    //取得select的选中数,用"0"来表示选中的个数,我们写正则的时候就可以通过0{1,}来表示选中个数
    function GetValueSel(el)
    {
        var sValue = "";
        for(var i=0;i<el.options.length;i++)
        {
            //单选下拉框提示选项设置为value=""
            if(el.options[i].selected && el.options[i].value!="")
            {
                sValue += "0";
            }
        }
        return sValue;
    }
}

//通用返回函数,验证没通过返回的效果.分三类进行取值
//文本输入框,光标定位在文本输入框的末尾
//单多选,第一选项取得焦点
//单多下拉菜单,取得焦点
function GoBack(el)
{
    //取得表单元素的类型
    var sType = el.type;
    var sFather=el.name.toLowerCase().substr(0,1);
    var iexit=eval('document.all.'+sFather+'check?1:0');

    if (iexit==1){
        eval('document.all.'+sFather+'check.checked=""');
        show(sFather);
    }   

    switch(sType)
    {
        case "text":
        case "hidden":
        case "password":
        case "file":
        case "textarea": el.focus(); //var rng = el.createTextRange(); rng.collapse(false); rng.select();
        case "checkbox":
        case "radio": var els = document.getElementsByName(el.name);els[0].focus();
        case "select-one":
        case "select-multiple":el.focus();
    }
}

  function show(obj)
  {
  var tmp=eval('document.all.'+obj+'check.checked');//eval('document.all.'+obj+'check.checked');
    if (tmp!=true)
        {
        eval("document.all."+obj+".style.display=''");
        eval('document.all.'+obj+'check.checked=true');
        eval('document.getElementById("'+obj+'Close").innerHTML="[<span class=webdings>5</span>收起]"');  
        }else{
        eval("document.all."+obj+".style.display='none'");
        eval('document.all.'+obj+'check.checked=false');
        eval('document.getElementById("'+obj+'Close").innerHTML="[<span class=webdings>6</span>展开]"');     
       }
    }

function LTrim(str) 
{ 
    var i; 
    for(i=0;i<str.length;i++) 
    { 
        if(str.charAt(i)!=" "&&str.charAt(i)!=" ")break; 
    } 
    str=str.substring(i,str.length); 
    return str; 
} 
function RTrim(str) 
{ 
    var i; 
    for(i=str.length-1;i>=0;i--) 
    { 
        if(str.charAt(i)!=" "&&str.charAt(i)!=" ")break; 
    } 
    str=str.substring(0,i+1); 
    return str; 
} 
function Trim(str) 
{ 
    return LTrim(RTrim(str)); 
} 


function checkValue(obj){
        check=obj.getAttribute("check");
        
        warning=obj.getAttribute("warning");
        obj.value=Trim(obj.value);
        if(check)
        {
            //取得验证的正则字符串
            var sReg = check;
            //取得表单的值,用通用取值函数
            var sVal = obj.value;
            //字符串->正则表达式,不区分大小写
            var reg = new RegExp(sReg,"i");
            if(!reg.test(sVal))
            {	
				console.log(obj);
				console.log($("input[name="+obj.name+"]"));
				$("input[name="+obj.name+"]").focus();
                //验证不通过,设置为warning
                //eval("document.getElementById('"+obj.name+"Info').innerHTML='<span class=\"wInfo\">"+warning+"</span>';")
                //该表单元素取得焦点,用通用返回函数
                GoBack(obj)  
                return false;
            }else{
                //验证通过,设置为通过
                //eval("document.getElementById('"+obj.name+"Info').innerHTML='<span class=\"rInfo\">输入正确.</span>';")
            }
        }
}

function check2Pass(objA,objB){
    //objA为old,//objB为new   
    if(objA.value==objB.value){
        eval("document.getElementById('"+objB.name+"Info').innerHTML='<span class=\"rInfo\">输入正确.</span>';")
    }else{
        eval("document.getElementById('"+objB.name+"Info').innerHTML='<span class=\"wInfo\">两次输入密码不相同</span>';")
    }
}
//手机站注册登录错误提示
window.Alert = function(messages,callback){
	if($(".ec_tip").length<1){
		$("body").append("<div class=\"ec_tip\">"+messages+"</div>");
	 }
	//定位居中显示
	leftW = (document.body.clientWidth-$(".ec_tip").width())/2;
	topH = (document.body.clientHeight-$(".ec_tip").height())/2;
	$(".ec_tip").css("top", topH+"px").css("left", leftW+"px").fadeIn(2000);
	 //谈出效果并执行回调
	 $(".ec_tip").animate({opacity:0},5000,function(){
		 $(".ec_tip").remove();
	});
}
/*本页面限制字符长度*/
function CheckLength(e,num){
    var str_Name = $(e).val();
    var len = 0;
    for(i=0;i<str_Name.length;i++){
        if(str_Name.charCodeAt(i)>255){     
            len += 2;
        }else{
            len += 1;   
        }
    }
    if(len>num){
        var mess = "字符超过最大限定数";
        $("#messinfo").html(mess);
        showmsg(mess);
        showTip(mess);
        $(e).val('');
    }
}
