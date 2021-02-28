<?php
    $tel = $_GET['tel'];
    $goods_num=$_GET['goods_num'];
    $goods_id =$_GET['goods_id'];

    //链接数据库
    $link = mysqli_connect("localhost","root","666666","dblibrary");

    //准备 sql 语句
    $sql = " UPDATE `tel_table` SET `goods_num`= '$goods_num' WHERE `tel` = '$tel' AND `goods_id` = '$goods_id' ";

    //发送 sql 语句
    $res = mysqli_query($link,$sql);

    if(!$res){
        die ("数据库连接错误".mysqli_error($link));
    }

    //处理数据

  $array=array("code"=>"1","msg"=>"操作成功");
  print_r(json_encode($array,JSON_UNESCAPED_UNICODE));

?>