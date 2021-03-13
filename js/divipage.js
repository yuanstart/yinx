//导航显示样式 0:常规 1:直接 2:下拉
//var ShowStyle = 1; 
//语言,如果是en使用英文
var lang = ''; 
//每页显示字数
//var perpageLength = 10; 
//分页模式 1:根据字数自动分页 2:根据<NEXTPAGE>分页
//var flag=2;

var PageNum;

if(window.navigator.userAgent.toLowerCase().indexOf("firefox")>0){ //firefox innerText define
  HTMLElement.prototype.__defineGetter__( "innerText",
  function(){
  var anyString = "";
  var childS = this.childNodes;
  for(var i=0; i <childS.length; i++) {
  if(childS[i].nodeType==1)
  anyString += childS[i].tagName=="BR" ? '\n' : childS[i].innerText;
  else if(childS[i].nodeType==3)
  anyString += childS[i].nodeValue;
  }
  return anyString;
  }
  );
  HTMLElement.prototype.__defineSetter__( "innerText",
  function(sText){
  this.textContent=sText;
  }
  );
}
function DHTMLpagenation(divname) { with (this)
{
	// client static html file pagenation
	// Scipit by blueDestiny
	if(document.getElementById(divname)==null){
            setTimeout(function(){
                DHTMLpagenation(divname,perpageLength);
            },500)
            return false;
	}
	this.content=document.getElementById(divname).innerHTML;
	this.contenttext=document.getElementById(divname).innerText;
	this.contentLength=this.content.length;
	this.contenttextLength=this.contenttext.length;
	this.pageSizeCount;
	this.perpageLength=100; //default perpage byte length.
	this.currentPage=1;
	//this.regularExp=/.+[\?\&]{1}page=(\d+)/;
	this.regularExp=/\d+/;

	this.divDisplayContent;
	this.contentStyle=null;
	this.strDisplayContent="";
	this.divDisplayPagenation;
	this.strDisplayPagenation="";

	arguments.length==2?perpageLength=arguments[1]:'';


	if(document.getElementById(divname))
	{
		divDisplayContent=document.getElementById(divname);
	}
	else
	{
		try
		{
			divDisplayContent=document.createElement("DIV");
			divDisplayContent.id=divname;
			document.body.appendChild(divDisplayContent);
		}
		catch(e)
		{
			return false;
		}
	}

	DHTMLpagenation.initialize();
	return this;

}};

DHTMLpagenation.initialize=function() { with (this)
{
	divDisplayContent.className=contentStyle!=null?contentStyle:'';
	if(flag==2)
	{
		//手动分页
		var j,sFlag,sText;
		var sTitleFlag;
		PageNum=new Array();

		pageSizeCount=0;
		
		j=1;
		PageNum[0]=-10;
		
		sFlag=0;

		sText=content;		
		do
		{
		   sText=content.substring(PageNum[j-1]+10,contentLength);
		   sFlag=sText.toLowerCase().indexOf("<nextpage");

		   if (sFlag>0)
		   {
			PageNum[j]=sFlag+PageNum[j-1]+10;
		   }
		   else{
			PageNum[j]=contentLength;
		   }

		   j+=1;
		}
		while (PageNum[j-1]<contentLength);
		pageSizeCount=j-1;
	}else{
		if(contenttextLength<=perpageLength)//&&content.indexOf("/>")>0
		{
			strDisplayContent=content;
			//console.log(strDisplayContent);
			divDisplayContent.innerHTML=strDisplayContent;
			return null;
		}

		pageSizeCount=Math.ceil((contenttextLength/perpageLength));
	}

	DHTMLpagenation.goto(currentPage);
	DHTMLpagenation.displayContent();
}};

