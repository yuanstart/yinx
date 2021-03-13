var previewBox = document.getElementById('PreviewBox');
var previewImage = document.getElementById('PreviewImage');
var previewUrl = document.getElementById('previewUrl');
var previewFrom = null;
var previewTimeoutId = null;
var loadingImg = ajaxServer+'/images/clockss.gif';

function ajax_load_comments_list(s_Hash,i_IDProduct,i_Page){
	var obj_CommentsContent = $("#"+s_Hash+"_comments_content");
	var s_AjaxUrl = ajaxServer+"/prodinfo/ajax_prodinfo_data.php?jsoncallback=?";
	var arr_Data = {'IDWebSite':curIDWebSite,'Action':'GetComments','IDProduct':i_IDProduct,'Page':i_Page};

	$.getJSON(s_AjaxUrl,arr_Data,function(rData){
		var s_CommentsContent = _ParseCommentsHTML(s_Hash,i_IDProduct,rData,i_Page);
		obj_CommentsContent.html(s_CommentsContent);
		reloadHeight(s_Hash);
		diyAutoHeight();
	});

}

function ajax_load_comments_list_3(s_Hash,i_IDProduct,i_Page){
	var obj_CommentsContent = $("#"+s_Hash+"_comments_content");
	
	var s_AjaxUrl = ajaxServer+"/prodinfo/ajax_prodinfo_data.php?jsoncallback=?";
	var arr_Data = {'IDWebSite':curIDWebSite,'Action':'GetComments','IDProduct':i_IDProduct,'Page':i_Page};

	$.getJSON(s_AjaxUrl,arr_Data,function(rData){
		var s_CommentsContent = _ParseCommentsHTML3(s_Hash,i_IDProduct,rData,i_Page);
		obj_CommentsContent.html(s_CommentsContent);
		reloadHeight(s_Hash);
	});
}


function ajax_load_comments_service_list(s_Hash,i_IDProduct,i_Type,i_Page){
	//i_Type  1:店铺售后评论  2:产品售后评价
	var obj_CommentsServiceContent = $("#"+s_Hash+"_comments_service_content");

	var s_AjaxUrl = ajaxServer+"/prodinfo/ajax_prodinfo_data.php?jsoncallback=?";
	var arr_Data = {'IDWebSite':curIDWebSite,'Action':'GetCommentsService','IDProduct':i_IDProduct,'Page':i_Page,'Type':i_Type};

	$.getJSON(s_AjaxUrl,arr_Data,function(rData){
		var s_CommentsServiceContent = _ParseCommentsServiceHTML(s_Hash,i_Type,i_IDProduct,rData,i_Page);
		obj_CommentsServiceContent.html(s_CommentsServiceContent);
		reloadHeight(s_Hash);
	});
}


function ajax_load_exchange_list(s_Hash,i_IDProduct,i_Page){
	var obj_ExchangeContent = $("#"+s_Hash+"_exchange_content");
	

	var s_AjaxUrl = ajaxServer+"/prodinfo/ajax_prodinfo_data.php?jsoncallback=?";
	var arr_Data = {'IDWebSite':curIDWebSite,'Action':'GetExchange','IDProduct':i_IDProduct,'Page':i_Page};

	$.getJSON(s_AjaxUrl,arr_Data,function(rData){
		var s_ExchangeContent = _ParseExchangeHTML(s_Hash,i_IDProduct,rData,i_Page);
		obj_ExchangeContent.html(s_ExchangeContent);
		reloadHeight(s_Hash);
	});
}

$(document).ready(function(){
	$(".cm-toggle").toggle(
		function(){
			$(".cm-toggle").addClass("cm-toggle-down");
			$(".cm-li .hide").show();
		},
		function(){
			$(".cm-toggle").removeClass("cm-toggle-down");
			$(".cm-li .hide").hide();	
		}
	);
	$(".istar").hover(function(){
		$(this).removeClass("icon-star-empty");
		$(this).addClass("icon-star-full");
	});
});

