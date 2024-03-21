<?php
    include('lib/conn.php');
    $u_id = $_SESSION['u_id'];
    $sql = "SELECT * FROM `tbfriend` WHERE f_status = '1' AND (f_user_id = '$u_id' OR f_friend_id = '$u_id')";
    $result= mysqli_query($con,$sql);
    $num = mysqli_num_rows($result);

    echo $num;
?>