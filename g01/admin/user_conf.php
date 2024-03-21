<?php
    include('../lib/conn.php');

    $sql = "SELECT * FROM `tbuser` WHERE u_status = '1'";
    $result= mysqli_query($con,$sql);
    $num = mysqli_num_rows($result);

    echo $num;
?>