<?php
    include('lib/conn.php');

    $u_id = $_SESSION['u_id'];

    $sql="SELECT * FROM `tbuser` WHERE u_id != '$u_id' AND u_status = '1'";
    $result = mysqli_query($con,$sql);

        
    foreach ($result as $value) {
        
        $fu_id = $value['u_id'];

        $fsql = "SELECT * FROM `tbfriend` WHERE (f_user_id = '$u_id' AND f_friend_id ='$fu_id') OR (f_user_id = '$fu_id' AND f_friend_id = '$u_id')";
        $fresult=mysqli_query($con,$fsql);
        $fnum = mysqli_num_rows($fresult);

        ?>
            <div class="row">
                <div class="col-md-2"><img src="img/profile/<?php echo $value['u_img']?>" class="rounded-circle" width="50px" height="50px"></div>
                <div class="col-md-2">ชื่อ-นามสกุล</div>
                <div class="col-md-2"><?php echo $value['u_fname']." ".$value['u_lname'];?></div><b>|&nbsp;&nbsp;&nbsp;&nbsp;</b>               
             
        <?php

        if($fnum > 0){
            foreach ($fresult as $fvalue) {
                $f_id = $fvalue['f_id'];
                if($fvalue['f_status'] == '0' && $fvalue['f_user_id'] == $u_id){
                   ?>
                    <button class="btn btn-light" disabled>รอตอบรับการเป็นเพื่อน...</button>
                   <?php
                }elseif($fvalue['f_status'] == '0' && $fvalue['f_friend_id'] == $u_id){
                   ?>
                        <div class="text-center">
                            <form action="friend_add.php" method="post">
                                <input type="hidden" value="<?php echo $f_id;?>" name="f_id">
                                <button type="submit" name="conf_friend" class="btn btn-outline-primary">ยอมรับเป็นเพื่อน</button>
                            </form>
                        </div>
                   <?php
                }elseif($fvalue['f_status'] == '1'){
                   ?>
                        <div class="text-center">
                            <form action="friend_add.php" method="post">
                                <input type="hidden" value="<?php echo $f_id;?>" name="f_id">
                                <button type="submit" name="del_friend" class="btn btn-outline-danger">ยกเลิกเป็นเพื่อน</button>
                            </form>
                        </div>
                   <?php
                }
            }
        }else{
        
            ?>
                <div class="text-center">
                    <form action="friend_add.php" method="post">
                        <input type="hidden" value="<?php echo $u_id;?>" name="u_id">
                        <input type="hidden" value="<?php echo $fu_id;?>" name="fu_id">
                        <button type="submit" name="add_friend" class="btn btn-outline-success">ขอเพิ่มเป็นเพื่อน</button>
                    </form>
                </div>       
                
            <?php            
        }
        ?>
        </div>
        <hr>
        <?php
    }
?>