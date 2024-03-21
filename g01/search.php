<?php
    include('lib/auth.php');
    include('lib/conn.php');

    if(isset($_GET['gosearch'])){
        $search = $_GET['search'];

        $sqls = "SELECT * FROM `tbuser` WHERE (`u_fname` LIKE '%".$search."%' OR `u_lname` LIKE '%".$search."%') AND u_status = '1'";
        $results=mysqli_query($con,$sqls);
       
    }
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบเครื่อข่ายสังคมออนไลน์</title>
    <link rel="stylesheet" href="lib/css/bootstrap.min.css">
    <script src="lib/js/jquery-3.6.0.min.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="lib/css/style.css">
</head>
<body>
    <?php include('lib/menu.php');?>

    <div class="container-fluid">
        <div class="row mt-2">
            <div class="col-md-3 text-center">
                <div class="card">
                    <div class="card-header text-center">ข้อมูลส่วนตัว</div>
                    <div class="card-body">
                        <?php include('user_profile.php');?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="card">
                    <div class="card-header text-left"><b>ผลการค้นหา</b></div>
                    <?php foreach ($results as $values) {
                    ?>                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2"><img src="img/profile/<?php echo $values['u_img']?>" class="rounded-circle" width="50px" height="50px"></div>
                            <div class="col-md-2">ชื่อ-นามสกุล</div>
                            <div class="col-md-2"><?php echo $values['u_fname']." ".$values['u_lname'];?></div><b>|</b>
                            <div class="col-md-2"><button class="btn btn-outline-success">เพิ่มเพื่อน</button></div>                           
                        </div><hr>                                             
                    </div>
                    <?php }?>
                </div>
            </div>                
            <div class="col-md-3 text-center">
                <div class="card">
                    <div class="card-header">รายงานข้อมูล</div>
                    <div class="card-body">
                        <?php include('user_report.php');?>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>