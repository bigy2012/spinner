<?php
    include('../lib/conn.php');
    
    $a_id=$_SESSION['a_id'];
    $a_name = $_SESSION['a_name'];

    if(isset($_POST['adminedit'])){
        $a_name = $_POST['a_name'];
        $a_email = $_POST['a_email'];
        $a_pass = $_POST['a_pass'];

        $sql = "UPDATE `tbadmin` SET `a_name`='$a_name',`a_pass`='$a_pass' WHERE  a_id = '$a_id'";
        $result = mysqli_query($con,$sql);

        if($result != null){
            echo "
                <script>                    
                    location.href='.';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('แก้ไขไม่สำเร็จ');
                    location.href='.';
                </script>
            ";
        }
    }
?>
<div class="modal" id="admin_edit<?php echo $a_id;?>">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">แก้ไขข้อมูลส่วนตัว</h5>
            <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
            <div class="row mb-2">
        <div class="col-4">
            <label for="">ชื่อ-สกุล :</label>
        </div>
        <div class="col-8">
            <input type="text" name="a_name" class="form-control" value="<?php echo $row['a_name'];?>" required>            
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-4">
            <label for="">อีเมล :</label>
        </div>
        <div class="col-8">
            <input type="email" name="a_email" class="form-control" value="<?php echo $row['a_email'];?>" disabled required>            
        </div>
    </div>
    <div class="row nb-2">
        <div class="col-4">
            <label for="">รหัสผ่าน :</label>
        </div>
        <div class="col-8">
            <input type="password" name="a_pass" class="form-control" value="<?php echo $row['a_pass'];?>" required>            
        </div>
    </div>
    <button type="submit" class="btn btn-outline-primary mt-2 col-12" name="adminedit">บันทึก</button>
            </form>
        </div>
    </div>
</div>
</div>