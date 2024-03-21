<?php
    include('../lib/conn.php');

    $sql = "SELECT * FROM `tbuser`";
    $result= mysqli_query($con,$sql);
    $num = mysqli_num_rows($result);

    echo $num;
?>