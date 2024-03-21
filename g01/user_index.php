<?php
    
    include('lib/auth.php');
    include('lib/conn.php');

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
                    <div class="card-body">
                    <form action="post.php" method="post" enctype="multipart/form-data">
                            <input type="text" class="form-control mb-2" name="p_text" placeholder="คุณคิดอะไรอยู่">
                            <div class="row mb-2">
                                <div class="col-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="p_img">
                                        <label class="custom-file-label">รูปภาพ</label>
                                    </div>
                                </div>
                            </div>
                            <p class="text-right">
                                <button type="submit" class="btn btn-lg btn-primary mt-2 ml-3" name="up_post">โพส</button>
                            </p>
                        </form>
                    </div>
                </div>
                
                <div class="card">
                    <?php include('post_show.php');?>
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
</body>
</html>