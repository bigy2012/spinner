<div class="d-flex align-items-center justify-content-center" id="preloader">
    <div class=" spinner-border text-primary" role="status"></div>
</div>
<nav class="navbar navbar-expand-md navbar-light sticky-top mb-5" id="navbar_top">
    <div class="container-lg">
        <a class="navbar-brand">
            <h2><?php echo $title; ?></h2>
        </a>
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item d-flex">
                    <a class="nav-link <?php if (isset($_SESSION['active']) && $_SESSION['active'] == "index") echo 'active'; ?>" aria-current="page" href="."><i class="fas fa-home"></i> หน้าแรก</a>
                </li>
                <li class="nav-item dropdown d-flex">
                    <a class="nav-link dropdown-toggle <?php if (isset($_SESSION['active']) && $_SESSION['active'] == "game") echo 'active'; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-crown"></i> สุ่มของรางวัล</a>
                    <ul class="dropdown-menu position-absolute">
                        <?php
                        $result = $sql_db->game();
                        foreach ($result as $key => $value) {
                            if ($value['g_status'] == 1) {
                        ?>
                                <li><a class="dropdown-item" href="<?php echo $value['g_url'] ?>"><?php echo $value['g_title'] ?></a></li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </li>
            </ul>
            <div class="ms-auto">
                <?php
                if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
                    $user_id = $_SESSION['user_id'];
                    $result = $sql_db->user_byid($user_id);
                ?>
                    <div class="dropdown">
                        <div class="d-block text-end">
                            <label><span class="text-primary" id="point"><?php echo $result['u_point'] ?></span> Point</label>
                            <label><span class="text-danger" id="coin"><?php echo $result['u_coin'] ?></span> Coin</label>
                            <button type="button" class="btn text-primary"><i class="fas fa-envelope"></i></button>
                        </div>
                        <div class="d-block text-end">
                            <label><?php echo $_SESSION['user_name'] ?></label>
                            <div class="btn-group">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><button class="dropdown-item" type="button" onclick="location.href = 'account.php'">ข้อมูลส่วนตัว</button></li>
                                    <li><button class="dropdown-item" type="button">แลกเปลี่ยน</button></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><button class="dropdown-item" type="button" onclick="location.href = 'logout.php'">ออกจากระบบ</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div class="row">
                        <div class="col-auto">
                            <button class="btn btn-outline-primary mb-2" onclick="location.href='login.php'">เข้าสู่ระบบ</button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary mb-2" onclick="location.href='register.php'">สมัครสมาชิก</button>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</nav>

<?php
if (isset($_SESSION['active'])) {
    unset($_SESSION['active']);
}
?>