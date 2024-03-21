<?php
    include('lib/conn.php');
    
    $u_id = $_SESSION['u_id'];
    $sql = "SELECT * FROM `tbuser` WHERE u_id='$u_id'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
?>  
    
    <div class="row justify-content-center mb-3">
        <img src="img/profile/<?php echo $row['u_img'];?>" class="rounded-circle" width="120px" height="120px">
    </div>
    <div class="row mb-2">
        <div class="col-4">
            <label for="">ชื่อ-นามสกุล :</label>
        </div>
        <div class="col-8">
            <?php echo $row['u_fname'].' '.$row['u_lname'];?>
        </div>
    </div>
    <div class="row mb-2">
    <div class="col-4">
            <label for="">อีเมล :</label>
        </div>
        <div class="col-8">
        <?php echo $row['u_email'];?>
        </div>
    </div>    
    <hr>
<p class="text-center">
    <a href="#" data-toggle="modal" data-target="#user_edit<?php echo $u_id;?>">แก้ไขข้อมูลส่วนตัว</a>
</p>
<p class="text-center">
    <a href="lib/logout.php">ออกจากระบบ</a>
</p>
<?php 
    include('user_edit_form.php');
?>