function _ParseCommentsHTML(s_Hash,i_IDProduct,CommentsData,i_Page){
	var s_Return = '';
	var arr_CommentsList = CommentsData['List'];
	var i_Page = CommentsData['Page'];
	var i_PrePage = i_Page-1;
	var i_NxtPage = i_Page+1;
	var i_PageNum = CommentsData['PageNum'];

	s_Return+=	'<div class="proDetailSelect">';
	s_Return+=		'<label><input type="radio" checked="true" name="ratetype" value="0" class="commentType"> 全部</label>';
	s_Return+=	'</div>';

	s_Return+=	'<div class="proDetailcomment">';

	for(var i=0;i<arr_CommentsList.length;i++){
	s_Return+=		'<div class="commentList">';
	s_Return+=			'<div class="commentListLeft">';
	s_Return+=				' <div class="commentListTxt">'+arr_CommentsList[i]['chrContent']+'</div>';
	if(arr_CommentsList[i]['PicList']){
		s_Return+=			'<div id="PreviewBox" onmouseout="hidePreview(event);">';
		s_Return+=				'<div class="Picture" onmouseout="hidePreview(event);">';
		s_Return+=					'<span></span>';
		s_Return+=					'<div>';
		s_Return+=						'<a id="previewUrl" href="javascript:void(0)" target="_blank"><img oncontextmenu="return(false)" id="PreviewImage" src="../images/transparent.gif" border="0" onmouseout="hidePreview(event);" /></a>';
		s_Return+=					'</div>';
		s_Return+=				'</div>';
		s_Return+=			'</div>';
		s_Return+=			'<div class="listImg c-photoList">';
		s_Return+=				'<ul class="pUl">';
		for(var kk=0;kk<arr_CommentsList[i]['PicList'].length;kk++){
			s_Return+=				'<li '+(kk==0?' class="c-current"':'')+'>';
			s_Return+=					'<a href="###"  onmouseover="showPreview(event);" onmouseout="hidePreview(event);">';
			s_Return+=						'<span><img src="'+upPicServer+'/comments_img/'+arr_CommentsList[i]['PicList'][kk]+'"   large-src="'+upPicServer+'/comments_img/'+arr_CommentsList[i]['PicList'][kk]+'" pic-link="/"  border="0"><b class="c-photos-arrow"></b></span>';
			s_Return+=					'</a>';
			s_Return+=				'</li>';
		}
		s_Return+=				'</ul>';
		s_Return+=			'</div>';
	}
	s_Return+=				'<div class="listDate">'+arr_CommentsList[i]['dtCreate']+'</div>';
	if(arr_CommentsList[i]['chrReply']){
	s_Return+=				'<div class="listReply"> <span class="s">商家回复:</span> <span>'+arr_CommentsList[i]['chrReply']+'</span></div>';
	}
	s_Return+=			'</div>';
	s_Return+=			'<div class="ContentListCenter">';
	for(var jj=0;jj<arr_CommentsList[i]['spec_desc'].length;jj++){
		if(jj>0){
			s_Return+=',';
		}		
		s_Return+=			arr_CommentsList[i]['spec_desc'][jj];
	}
	s_Return+=			'</div>';
						//不知道为什么使用三元运算符不行，所以换成if语句
						////arr_CommentsList[i]['username']!=null?arr_CommentsList[i]['username']:arr_CommentsList[i]['chrContentS']
							var name = "";
						if(arr_CommentsList[i]['username']!=null){
							name = arr_CommentsList[i]['username'];
						}else{
							name = arr_CommentsList[i]['chrContentS'];
						}

	s_Return+=			'<div class="ContentListRight">'+name+'</div>';
	s_Return+=		'</div>';
	}

	s_Return+=	'</div>';
	s_Return+=	_PageHTML(s_Hash,'comments',i_IDProduct,i_Page,i_PageNum,0);
	return s_Return;
}

