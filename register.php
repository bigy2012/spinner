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
            <form id="register">
                <h1 class="h3 mb-3 fw-normal">สมัครสมาชิก</h1>
                <div class="form-floating">
                    <input type="text" class="form-control" name="first_name" id="first_name" maxlength="20" placeholder="First Name" required>
                    <label for="first_name">First Name</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="last_name" id="last_name" maxlength="20" placeholder="Last Name" required>
                    <label for="last_name">Last Name</label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email address" required>
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="password" minlength="8" placeholder="password" required>
                    <label for="password">Password</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="password" class="form-control" name="password_confirm" id="password_confirm" minlength="8" placeholder="password_confirm" required>
                    <label for="password_confirm">Password Confirm</label>
                </div>
                <input type="hidden" name="register" value="1">
                <button class="w-100 btn btn-lg btn-primary" id="btn_register" type="submit">สมัครสมาชิก</button>
            </form>
        </main>
    </div>

    <?php include('include/footer.php') ?>
    <script src="assets/js/register.js"></script>
</body>

</html>