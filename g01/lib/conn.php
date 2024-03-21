<?php
    $localhost ="localhost";
    $user ="g01";
    $pass ="@25muk64";
    $db ="db_01";

    $con  = mysqli_connect("$localhost","$user","$pass","$db");
    date_default_timezone_set("Asia/Bangkok");
    mysqli_set_charset($con,'utf8');

?>