function _ParseCommentsHTML3(s_Hash,i_IDProduct,CommentsData,i_Page){
	var s_Return = '';

	var arr_CommentsList = CommentsData['List'];
	var i_Page = CommentsData['Page'];
	var i_PrePage = i_Page-1;
	var i_NxtPage = i_Page+1;
	var i_PageNum = CommentsData['PageNum'];

	s_Return+=	'<div class="proDetailSelect">';
	s_Return+=		'<label><input type="radio" checked="true" name="ratetype" value="0" class="commentType">全部评论</label>';
	s_Return+=	'</div>';

	s_Return+=	'<div class="proDetailcomment">';
	s_Return+=	'<ul>';
	for(var i=0;i<arr_CommentsList.length;i++){
	s_Return+=		'<li class="commentList">';
	s_Return+=			'<div class="head_portrait"><img src="'+arr_CommentsList[i]['chrhead']+'"/></div>';
	s_Return+=			'<div class="buyersName"><span>'+arr_CommentsList[i]['username']+'</span><span class="listDate">'+arr_CommentsList[i]['dtCreate']+'</span></div>';
	s_Return+=			'<div class="contectRegion">';
	s_Return+=				'<div class="">';
	s_Return+=					'<div class="comment_content">'+arr_CommentsList[i]['chrContent']+'</div>';
	if(arr_CommentsList[i]['PicList']){
		s_Return+=				'<div class="listImg">';
		for(var kk=0;kk<arr_CommentsList[i]['PicList'].length;kk++){
			s_Return+=							'<span><img src="'+upPicServer+'/comments_img/'+arr_CommentsList[i]['PicList'][kk]+'"   large-src="'+upPicServer+'/comments_img/'+arr_CommentsList[i]['PicList'][kk]+'></span>';
		}
		s_Return+=				'</div>';
	}
	s_Return+=					'<div class="listReply">';
	s_Return+=						'<span class="replyTitle">商家回复：</span>';
	s_Return+=						'<span class="replyContent">'+arr_CommentsList[i]['chrReply']+'</span>';
	s_Return+=					'</div>';
	s_Return+=				'</div>';
	s_Return+=			'</div>';
	s_Return+=		'</li>';
	}
	s_Return+=	'</ul>';
	s_Return+=	'</div>';
	s_Return+=	_PageHTML(s_Hash,'comments3',i_IDProduct,i_Page,i_PageNum,0);
	return s_Return;
}

function _ParseCommentsServiceHTML(s_Hash,i_Type,i_IDProduct,CommentsData,i_Page){
	var s_Return = '';

	var arr_CommentsList = CommentsData['List'];
	var i_Page = CommentsData['Page'];
	var i_PrePage = i_Page-1;
	var i_NxtPage = i_Page+1;
	var i_PageNum = CommentsData['PageNum'];

	s_Return+=	'<div class="proDetailCustomer">';
	s_Return+=	'<div class="proDetailSelect">';
	s_Return+=		'<div class="fl">';
	s_Return+=			'<label><input type="radio" checked="true" name="ratetype" value="0" class="commentType" '+(i_Type==1?'checked':'')+' onclick="ajax_load_comments_service_list(\''+s_Hash+'\','+i_IDProduct+',1,'+i_Page+');"> 店铺全部售后评价</label>';
	s_Return+=			'&nbsp;&nbsp;<label><input type="radio" value="1" name="ratetype" class="commentType" '+(i_Type==2?'checked':'')+' onclick="ajax_load_comments_service_list(\''+s_Hash+'\','+i_IDProduct+',2,'+i_Page+');"> 该宝贝售后评价</label>';
	s_Return+=		'</div>';
	s_Return+=	'</div>';
	s_Return+=		'<div class="CustomerComment">';

	for(var i=0;i<arr_CommentsList.length;i++){
		s_Return+=	'<div class="commentList">';
		s_Return+=		'<div class="commentListLeft">';
		s_Return+=			'<div class="commentListTxt">'+arr_CommentsList[i]['chrContent']+'</div>';
		s_Return+=			'<div class="listDate">'+arr_CommentsList[i]['dtCreate']+'</div>';
		s_Return+=		'</div>';
		s_Return+=		'<div class="ContentListCenter">';
		for(var jj=0;jj<arr_CommentsList[i]['spec_desc'].length;jj++){
			s_Return+=		arr_CommentsList[i]['spec_desc'][jj]+',';
		}
		s_Return+=		'</div>';
        var name = "";
        if(arr_CommentsList[i]['username']!=null){
            name = arr_CommentsList[i]['username'];
        }else{
            name = arr_CommentsList[i]['chrContentS'];
        }
		s_Return+=		'<div class="ContentListRight">'+name+'</div>';
		s_Return+=	'</div>';
	}

	s_Return+=		'</div>';
	s_Return+=	'</div>';
	s_Return+=	_PageHTML(s_Hash,'commentsservice',i_IDProduct,i_Page,i_PageNum,i_Type);
	return s_Return;
}

