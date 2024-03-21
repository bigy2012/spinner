
<div class="modal" id="user_edit<?php echo $u_id;?>">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">แก้ไขข้อมูลส่วนตัว</h5>
            <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="user_edit_save.php" method="post" enctype="multipart/form-data">
            <div class="row mb-2 justify-content-center">
                <img class="rounded-circle" src="img/profile/<?php echo $row['u_img'];?>" width="85px" height="85px">
                
                    <div class="custom-file mt-2 mr-5 ml-5">
                        <input type="file" class="custom-file-input" name="upu_img">
                        <label class="custom-file-label">รูปภาพ</label>
                    </div>           
            </div>
                <div class="row mb-2">
        <div class="col-4">
            <label for="">ชื่อ :</label>
        </div>
        <div class="col-8">
            <input type="text" name="u_fname" class="form-control" value="<?php echo $row['u_fname'];?>" required>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-4">
            <label for="">นามสกุล :</label>
        </div>
        <div class="col-8">
        <input type="text" name="u_lname" class="form-control" value="<?php echo $row['u_lname'];?>" required>
        </div>
    </div>
    <div class="row mb-2">
    <div class="col-4">
            <label for="">อีเมล :</label>
        </div>
        <div class="col-8">
        <input type="email" name="u_email" class="form-control disible" value="<?php echo $row['u_email'];?>" disabled required>
        </div>
    </div>
    <div class="row mb-2">
    <div class="col-4">
            <label for="">รหัสผ่าน :</label>
        </div>
        <div class="col-8">
        <input type="password" name="u_pass" class="form-control" value="<?php echo $row['u_pass'];?>" minlength="8" required>
        </div>
    </div>    
    <div class="row mb-2">
    <div class="col-4">
            <label for="">ยืนยัน รหัสผ่าน :</label>
        </div>
        <div class="col-8">
        <input type="password" name="u_pass" class="form-control" value="<?php echo $row['u_pass'];?>" minlength="8" required>
        </div>
    </div>    
    <div class="row md-2">
            <div class="col-4">
                <label for="">เพศ :</label>
            </div>
        <div class="col-2">
            <input type="radio" name="u_sex" id="sex1" class="form-check" value="M" <?php if($row['u_sex']== 'M') echo "checked"; ?> required>
            <label class="form-check-label">ผู้ชาย</label>
        </div>
        <div class="col-2">
            <input type="radio" name="u_sex" id="sex2" class="form-check" value="F" <?php if($row['u_sex']== 'F') echo "checked"; ?> required>
            <label class="form-check-label">ผู้หญิง</label>
        </div>
    </div>
            <p class="text-center">
                <input type="hidden" name="eu_id" value="<?php echo $row['u_id'];?>">
                <button type="submit" class="btn btn-outline-primary mt-2 col-12" name="useredit">บันทึก</button>
            </p>
            </form>
        </div>
    </div>
</div>
</div>