DHTMLpagenation.displayPage=function() { with (this)
{

	//分页码显示函数
	//参数为调用样式，0=简单样式，1=标准样式
	var temp="";

	if (ShowStyle==0)
	//简单样式
	{
		
	   tempPage=currentPage;
	   
	   if(contentLength>perpageLength){ 
		if (currentPage-4<=1){
		 temp=temp+"<font class=\"divipage_back1\"  color=#999999>9</font>";
		 if (currentPage<=1){temp=temp+"<font class=\"divipage_back2\" color=#999999>7</font>";}else{temp=temp+"<a href=javascript:DHTMLpagenation.previous()><font class=\"divipage_back2\" >7</font></a> ";}
		 if (pageSizeCount>10){
		  for(i=1;i<8;i++){
		   if (i==currentPage){
			temp=temp+"<font color=red>"+i+"</font> ";
		   }else{
			temp=temp+"<a href=javascript:DHTMLpagenation.goto("+i+") >"+i+"</a>"+" ";
		   }
		  }
		 temp=temp+" ...";
		 }
		 else{
		  for(i=1;i<pageSizeCount+1;i++){
		   if (i==currentPage){
			temp=temp+"<font color=red>"+i+"</font> ";
		   }
		   else{
			temp=temp+"<a href=javascript:DHTMLpagenation.goto("+i+") >"+i+"</a>"+" ";
		   }
		  }
		 }

		 if (currentPage==pageSizeCount){temp=temp+"<font class=\"divipage_next1\"  color=#999999>8</font>";}else{temp=temp+"<a href=javascript:DHTMLpagenation.goto("+(currentPage+1)+")><font class=\"divipage_next1\" >8</font></a> ";}
		 if(pageSizeCount<10){temp=temp+"<font  class=\"divipage_next2\" color=#999999>:</font>";}else{temp=temp+"<a href=javascript:DHTMLpagenation.goto("+pageSizeCount+")><font class=\"divipage_next2\" >:</font></a> ";}
		}
		else if(currentPage+4<=pageSizeCount){
		temp=temp+"<a href=javascript:DHTMLpagenation.goto(1)><font class=\"divipage_back1\">9</font></a> ";
		temp=temp+"<a href=javascript:DHTMLpagenation.goto("+(currentPage-1)+")><font class=\"divipage_back2\">7</font></a> ";
		 if (pageSizeCount>10){
		  temp=temp+"..";
		  for(i=currentPage-4;i<currentPage+4;i++){
		   if (i==currentPage){
			temp=temp+"<font color=red>"+i+"</font> ";
		   }
		   else{
		   temp=temp+"<a href=javascript:DHTMLpagenation.goto("+i+") >"+i+"</a>"+" ";
		   }
		  }
		  temp=temp+" ..";
		 }
		 else{
		  for(i=1;i<pageSizeCount+1;i++){
		   if (i==currentPage){
			temp=temp+"<font color=red>"+i+"</font> ";
		   }
		   else{
		   temp=temp+"<a href=javascript:DHTMLpagenation.goto("+i+") >"+i+"</a>"+" ";
		   }
		  }
		 }
	   
		 if (currentPage==pageSizeCount){temp=temp+"<font  color=#999999  class=\"divipage_next1\" >8</font>";}else{temp=temp+"<a href=javascript:DHTMLpagenation.goto("+(currentPage+1)+")><font  class=\"divipage_next1\" >8</font></a> ";}
		 temp=temp+"<a href=javascript:DHTMLpagenation.goto("+pageSizeCount+")><font class=\"divipage_next2\">:</font></a> ";

		}
		else{
		 temp=temp+"<a href=javascript:DHTMLpagenation.goto(1)><font class=\"divipage_back1\" >9</font></a> ";
		 temp=temp+"<a href=javascript:DHTMLpagenation.goto("+(currentPage-1)+")><font class=\"divipage_back2\">7</font></a> ";
		 temp=temp+".."

		 for(i=currentPage-2;i<pageSizeCount+1;i++){
		  if (i==currentPage){
		   temp=temp+"<font color=red>"+i+"</font> ";
		  }
		  else{
		   temp=temp+"<a href=javascript:DHTMLpagenation.goto("+i+") >"+i+"</a>"+" ";
		  }
		 }

		 if (currentPage==pageSizeCount){temp=temp+"<font  color=#999999 class=\"divipage_next1\" >8</font>";}else{temp=temp+"<a href=javascript:DHTMLpagenation.next()><font class=\"divipage_next1\">8</font></a> ";}
		 temp=temp+"<font  color=#999999 class=\"divipage_next2\">:</font>";
		}
	   }
	   else{
		temp=temp+"<font color=red>1</font> ";
	   }

	   temp=temp+" <a href=javascript:DHTMLpagenation.goto(0)>"+((lang=='en' || lang==2)?'Show All':'显示全部')+"</a> "
	   temp=temp+"<style>#PageNav{margin:0 auto;height:22px;line-height:22px !important;margin-top:10px;}#PageNav a{vertical-align:middle}#PageNav .divipage_back1{font-size:0px;width:18px;height:16px;display:inline-block;background:url(http://box6.nicebox.cn/images/v6/icotu.png) -20px -30px no-repeat;vertical-align:middle}.divipage_back2{font-size:0px;width:18px;height:16px;display:inline-block;background:url(http://box6.nicebox.cn/images/v6/icotu.png) -49px -30px no-repeat;vertical-align:middle}.divipage_next1{font-size:0px;width:18px;height:16px;display:inline-block;background:url(http://box6.nicebox.cn/images/v6/icotu.png) -75px -30px no-repeat;vertical-align:middle}.divipage_next2{font-size:0px;width:18px;height:16px;display:inline-block;background:url(http://box6.nicebox.cn/images/v6/icotu.png) -98px -30px no-repeat;vertical-align:middle}#PageNav a .divipage_back1{background-position:-20px -7px;vertical-align:middle}#PageNav a .divipage_back2{background-position:-49px -7px;vertical-align:middle}#PageNav a .divipage_next1{background-position:-75px -7px;vertical-align:middle}#PageNav a .divipage_next2{background-position:-98px -7px;vertical-align:middle}#pageNav a{padding:0px 4px}</style>"
	}
	else if (ShowStyle==1)
	//标准样式
	{
	   if(contentLength>perpageLength){if(currentPage!=0){if(currentPage!=1){temp=temp+"<a href='#ntop' onclick=javascript:DHTMLpagenation.goto("+(currentPage-1)+")><font color=3366cc>[上一页]</font></a>&nbsp;&nbsp;";}}}
	   for (i=1;i<pageSizeCount+1 ;i++ )
	   {
		if (currentPage==i)
		{
		 temp=temp+"<font color=800000>["+i+"]</font>&nbsp;&nbsp;";
		}
		else{
		 temp=temp+"<a href='#ntop' onclick=javascript:DHTMLpagenation.goto("+i+")><font color=3366cc>["+i+"]</font></a>&nbsp;&nbsp;";
		}
	   }
	   temp=temp+"<a name='foot'></a>";
	   if(contentLength>perpageLength){if(currentPage!=0){if(currentPage!=pageSizeCount){temp=temp+"<a href='#ntop' onclick=javascript:DHTMLpagenation.next()><font color=3366cc>[下一页]</font></a>&nbsp;&nbsp;";}}}

	   temp=temp+" <a href=javascript:DHTMLpagenation.goto(0)><font color=3366cc>"+((lang=='en' || lang==2)?'Show All':'显示全部')+"</font></a>"
	}
	else if (ShowStyle==2)
	//下拉菜单样式
	{
	   temp=temp+'<select onchange="DHTMLpagenation.goto(this.value)">'
	   for (i=1;i<pageSizeCount+1 ;i++ )
	   {
		if (currentPage==i)
		{
		 temp=temp+"<option value='"+i+"' selected style='color:red'>"+((lang=='en' || lang==2)?'currentPage':'第')+" "+i+" "+((lang=='en' || lang==2)?'':'页');
		  
		}
		else{
		 temp=temp+"<option value='"+i+"'>"+((lang=='en' || lang==2)?'currentPage':'第')+" "+i+" "+((lang=='en' || lang==2)?'':'页');
		}
		temp=temp+"</option>";
	   }
	   temp=temp+"</select>";
	}
	//divDisplayPagenation.innerHTML=temp;
	return temp;
}};