function _PageHTML(s_Hash,s_Type,i_IDProduct,i_Page,i_PageNum,i_Type){
	var s_Return = '';

	var s_Func = '';
	if(s_Type=='comments3'){
		s_Func = 'ajax_load_comments_list_3';
	}else if(s_Type=='comments'){
		s_Func = 'ajax_load_comments_list';
	}else if(s_Type=='commentsservice'){
		s_Func = 'ajax_load_comments_service_list';
	}else{
		s_Func = 'ajax_load_exchange_list';
	}

	var i_PrePage = i_Page-1;
	var i_NxtPage = i_Page+1;
	if(i_PageNum<2)return s_Return;

	s_Return+=	'<div class="page_btn">';
	if(i_Page>1){
		if(i_Type != 0){
            s_Return+=		'<a href="javascript:'+s_Func+'(\''+s_Hash+'\','+i_IDProduct+','+i_Type+','+i_PrePage+');" class="prev_btn">&lt;</a>';
		}
		else{
            s_Return+=		'<a href="javascript:'+s_Func+'(\''+s_Hash+'\','+i_IDProduct+','+i_PrePage+');" class="prev_btn">&lt;</a>';
		}
	}
	for(var j=i_Page;j<=i_PageNum;j++){
		if(j==i_Page){
			s_Return+=	'<a href="javascript:void(0);" class="paging cur">'+j+'</a>';
		}
		else if(i_Type != 0){
            s_Return+=	'<a href="javascript:'+s_Func+'(\''+s_Hash+'\','+i_IDProduct+','+i_Type+','+j+');" class="paging">'+j+'</a>';
		}
		else{
			s_Return+=	'<a href="javascript:'+s_Func+'(\''+s_Hash+'\','+i_IDProduct+','+j+');" class="paging">'+j+'</a>';
		}
	}
	if(i_Page<i_PageNum){
        if(i_Type != 0){
            s_Return+=		'<a href="javascript:'+s_Func+'(\''+s_Hash+'\','+i_IDProduct+','+i_Type+','+i_NxtPage+')" class="next_btn">&gt;</a>';
		}
		else{
            s_Return+=		'<a href="javascript:'+s_Func+'(\''+s_Hash+'\','+i_IDProduct+','+i_NxtPage+')" class="next_btn">&gt;</a>';
		}
	}
	s_Return+=	'</div>';
	return s_Return;
}

function reloadHeight(s_Hash){
	return;
	var hashDivArea = $("#"+s_Hash);
	var hashDivParent = hashDivArea.parent(0);

	var curHeight = 0;

	hashDivArea.parentsUntil().each(function(){
		if(curHeight==0){
			if( $(this).hasClass('prodDetail')){
				curHeight = $(this).find('div').eq(0).height();
			}
		}
	});

	if(curHeight<1)curHeight = hashDivArea.height();

	hashDivArea.parentsUntil().each(function(){
		if($(this).hasClass('block_prodinfo_detail')){
			$(this).css("height",curHeight);
		}
	});
	hashDivParent.css("height",curHeight);
}

function _ParseExchangeHTML(s_Hash,i_IDProduct,ExchangeData,i_Page){
	var arr_ExchangeList = ExchangeData['List'];
	var i_Page = ExchangeData['Page'];
	var i_PrePage = i_Page-1;
	var i_NxtPage = i_Page+1;
	var i_PageNum = ExchangeData['PageNum'];

	var s_Return = '';
	s_Return+=	'<div class="proDetailRecord">';
	s_Return+=		'<div class="RecordTip">';
	s_Return+=			'<span>买家</span>';
	s_Return+=			'<span>商品名</span>';
	s_Return+=			'<span>款式/型号</span>';
	s_Return+=			'<span>数量</span>';
	s_Return+=			'<span>成交时间</span>';
	s_Return+=		'</div>';
	for(var i=0;i<arr_ExchangeList.length;i++){
	s_Return+=		'<div class="RecordContent">';
	s_Return+=			'<span>'+arr_ExchangeList[i]['username']+'</span>';
	s_Return+=			'<span>'+arr_ExchangeList[i]['goods_name']+'</span>';
	s_Return+=			'<span>';
	for(var jj=0;jj<arr_ExchangeList[i]['spec_desc'].length;jj++){
		s_Return+=			arr_ExchangeList[i]['spec_desc'][jj]+',';
	}
	s_Return+=			'</span>';
	s_Return+=			'<span>'+arr_ExchangeList[i]['goods_number']+'</span>';
	s_Return+=			'<span>'+arr_ExchangeList[i]['pay_time']+'</span>';
	s_Return+=		'</div>';
	}
	s_Return+=	'</div>';
	s_Return+=	_PageHTML(s_Hash,'exchange',i_IDProduct,i_Page,i_PageNum,0);
	return s_Return;
}