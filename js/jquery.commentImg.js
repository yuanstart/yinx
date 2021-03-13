var maxWidth=500;
var maxHeight=500;
function getPosXY(a,offset) {
       var p=offset?offset.slice(0):[0,0],tn;
       while(a) {
           tn=a.tagName.toUpperCase();
           if(tn=='IMG') {
              a=a.offsetParent;continue;
           }
          p[0]+=a.offsetLeft-(tn=="DIV"&&a.scrollLeft?a.scrollLeft:0);
          p[1]+=a.offsetTop-(tn=="DIV"&&a.scrollTop?a.scrollTop:0);
          if(tn=="BODY")
                break;
          a=a.offsetParent;
      }
      return p;
}
function checkComplete() {
     if(checkComplete.__img&&checkComplete.__img.complete)
              checkComplete.__onload();
}
checkComplete.__onload=function() {
         clearInterval(checkComplete.__timeId);
         var w=checkComplete.__img.width;
         var h=checkComplete.__img.height;
         if(w>=h&&w>maxWidth) {
              document.getElementById('PreviewImage').style.width=maxWidth+'px';
         }
        else if(h>=w&&h>maxHeight) {
              document.getElementById('PreviewImage').style.height=maxHeight+'px';
        }
        else {
              document.getElementById('PreviewImage').style.width=document.getElementById('PreviewImage').style.height='';
        }
       document.getElementById('PreviewImage').src=checkComplete.__img.src;
	   document.getElementById('previewUrl').href=checkComplete.href;checkComplete.__img=null;
}
function showPreview(e) {
         hidePreview (e);
         previewFrom=e.target||e.srcElement;
         document.getElementById('PreviewImage').src=loadingImg;
         document.getElementById('PreviewImage').style.width=document.getElementById('PreviewImage').style.height='';
         previewTimeoutId=setTimeout('_showPreview()',500);
         checkComplete.__img=null;
}
function hidePreview(e) {
        if(e) {
            var toElement=e.relatedTarget||e.toElement;
            while(toElement) {
                  if(toElement.id=='PreviewBox')
                          return;
                  toElement=toElement.parentNode;
            }
       }
       try {
            clearInterval(checkComplete.__timeId);
            checkComplete.__img=null;
            document.getElementById('PreviewImage').src=null;
       }
       catch(e) {}
       clearTimeout(previewTimeoutId);
       document.getElementById("PreviewBox").style.display='none';
	   if(typeof(blockid)!= "undefined"){
		   document.getElementById(blockid).style.overflow='hidden';
	   }
}
function _showPreview() {
        checkComplete.__img=new Image();
        if(previewFrom.tagName.toUpperCase()=='A')
               previewFrom=previewFrom.getElementsByTagName('img')[0];
        var largeSrc=previewFrom.getAttribute("large-src");
        var picLink=previewFrom.getAttribute("pic-link");
          
        if(!largeSrc)
             return;
        else {
             checkComplete.__img.src=largeSrc;
             checkComplete.href=picLink;
             checkComplete.__timeId=setInterval("checkComplete()",20);
             var pos=getPosXY(previewFrom,[-5,55]);//放大图片的定位
			 var pos_left = pos[0];
			 var pos_Top = pos[1];
			 if(typeof(blockid)!= "undefined"){
				var blockLeft = document.getElementById(blockid).style.left;
				var blockTop = document.getElementById(blockid).style.top;
				pos_left=pos[0]-parseInt(blockLeft.replace("px",""))*2-82;
				pos_Top=pos[1]-parseInt(blockTop.replace("px",""))*2-35;
				document.getElementById(blockid).style.overflow='visible';
			 }
             document.getElementById("PreviewBox").style.left=pos_left+'px';
             document.getElementById("PreviewBox").style.top=pos_Top+'px';
             document.getElementById("PreviewBox").style.display='block';
			 
			
        }
}