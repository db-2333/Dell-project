<?php
   $tel = $_GET['tel'];
   $password = $_GET['password'];

   $link = mysqli_connect("localhost","root","666666","dblibrary");
   
   $sql = " SELECT * FROM `tel_table_users` WHERE  `tel` = '$tel' ";

   $res = mysqli_query($link,$sql);

   if(!$res){
       die("数据库连接错误".mysqli.error($link));
   }

   $row = mysqli_fetch_assoc($res);


   if($row){
       echo json_encode(array(
           "code"=>2,
           "msg"=>"账户已存在"
        ),JSON_UNESCAPED_UNICODE);
   }else{
        $sql1 = "INSERT INTO `tel_table_users` ( `tel`, `password`) VALUES ( '$tel', '$password')";
        $res1 = mysqli_query($link,$sql1);
        echo json_encode(array(
            "code"=>3,
            "msg"=>"注册账号成功"
        ),JSON_UNESCAPED_UNICODE);
   }

    mysqli_close($link);
?>