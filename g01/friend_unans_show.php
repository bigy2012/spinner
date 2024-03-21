<?php
    include('lib/conn.php');

    $u_id = $_SESSION['u_id'];
    $sql="SELECT * FROM `tbuser` WHERE u_status = '1' AND u_id != '$u_id'";
    $result = mysqli_query($con,$sql);

    foreach ($result as $value) {
        $f_friend_id = $value['u_id'];

        $sql2 = "SELECT * FROM `tbfriend` WHERE (f_user_id = '$u_id' AND f_friend_id = '$f_friend_id') OR (f_user_id = '$f_friend_id' AND f_friend_id = '$u_id')";
        $result2 = mysqli_query($con,$sql2);
        $num2 = mysqli_num_rows($result2);
        ?>
            <div class="row">
                <div class="col-md-2"><img src="img/profile/<?php echo $value['u_img']?>" class="rounded-circle" width="50px" height="50px"></div>                            
                <div class="col-md-2">ชื่อ-นามสกุล</div>
                <div class="col-md-2"><?php echo $value['u_fname']." ".$value['u_lname'];?></div>
           
        <?php
      
        if($num2 > 0){
            foreach ($result2 as $value2) {
                if($value2['f_status'] == '0'){
                    ?>
                           
                            <div class=" col-md-2text-center"><button type="button" class="btn btn-light" disabled>รอตอบรับเป็นเพื่อน</button></div>
                        
                    <?php
                }
            }
        }else{
            ?>
                <div class=" col-md-2text-center">
                    <form action="friend_add.php" method="post">
                        <input type="hidden" value="<?php echo $u_id;?>" name="u_id">
                        <input type="hidden" value="<?php echo $f_friend_id;?>" name="fu_id">
                        <button type="submit" name="add_friend" class="btn btn-outline-success">ขอเพิ่มเป็นเพื่อน</button>
                    </form>
                </div>           
        <?php } ?>    
    </div><hr>
    <?php }
?>