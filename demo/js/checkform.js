/*
表单额外添加的属性
canEmpty-------是否为空
checkStr-------提示信息
checkType------判断类型
equal----------与那个对象相等
checkMsg-------额外提示
*/
function checkform(formName){
	try
	{
		var aa = document.forms[formName].elements;
		var obj = null;
		var jumpFromFor = false;
		for (i=0;i<aa.length;i++){
			jumpFromFor = true;  //如果中途跳出，jumpFromFor的值将被保持为true,表示验证未通过
			if(aa[i].getAttribute("checkStr")!=""&&aa[i].getAttribute("checkStr")!=null){
				obj = aa[i];
				
				if(obj.value.length==0)
				{
					if(obj.getAttribute("canEmpty")!="Y"){
						if (obj.tagName=="SELECT"){
							alert("请选择"+obj.getAttribute("checkStr")+"");
						}else{
							alert("请填写"+obj.getAttribute("checkStr")+"");
						}
						break;
					}
				}
				
				if(obj.getAttribute("equal")!=null && obj.getAttribute("equal").length>0){	
					var obj2 = document.forms[formName].elements[obj.getAttribute("equal")];
					if(obj2 != null){
						if(obj.value != obj2.value){
							alert(obj.getAttribute("checkStr")+"与"+obj2.getAttribute("checkStr")+"不相等")
							break;
						}
					}
				}
				
				if(/^email/.test(obj.getAttribute("checkType"))){
					if(!checkEmail(obj)){
						if (obj.getAttribute("checkMsg")!=null&&obj.getAttribute("checkMsg")!=""){
							alert(obj.getAttribute("checkStr")+"格式不正确\n\n"+obj.getAttribute("checkMsg"));
						}else{
							alert(obj.getAttribute("checkStr")+"格式不正确");
						}
						break;
					}
				}
				
				if(/^idcard/.test(obj.getAttribute("checkType"))){
					if(!checkIDCard(obj)){
						alert("" + obj.getAttribute("checkStr")+"格式不正确");
						break;
					}
				}
				
				if(/^username/.test(obj.getAttribute("checkType"))){
					if(!checkUser(obj)){
						if (obj.getAttribute("checkMsg")!=null&&obj.getAttribute("checkMsg")!=""){
							alert(obj.getAttribute("checkStr")+"格式不正确\n\n"+obj.getAttribute("checkMsg"));
						}else{
							alert(obj.getAttribute("checkStr")+"格式不正确");
						}
						break;
					}
				}
				
				if(/^password/.test(obj.getAttribute("checkType"))){
					if(!checkPwd(obj)){
						if (obj.getAttribute("checkMsg")!=null&&obj.getAttribute("checkMsg")!=""){
							alert("" + obj.getAttribute("checkStr")+"格式不正确\n\n"+obj.getAttribute("checkMsg")+"");
						}else{
							alert("" + obj.getAttribute("checkStr")+"格式不正确");
						}
						break;
					}
				}
				
				if(/^string/.test(obj.getAttribute("checkType"))){
					tempArr = checkString(obj);
					if(!tempArr[0]){
						alert(tempArr[1]);
						break;
					}
				}
				
				if(/^float/.test(obj.getAttribute("checkType"))){
					tempArr = checkFloat(obj);
					if(!tempArr[0]){
						alert(tempArr[1]);
						break;
					}
				}
				
				if(/^integer/.test(obj.getAttribute("checkType"))){
					tempArr = checkInteger(obj);
					if(!tempArr[0]){
						alert(tempArr[1]);;
						break;
					}
				}
				
				if(/^number/.test(obj.getAttribute("checkType"))){
					tempArr = checkNumber(obj);
					if(!tempArr[0]){
						alert(tempArr[1]);;
						break;
					}
				}
				
				if(/^date/.test(obj.getAttribute("checkType"))){
					if(!checkD(obj)){
						alert(obj.getAttribute("checkStr")+"格式不正确");
						break;
					}
				}
				
				if(/^time/.test(obj.getAttribute("checkType"))){
					if(!checkT(obj)){
						alert(obj.getAttribute("checkStr")+"格式不正确");
						break;
					}
				}
				
				
			}//最先的if结束
			jumpFromFor = false; //循环正常结束，未从循环中跳出,验证结果：全部满足要求   
		}//循环结束
		
		if(jumpFromFor){
			obj.focus();
			obj.select();
			return false;
		}
		return true;
	}
	catch(err){
		return false;
	}
}

function checkUser(obj){
	if(obj.getAttribute("canEmpty")=="Y" && obj.value.length==0){
		return true;
	}
	var arr = obj.getAttribute("checkType").split(",");
	var smallLength = parseInt(arr[1]);
	var bigLength= parseInt(arr[2]);
	return eval("/^[\\w]{"+smallLength+","+bigLength+"}$/").test(obj.value);
}

function checkPwd(obj){
	if(obj.getAttribute("canEmpty")=="Y" && obj.value.length==0){
		return true;
	}
	var arr = obj.getAttribute("checkType").split(",");
	var smallLength = parseInt(arr[1]);
	var bigLength= parseInt(arr[2]);
	return eval("/^[\\w~`!@#\\$%\\^&\\*\\(\\)\\-\\+=\\[\\]\\{\\}\\|\\\\<,>\\.\\?\\/]{"+smallLength+","+bigLength+"}$/").test(obj.value);
}

