<?php 
require('../../../include/common.inc.php');
require('../../../include/uploadfile.class.php');
require('pl_config.php');
$cong=load_config('setup');//加载整站配置文件
checklogin();

$id=isset($_POST['id'])?html($_POST['id']):'';
$pl_id=isset($_POST['pl_id'])?html($_POST['pl_id']):'';
$px=isset($_POST['pl_id'])?html($_POST['px']):'';
if ($id==''||!checknum($id)){
	msg('参数错误');
}
if ($pl_id!=''&&!checknum($pl_id)){
	msg('参数错误');
}
if ($px==''||!checknum($px)){
	msg('参数错误');
}

//文件路径
$sava_path=$conf['up']['path'];
//允许上传的文件类型
$allow_types=$conf['up']['allowext'];
//允许上传的大小
$max_size=$conf['up']['maxsize'];
//是否可以覆盖
$overfile=false;
//文件名
if ($conf['up']['sm']){
	//如果启用生成缩略图，上传的原始图片为大图，生成的缩略图为列表图
	$file_name=$conf['sm'][0]['s_nam'].date('YmdHis').rand(10,99);
}else{
	//如果不启用生成缩略图，上传的原始图片就是列标图
	$file_name=date('YmdHis').rand(10,99);
}

if (isset($_FILES['file_up'])){
	$file=$_FILES['file_up'];
	$up=new UploadFile();
	if($row=$up->upLoad($file,$sava_path,$file_name,$allow_types,$max_size,$overfile)){
		$s_name=$row['name'];
		if($conf['up']['sm']){
			foreach($conf['sm'] as $k=>$v){
				//宽度或高度为0时是不会生成缩略图的
				if ($v['s_wid']!=0&&$v['s_hei']!=0){
					//缩略图的字母名字为空时，这张图作为列表图
					if($v['s_nam']==''){
						//如果是第1张图的缩略图字母名字为空，代表原图自己生成自己
						if ($k==0){
							$k_name=getimgj($row['name'],$v['s_nam']);
						}else{
							$k_name=getimgh($row['name'],$v['s_nam']);
						}
						$s_name=$k_name;
					}else{
						$k_name=getimgh($row['name'],$v['s_nam']);
					}
					$up->makesmall($row['name'],$v['s_typ'],$v['s_wid'],$v['s_hei'],$k_name);
				}
			}
		}
		
		//删除原来上传的图片
		$sql='select img_sl from '.table($conf['pl']['table']).' where id='.$id.'';
		$row=$db->getrs($sql);
		if ($row&&$row['img_sl']!=''){
			foreach($conf['sm'] as $k=>$v){
				if($conf['up']['sm']){
					foreach($conf['sm'] as $k=>$v){
						delfile(getimgj($row['img_sl'],$v['s_nam']));
					}
				}else{
					delfile($row['img_sl']);
				}
			}
		}
		
		//转换为字段名、转换为字段值
		$title_val='';
		if ($conf['pl']['title']==true){
			foreach($cong['mlang'] as $k=>$v){
				//转换为字段名、转换为字段值
				$title_val.=',`title'.$v['lang'].'`="'.(!empty($_POST['title'.$v['lang']])?html($_POST['title'.$v['lang']]):'').'"';
				if ($conf['pl']['mlang']!=true){
					break;
				}
			}
		}
				
		//更新新图片的路径到数据库
		$db->execute('update '.table($conf['pl']['table']).' set `img_sl`="'.$s_name.'"'.$title_val.',`px`="'.$px.'" where id='.$id.'');
		msg('','location="pl_default.php?pl_id='.$pl_id.'"');
	}else{
		echo '<script>alert("'.$up->error().'");history.back();</script>';
		exit();
	}
}
?>