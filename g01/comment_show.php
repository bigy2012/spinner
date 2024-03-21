<?php
    include('lib/conn.php');

    $u_id = $_SESSION['u_id'];
    $p_id = $value['p_id'];

    $sql = "SELECT * FROM `tbcomment` WHERE c_post_id ='$p_id'";
    $result = mysqli_query($con,$sql);
        
    foreach ($result as $value) {
        $c_user_id = $value['c_user_id'];

        $sql2 = "SELECT * FROM `tbuser` WHERE u_id = '$c_user_id'";
        $result2 = mysqli_query($con,$sql2);
        $row2=mysqli_fetch_assoc($result2);
?>

    <hr>
    <!-- <div class="row">
            <div class="col-md-6">
                ความคิดเห็น 
            </div>
        </div><br>
                </div> -->
        <div class="row">
                <div class="col-md-6">
                    <p><img src="img/profile/<?php echo $row2['u_img'];?>" class="rounded-circle" width="30px" height="30px"> &nbsp;<?php echo $row2['u_fname'].' '.$row2['u_lname'];?></p> 
                </div>                
                <div class="col-md-3">
                    ข้อความ 
                </div>                
                <div class="col-md-3">
                    <?php echo $value['c_text'];?> 
                </div>                
        </div>
        <hr>

        <?php if($row2['u_id']==$u_id){  ?>
        <p class="text-right">           
            <a href="#" data-toggle="modal" data-target="#editcomment<?php echo $value['c_id'];?>">[แก้ไขคอมเม้น]</a> 
            <a href="Javascript:if(confirm('ยืนยันการลบ ?')==true){window.location='comment_del.php?c_id=<?php echo $value["c_id"];?>';}" style="color: red;">[ลบคอมเม้น]</a> 
        </p>
        <?php include('comment_edit.php');?>
<?php }
}
?>