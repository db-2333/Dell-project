<?php
    $tel=$_GET['tel'];
    $goods_id=$_GET['goods_id'];
    $goods_num=$_GET['goods_num'];

    $con = mysqli_connect('localhost','root','666666','dblibrary');
    
    $sql = "SELECT *  FROM `tel_table` WHERE `tel` = '$tel' AND `goods_id` = '$goods_id'";

    $res = mysqli_query($con,$sql);



    if (!$res) {
      die('error for mysql: ' . mysqli_error());
    }

    $row = mysqli_fetch_assoc($res);

    // 如果 获取的数据不为空 说明有物品了 直接将 数量 加1    如果 为空  说明 没有商品  这时将商品添加
      if($row){
          $update = "UPDATE `tel_table` SET `goods_num` = '$goods_num' WHERE `tel` = '$tel' AND `goods_id` = '$goods_id'";
          $updateRes = mysqli_query($con,$update);
          if(!$updateRes){
              die('数据库链接错误' . mysqli_error($con));
          }
          print_r(json_encode(array('code'=>$updateRes,"msg"=>"添加成功"),JSON_UNESCAPED_UNICODE));
      }else{
          $adddate = "INSERT INTO `tel_table` VALUES (null,'$tel','$goods_id','1')" ;
          $addRes = mysqli_query($con,$adddate);
    
          if(!$addRes){
            die('数据库链接错误' . mysqli_error($con));
          }
    
          print_r(json_encode(array('code'=>$addRes,"msg"=>"添加成功"),JSON_UNESCAPED_UNICODE));
        }

?>