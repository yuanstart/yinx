<?php
$conf['pl'] = array (
  'table' => 'pl_image',
  'sy_id' => 1,
  'sesname' => 'demo_image_id',
  'mlang' => true,
  'title' => true,
  'px' => true,
);
$conf['up'] = array (
  'path' => 'upimg',
  'allowext' => 'jpg|gif|png|bmp',
  'maxsize' => '2000000',
  'allownum' => '0',
  'text' => '请上传宽度不超过600的图片',
  'sm' => false,
);
$conf['sm'] = array (
  0 => 
  array (
    's_nam' => 'd',
    's_typ' => false,
    's_wid' => 0,
    's_hei' => 0,
  ),
  1 => 
  array (
    's_nam' => '',
    's_typ' => false,
    's_wid' => '170',
    's_hei' => '170',
  ),
);
?>