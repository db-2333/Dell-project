<?php
  $tel = $_GET['tel'];
  $password = $_GET['password'];

  $con = mysqli_connect('localhost','root','666666','dblibrary');
  
  if($password){
    $sql = "SELECT * FROM `tel_table_users` WHERE `tel`='$tel' AND `password`='$password' ";
  }else{
    $sql = "SELECT * FROM `tel_table_users` WHERE `tel`='$tel' ";
  } 

  $res = mysqli_query($con,$sql);

  if (!$res) {
    die('error for mysql: ' . mysqli_error($con));
  }

  $arr = array();

  $row = mysqli_fetch_assoc($res);

  while($row){
    array_push($arr,$row);
    $row = mysqli_fetch_assoc($res);
  }
  
  if (!$arr) {
    if($password){
      echo json_encode(array(
        "code" => 0,
        "msg" => "账户或密码错误"
        ),JSON_UNESCAPED_UNICODE);
    }else{
      echo json_encode(array(
        "code" => 2,
        "msg" => "账户不存在"
        ),JSON_UNESCAPED_UNICODE);
    }
           
    } else {
            // 有匹配的数据 登录成功
            echo json_encode(array(
            "code" => 1,
            "msg" => "登录成功"
            ),JSON_UNESCAPED_UNICODE);
    }
    
    mysqli_close($con);
?>
