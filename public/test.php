<?php
error_reporting(0);
$data = [];
for ($i = 0; $i <5; $i++) {
    $attr = ['title'=>'标题1112221111'.($i+1)];
    $data[]= ['title'=>'sdfasdf标题111122111'.($i+1),'id'=>($i+1),'attr'=>$attr,'img'=>'https://lib.diygw.com/static/icon/icon1/icon1_zy.png'];
}
echo json_encode(['code'=>200,'msg'=>'获取数据成功','data'=>$data]);