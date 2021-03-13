<?php
$conf['sy'] = array (
  'mlang' => true,
  'need_lm' => true,
  'pre' => 'pro',
  'table_lm' => 'pro_lm',
  'table_co' => 'pro_co',
);
$conf['up'] = array (
  'path' => 'upimg',
  'allowext' => 'jpg|gif|png|bmp',
  'maxsize' => '200000',
  'text' => '上传600*600的图片',
  'sm' => true,
);
$conf['sm'] = array (
  0 => 
  array (
    's_nam' => 'd',
    's_typ' => true,
    's_wid' => 0,
    's_hei' => 0,
  ),
  1 => 
  array (
    's_nam' => '',
    's_typ' => false,
    's_wid' => '300',
    's_hei' => '300',
  ),
);
?>