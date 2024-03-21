<?php
    include('lib/conn.php');

    $u_id = $_SESSION['u_id'];
    $sql = "SELECT * FROM `tbuser` WHERE u_id != '$u_id'";
    $result1= mysqli_query($con,$sql);
    $num1 = mysqli_num_rows($result1);

    $sql2 = "SELECT * FROM `tbfriend` WHERE (f_user_id = '$u_id' OR f_friend_id = '$u_id') AND f_status='1'";
    $result2= mysqli_query($con,$sql2);
    $num2 = mysqli_num_rows($result2);

    $numShow=$num1-$num2;   
    echo $numShow;

?>