<?php 
    include('../lib/conn.php');

    if(isset($_POST['approve'])){
        $u_id = $_POST['u_id'];
        $sql = "UPDATE `tbuser` SET `u_status`='1' WHERE u_id = '$u_id'";
        $result = mysqli_query($con,$sql);
    }
    if(isset($_POST['unapprove'])){
        $u_id = $_POST['unu_id'];
        $sql = "UPDATE `tbuser` SET `u_status`='0' WHERE u_id = '$u_id'";
        $result = mysqli_query($con,$sql);
    }
    
    $sql = "SELECT * FROM `tbuser`";
    $result = mysqli_query($con,$sql);
    
    foreach($result as $value){
        $u_id = $value['u_id'];
        if($value['u_sex']=='M'){
            $u_sex = "ผู้ชาย";
        }else if($value['u_sex']=='F'){
            $u_sex = "ผู้หญิง";
        }
?>
<div class="row">
    <div class="col-auto">
    <img src="../img/profile/<?php echo $value['u_img'];?>" class="rounded-circle" width="50px" height="50px"> 
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        ชื่อ-สกุล
    </div>
    <div class="col-auto">
        <?php echo $value['u_fname']." ".$value['u_lname'];?>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        อีเมล
    </div>
    <div class="col-auto">
        <?php echo $value['u_email'];?>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        รหัสผ่าน
    </div>
    <div class="col-auto">
        <?php echo $value['u_pass'];?>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        เพศ
    </div>
    <div class="col-auto">
        <?php echo $u_sex;?>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        สถานะ
    </div>
    <div class="col-auto">
        <?php 
            if($value['u_status']=='0'){
                ?>
                <p>ยังไม่ได้อนุมัติ</p>
                <form action="" method="post">
                    <input type="hidden" name="u_id" value="<?php echo $value['u_id'];?>">
                    <button class="btn btn-outline-success" name="approve" type="submit">อนุมัติ</button>
                </form>
        <?php
            }elseif($value['u_status']=='1'){
        ?>
        <p>อนุมัติแล้ว</p>
                <form action="" method="post">
                    <input type="hidden" name="unu_id" value="<?php echo $value['u_id'];?>">
                    <button class="btn btn-outline-danger" name="unapprove" type="submit">ยกเลิกการอนุมัติ</button>
                </form>
        <?php
            }
        ?>
    </div>
</div>
    <hr>
<?php }?>