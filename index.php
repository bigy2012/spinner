<?php
include('include/function.php');
$_SESSION['active'] = 'index';
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

  <div class="container mb-5">
    <h1 class="text-center mb-2">Game Coin</h1>
    <img src="assets/image/background/01.png" class="rounded d-block w-100">
  </div>

  <?php include('include/footer.php') ?>
</body>

</html>