function checkEmail(obj){
	if(obj.getAttribute("canEmpty")=="Y" && obj.value.length==0){
		return true;
	}
	return(/^([\.\w-]){1,}@([\w-]){1,}(\.([\w]){2,4}){1,}$/.test(obj.value));
}

function checkIDCard(obj){
	if(obj.getAttribute("canEmpty")=="Y" && obj.value.length==0){
		return true;
	}
	if(obj.value.length==15){
		return(/^([0-9]){15,15}$/.test(obj.value));
	}
	if(obj.value.length==18){
		return(/^([0-9]){17,17}([0-9xX]){1,1}$/.test(obj.value));
	}
	return false;
}

function checkString(obj)
{
	var tempArr = new Array(true,"");
	if(obj.getAttribute("canEmpty")=="Y" && obj.value.length==0){
		return tempArr;
	}
	var length = obj.value.length;
	var arr = obj.getAttribute("checkType").split(",");
	var smallLength = parseInt(arr[1]);
	var bigLength= parseInt(arr[2]);
	if(length<smallLength){
		tempArr[0]=false;
		tempArr[1]=obj.getAttribute("checkStr")+"不能小于"+smallLength+"位,请重新填写";
		return tempArr;
	}
	if(length > bigLength){
		tempArr[0]=false;
		tempArr[1]=obj.getAttribute("checkStr")+"不能大于"+bigLength+"位,请重新填写";
		return tempArr;
	}
	return tempArr;
}

function checkFloat(obj){
	var tempArr = new Array(true,"");
	if(obj.getAttribute("canEmpty")=="Y" && obj.value.length==0){
		return tempArr;
	}
	if(!(/^([-]){0,1}([0-9]){1,}([.]){0,1}([0-9]){0,}$/.test(obj.value))) {
		tempArr[0]=false;
		tempArr[1]=obj.getAttribute("checkStr")+"错误,请重新填写";
		return tempArr;
	}
	var floatvalue = parseFloat(obj.value);
	var arr = obj.getAttribute("checkType").split(",");
	var smallFloat = parseFloat(arr[1]);
	var bigFloat = parseFloat(arr[2]);
	if(floatvalue<smallFloat){
		tempArr[0]=false;
		tempArr[1]=obj.getAttribute("checkStr")+"不能小于"+smallFloat+",请重新填写";
		return tempArr;
	}
	if(floatvalue > bigFloat){
		tempArr[0]=false;
		tempArr[1]=obj.getAttribute("checkStr")+"不能大于"+bigFloat+",请重新填写";
		return tempArr;
	}
	return tempArr;
}

function checkInteger(obj){
	var tempArr = new Array(true,"");
	if(obj.getAttribute("canEmpty")=="Y" && obj.value.length==0){
		return tempArr;
	}
	if(!(/^([-]){0,1}([0-9]){1,}$/.test(obj.value))){
		tempArr[0]=false;
		tempArr[1]=obj.getAttribute("checkStr")+"错误,请重新填写";
		return tempArr;
	}
	var integervalue = parseInt(obj.value);
	var arr = obj.getAttribute("checkType").split(",");
	var smallInteger = parseInt(arr[1]);
	var bigInteger = parseInt(arr[2]);
	if(integervalue<smallInteger){
		tempArr[0]=false;
		tempArr[1]=obj.getAttribute("checkStr")+"不能小于"+smallInteger+",请重新填写";
		return tempArr;
	}
	if(integervalue > bigInteger){
		tempArr[0]=false;
		tempArr[1]=obj.getAttribute("checkStr")+"不能大于"+bigInteger+",请重新填写";
		return tempArr;
	}
	return tempArr;
}
//wangx 加入校验数字类型长度有限制。

function checkNumber(obj){
	var tempArr = new Array(true,"");
	if(obj.getAttribute("canEmpty")=="Y" && obj.value.length==0){
		return tempArr;
	}
	if(!(/^([-]){0,1}([0-9]){1,}$/.test(obj.value))){
		tempArr[0]=false;
		tempArr[1]=obj.getAttribute("checkStr")+"错误,请重新填写";
		return tempArr;
	}
	var integervalue = obj.value.length
	var arr = obj.getAttribute("checkType").split(",");
	var smallInteger = parseInt(arr[1]);
	var bigInteger = parseInt(arr[2]);
	if(integervalue<smallInteger){
		tempArr[0]=false;
		tempArr[1]=obj.getAttribute("checkStr")+"不能小于"+smallInteger+"位,请重新填写";
		return tempArr;
	}
	if(integervalue > bigInteger){
		tempArr[0]=false;
		tempArr[1]=obj.getAttribute("checkStr")+"不能大于"+bigInteger+"位,请重新填写";
		return tempArr;
	}
	return tempArr;
}

function checkD(obj){
	if(obj.getAttribute("canEmpty")=="Y" && obj.value.length==0){
		return true;
	}
	return(/^[0-9]{4}(\-)[0-9]{1,2}(\-)[0-9]{1,2}$/.test(obj.value));
}

function checkT(obj){
	if(obj.getAttribute("canEmpty")=="Y" && obj.value.length==0){
		return true;
	}
	return(/^[0-9]{4}(\-)[0-9]{1,2}(\-)[0-9]{1,2} [0-9]{1,2}(\:)[0-9]{1,2}(\:)[0-9]{1,2}$/.test(obj.value));
}