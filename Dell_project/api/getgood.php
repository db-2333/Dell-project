
<?php
        $tel = $_GET['tel'];

        // x先去获取car中这个用户所有的goods_id 
        // 循环获取的结果 然后执行SELECT * FROM `goods` WHERER `goods_id` = id

        $con = mysqli_connect('localhost','root','666666','dblibrary');

        $sql = "SELECT * FROM `tel_table` WHERE `tel`='$tel'";

        $res = mysqli_query($con,$sql);

        if(!$res){
            die('数据库链接错误' . mysqli_error($con));
        }
    
        $arr = array();
        $row = mysqli_fetch_assoc($res);
        while($row){
            array_push($arr,$row);
            $row = mysqli_fetch_assoc($res);
        }

        print_r(json_encode($arr,JSON_UNESCAPED_UNICODE));
  
?>