<?php
    include('lib/conn.php');

    $u_id = $_SESSION['u_id'];

        $sql = "SELECT * FROM `tbpost` ORDER BY p_id DESC";
        $result = mysqli_query($con,$sql);
        
    foreach ($result as $value) {
        $p_id = $value['p_user_id'];

        $sql2 = "SELECT * FROM `tbuser` WHERE u_id = '$p_id'";
        $result2 = mysqli_query($con,$sql2);
        $row2=mysqli_fetch_assoc($result2);

        foreach ($result2 as $value2) {

            $sql3 = "SELECT * FROM `tbfriend` WHERE (f_user_id ='$u_id' AND f_friend_id ='$p_id') OR (f_user_id ='$p_id' AND f_friend_id ='$u_id') AND f_status='1'";
            $result3 = mysqli_query($con,$sql3);
            $num3 = mysqli_num_rows($result3);    
            
            if($num3 > 0){
        ?>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <p><img src="img/profile/<?php echo $row2['u_img'];?>" class="rounded-circle" width="50px" height="50px"> &nbsp;<?php echo $row2['u_fname'].' '.$row2['u_lname'];?></p> 
                </div>                
                </div>
                <div class="row">
                <div class="col-md-2">
                    เนื้อหา
                </div>
                <div class="col-md-5">
                    <?php echo $value['p_text'];?>
                    <?php
                        if($value['p_img'] != null){
                            ?>                      
                    <p class="mt-3"><img src="img/post/<?php echo $value['p_img'];?>" whdth="180px" height="130px"></p>
                    <?php }
                    
                    if($u_id == $p_id){
                        ?>
                       
                        <p class="text-right">
                            <a href="#" data-toggle="modal" data-target="#commentpost<?php echo $value['p_id'];?>">[แสดงความคิดเห็น]</a>&nbsp;&nbsp;
                           <a href="#" data-toggle="modal" data-target="#editpost<?php echo $value['p_id'];?>">[แก้ไข]</a> 
                           <a href="Javascript:if(confirm('ยืนยันการลบ ?')==true){window.location='post_del.php?p_id=<?php echo $value["p_id"];?>';}" style="color: red;">[ลบโพส]</a> 
                        </p>
                        
                    <?php
                    }
                    else{                                                  
                        ?>
                            <p class="text-right">
                                <a href="#" data-toggle="modal" data-target="#commentpost<?php echo $value['p_id'];?>">[แสดงความคิดเห็น]</a>&nbsp;&nbsp;                              
                            </p>
                        <?php
                        }                 
                    
                    include('post_edit.php');
                    include('comment_post.php');
                    include('comment_show.php');
                    ?>
                </div>
            </div>            
        </div>
        <hr>
    <?php   
                }
            } 
        }

?>