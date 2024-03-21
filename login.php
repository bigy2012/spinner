<?php
include('include/function.php');
if ($sql_db->auth_login()) {
?>
    <script>
        location.href = '.'
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
    <div class="container text-center" id="form">
        <main class="form-signin">
            <form id="login">
                <h1 class="h3 mb-3 fw-normal">เข้าสู่ระบบ</h1>
                <div class="form-floating">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email address" required>
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <input type="hidden" name="login" value="1">
                <button class="w-100 btn btn-lg btn-outline-primary" type="submit">เข้าสู่ระบบ</button>
            </form>
        </main>
    </div>

    <?php include('include/footer.php') ?>
    <script src="assets/js/login.js"></script>
</body>

</html>