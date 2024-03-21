<?php
    include('../lib/conn.php');
    
    $a_id = $_SESSION['a_id'];
    $sql = "SELECT * FROM `tbadmin` WHERE a_id='$a_id'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
?>
<div class="row">
    <div class="col-md-4">
        ชื่อ-สกุล
    </div>
    <div class="col-auto">
        <?php echo $row['a_name'];?>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        อีเมล
    </div>
    <div class="col-auto">
        <?php echo $row['a_email'];?>
    </div>
</div>
<hr>
<p class="text-center">
    <a href="#" data-toggle="modal" data-target="#admin_edit<?php echo $a_id;?>">แก้ไขข้อมูลส่วนตัว</a>
</p>
<p class="text-center">
    <a href="../lib/logout.php">ออกจากระบบ</a>
</p>
<?php 
    include('admin_edit_form.php');
?>