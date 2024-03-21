<?php
    include('lib/conn.php');

    $u_id = $_SESSION['u_id'];

    $sql="SELECT * FROM `tbfriend` WHERE (f_user_id = '$u_id' OR f_friend_id = '$u_id') AND f_status ='0'";
    $result = mysqli_query($con,$sql);

    foreach ($result as $value) {
        $f_id = $value['f_id'];
        $f_user_id = $value['f_user_id'];
        $f_friend_id = $value['f_friend_id'];

        $sql2 ="SELECT * FROM `tbuser` WHERE (u_id = '$f_user_id' OR u_id = '$f_friend_id') AND u_id != '$u_id'";
        $result2 = mysqli_query($con,$sql2);
        $num2 = mysqli_num_rows($result2);

        foreach ($result2 as $value2) {
            ?>
                <div class="row">
                <div class="col-md-2"><img src="img/profile/<?php echo $value2['u_img']?>" class="rounded-circle" width="50px" height="50px"></div>
                <div class="col-md-2">ชื่อ-นามสกุล</div>
                <div class="col-md-2"><?php echo $value2['u_fname']." ".$value2['u_lname'];?></div><b>|&nbsp;&nbsp;&nbsp;&nbsp;</b>
                
            <?php
        }
        if($u_id != $f_user_id){
            ?>
                <div class="text-center">
                <form action="friend_add.php" method="post">
                    <input type="hidden" value="<?php echo $f_id;?>" name="f_id">
                    <button type="submit" name="conff_friend" class="btn btn-outline-primary">ตอบรับการเป็นเพื่อน</button>
                </form>
            </div>
            <?php
        }else{
        ?>
            <button type="submit" class="btn btn-light" disabled>รอตอบรับการเป็นเพื่อน...</button>
        <?php
        } ?>
            </div>
            <hr>
        <?php
    }

?>