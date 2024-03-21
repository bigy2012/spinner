<div class="row justify-content-center">
    <a href="post_total.php">
        <div class="btn btn-outline-primary" style="width: 270px;">
            <label>จำนวนโพสต์</label>
            <div><?php include('../post_total.php');?></div>
        </div>
    </a>
</div>

<div class="row justify-content-center mt-2">
    <a href="index.php">
        <div class="btn btn-outline-primary" style="width: 270px;">
            <label>ผู้ใช้านงานทั้งหมด</label>
            <div><?php include('user_total.php');?></div>
        </div>
    </a>
</div>

<div class="row justify-content-center mt-2">
    <a href="user_conf_show.php">
        <div class="btn btn-outline-primary" style="width: 270px;">
            <label>อนุมัติแล้ว</label>
            <div><?php include('user_conf.php');?></div>
        </div>
    </a>
</div>

<div class="row justify-content-center mt-2">
    <a href="user_unconf_show.php">
        <div class="btn btn-outline-primary" style="width: 270px;">
            <label>ยังไม่ได้อนุมัติ</label>
            <div><?php include('user_unconf.php');?></div>
        </div>
    </a>
</div>