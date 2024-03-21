<?php

  include('auth.php');
  include('../lib/conn.php');
    
    $a_id = $_SESSION['a_id'];
    $sql = "SELECT * FROM `tbadmin` WHERE a_id='$a_id'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบเครื่อข่ายสังคมออนไลน์</title>
    <link rel="stylesheet" href="../lib/css/bootstrap.min.css">
    <script src="../lib/js/jquery-3.6.0.min.js"></script>
    <script src="../lib/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../lib/css/style.css">
</head>
<body>
    <?php include('menu.php');?>
    <div class="container-fulid ml-4 mr-4">
        <div class="row mt-2">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">ข้อมูลส่วนตัว</div>
                    <div class="card-body">
                        <?php include('profile.php');?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            <div class="card">
                    <div class="card-header">โพสต์ทั้งหมด</div>
                    <div class="card-body">
                    <?php include('post_user.php');?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
            <div class="card">
                    <div class="card-header">รายงานข้อมูล</div>
                    <div class="card-body">
                    <?php include('report.php');?>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    
</body>
</html> 