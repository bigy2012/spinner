<?php
    include('../lib/conn.php');

    $sql = "SELECT * FROM `tbuser` WHERE u_status = '0'";
    $result= mysqli_query($con,$sql);
    $num = mysqli_num_rows($result);

    echo $num;
?>