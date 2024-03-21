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
    
    <div class="row text-center mt-4 ml-4 mr-4">
        <div class="col-md-6">
            <div class="card-sm" style="border: 0;">
                <div class="card-body">
                    <img src="img/profile/f.png" class="rounded-circle" width="120px" height="120px">
                    <h2 style="color: rgb(65, 106, 241);">ระบบเครื่อข่ายสังคมออนไลน์</h2>
                    <h2>วิทยาลัยการอาชีพนวมินทราชินีมุกดาหาร</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">                    
                    <h2>เข้าสู่ระบบ</h2>
                    <form action="user_login.php" method="post">
                        <div class="form-group">
                           
                            <input type="text" class="form-control" name="username" placeholder="ชื่อผู้ใช้งาน">
                        </div>
                        <div class="form-group">
                       
                            <input type="password" class="form-control" name="password" placeholder="รหัสผ่าน">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="userlogin" class="btn btn-success mt-2 btn-block">เข้าสู่ระบบ</button>
                        </div>
                    </form>
                    <h4>หรือ</h4>
                    <div class="form-group">
                        <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#mymodal">สมัครสมาชิก</a>
                    </div>
                    <?php include('reg_modal.php'); ?>
                    <p>สำหรับ <a href="admin_login.php">ผู้ดูแลระบบ</a></p>
                </div>
            </div>
        </div>
    </div>
    <?php include('lib/footer.php');?>
</body>

</html>