<?php
include('include/function.php');
if (isset($_SESSION['user_id'])) {
    $result = $sql_db->user_byid($_SESSION['user_id']);
    $first_name = substr($result['u_name'], 0, strpos($result['u_name'], " "));
    $last_name = substr($result['u_name'], strpos($result['u_name'], " ") + 1);
} else {
?>
    <script>
        location.href = 'login.php';
    </script>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>

    <?php include('include/link.php') ?>
</head>

<body>
    <?php include('include/navbar.php') ?>

    <div class="container-lg text-center">
        <h2>ข้อมูลส่วนตัว</h2>
        <form id="edit_account">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="input-group mb-3">
                        <span class="input-group-text">อีเมล</span>
                        <input type="text" class="form-control" value="<?php echo $result['u_email']; ?>" placeholder="อีเมล" disabled>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <span class="input-group-text">ชื่อจริง</span>
                        <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $first_name; ?>" placeholder="ชื่อจริง" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <span class="input-group-text">นามสกุล</span>
                        <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $last_name; ?>" placeholder="นามสกุล" required>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <span class="input-group-text">รหัสผ่าน</span>
                        <input type="password" class="form-control" name="password" id="password" minlength="8" placeholder="รหัสผ่าน">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <span class="input-group-text">ยืนยันรหัสผ่าน</span>
                        <input type="password" class="form-control" name="password_confirm" id="password_confirm" minlength="8" placeholder="ยืนยันรหัสผ่าน">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <button type="submit" class="btn btn-lg btn-primary">บันทึก</button>
                </div>
            </div>
            <input type="hidden" name="edit_account" value="1">
        </form>

    </div>

    <?php include('include/footer.php') ?>
    <script src="assets/js/account.js"></script>
</body>

</html>