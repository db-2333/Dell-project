<?php
    $goods_id = $_GET['goods_id'];
    $tel = $_GET['tel'];

    //链接数据库
    $link = mysqli_connect("localhost","root","666666","dblibrary");

    //准备 sql 语句  没有接收到 goods_id 时 代表删除所有该用户的商品
    if($goods_id){
        $sql = " DELETE FROM `tel_table` WHERE `tel` = '$tel' AND `goods_id` = '$goods_id' " ;
    }else{
        $sql = " DELETE FROM `tel_table` WHERE `tel` = '$tel' " ;
    }
   
    //发送 sql 语句
    $res = mysqli_query($link,$sql);
    if(!$res){
        die("数据库连接诶错误".mysqli_error($link));
    }

    $array = array("code"=>"1","msg"=>"删除成功");
    print_r(json_encode($array,JSON_UNESCAPED_UNICODE));

?>