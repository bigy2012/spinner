<?php
    include('lib/conn.php');

    $u_id = $_SESSION['u_id'];

        $fsql = "SELECT * FROM `tbfriend` WHERE (f_user_id = '$u_id' OR f_friend_id ='$u_id') AND f_status='1'";
        $fresult=mysqli_query($con,$fsql);
        
    foreach ($fresult as $fvalue) {
        
        $f_id = $fvalue['f_id'];
        $f_user_id = $fvalue['f_user_id'];
        $f_friend_id = $fvalue['f_friend_id'];

        $sql = "SELECT * FROM `tbuser` WHERE (u_id = '$f_user_id' OR u_id ='$f_friend_id') AND u_id != '$u_id'";
        $result=mysqli_query($con,$sql);
        foreach ($result as $value) {
            
            ?>
                    <div class="row">
                <div class="col-md-2"><img src="img/profile/<?php echo $value['u_img']?>" class="rounded-circle" width="50px" height="50px"></div>
                <div class="col-md-2">ชื่อ-นามสกุล</div>
                <div class="col-md-2"><?php echo $value['u_fname']." ".$value['u_lname'];?></div><b>|&nbsp;&nbsp;&nbsp;&nbsp;</b>               

                <div class="text-center">
                    <form action="friend_add.php" method="post">
                        <input type="hidden" value="<?php echo $f_id;?>" name="f_id">
                        <button type="submit" name="delf_friend" class="btn btn-outline-danger">ยกเลิกเป็นเพื่อน</button>
                    </form>
                </div>       
                
            
        </div>
        <hr>
            <?php
        }
    }
        ?>
             
       
 