DHTMLpagenation.previous=function() { with(this)
{
	DHTMLpagenation.goto(currentPage-1);
}};

DHTMLpagenation.next=function() { with(this)
{
	DHTMLpagenation.goto(currentPage+1);
}};

DHTMLpagenation.goto=function(iCurrentPage) { with (this)
{
	startime=new Date();
	if(iCurrentPage==0){ 
		currentPage = 0;
		strDisplayContent = content;
	}
	else if(flag==2)
	{
		currentPage=iCurrentPage;
		strDisplayContent=content.substring(PageNum[iCurrentPage-1]+10,PageNum[iCurrentPage]);
	}
	else if(regularExp.test(iCurrentPage))
	{
		currentPage=iCurrentPage;
		//strDisplayContent=content.substr((currentPage-1)*perpageLength,perpageLength);
		if(!arr){
			var textnum = 0;
			var textstr = "";
			var pagenum = 1;
			var startcount = true;
			var arr = new Array();
			for (var i = 0; i < content.length; i++) {
				textstr += content[i];
				if(content[i]=="<") startcount = false;
				else if(content[i]==">"){
					startcount = true;
					continue;
				}
				if(!startcount) continue;
				textnum++;
				//console.log(textstr.substr(textstr.length-4,2));
				if(textnum>=perpageLength){//&&textstr.substr(textstr.length-4,2)=="</",&&textstr.indexOf("息。")>0
					//console.log(textstr.indexOf("</"));
					arr[pagenum] = textstr;
					textnum = 0;
					textstr = "";
					pagenum++;
				}
			}
			arr[pagenum] = textstr;
		}
		strDisplayContent = arr[currentPage];
		//console.log(strDisplayContent);
	}
	else
	{
		alert("page parameter error!");
	}
	strDisplayContent = "<a name=\"ntop\"></a>" + strDisplayContent + "<br><div id='PageNav' align=center>" + DHTMLpagenation.displayPage() + "</div>";
	
	DHTMLpagenation.displayContent();
	$("div.block_news").height("auto");setDivHeight("#container");
}};

DHTMLpagenation.displayContent=function() { with (this)
{
	divDisplayContent.innerHTML=strDisplayContent;
}};

DHTMLpagenation.change=function(iPerpageLength) { with(this)
{
	if(regularExp.test(iPerpageLength))
	{
		DHTMLpagenation.perpageLength=iPerpageLength;
		DHTMLpagenation.currentPage=1;
		DHTMLpagenation.initialize();
	}
	else
	{
		alert("请输入数字");
	}
}};