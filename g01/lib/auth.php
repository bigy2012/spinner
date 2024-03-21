<?php
    session_start();
    
    if(!isset($_SESSION['u_id'])){
        header('Location: ./index.php');
        exit;
    }
    include('conn.php');
    $u_id = $_SESSION['u_id'];

    $sql = "SELECT * FROM `tbuser` WHERE u_id='$u_id'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);

    $u_name = $row['u_fname'].' '.$row['u_lname'];
    
?>