<?php
include('include/function.php');
$_SESSION['active'] = 'game';
$game = $sql_db->game_byid('spinner_point');
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
    <h1 class="mb-4"><?php echo $game['g_title']; ?></h1>
    <div class="row justify-content-center bg-white shadow-sm">
      <div class="col-12">
        <div class="animate__animated" id="superwheel"></div>
      </div>
      <div class="col-sm-5 mb-2">
        <button class="btn btn-primary btn-lg" id="spin-button">Start</button>
      </div>
      <div class="col-12 mb-4">
        <span><?php echo $game['g_text']; ?></span>
      </div>
    </div>
  </div>
  
  <?php include('include/footer.php') ?>
  <script src="assets/js/superwheel.js"></script>
</body>

</html>
<script>
  <?php
  if ($game['g_status'] != 1) {
  ?>
    Swal.fire({
      icon: 'error',
      title: 'ไม่สามารถเล่นเกมนี้ได้',
      timer: 2000
    }).then((result) => {
      location.href = '.';
    })
    <?php
  } else {
    if (!$sql_db->auth_login()) {
    ?>
      Swal.fire({
        icon: 'error',
        title: 'กรุณาเข้าสู่ระบบก่อน',
        timer: 2000
      }).then((result) => {
        location.href = 'login.php';
      })
  <?php
    }
  }
  ?>
</script>