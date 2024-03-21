<?php
    include('../lib/conn.php');
        $sql = "SELECT * FROM `tbpost` ORDER BY p_id DESC";
        $result = mysqli_query($con,$sql);
        
    foreach ($result as $value) {
        $p_id = $value['p_user_id'];

        $sql2 = "SELECT * FROM `tbuser` WHERE u_id = '$p_id'";
        $result2 = mysqli_query($con,$sql2);
        $row2=mysqli_fetch_assoc($result2);      
        
        ?>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <p><img src="../img/profile/<?php echo $row2['u_img'];?>" class="rounded-circle" width="50px" height="50px"> &nbsp;<?php echo $row2['u_fname'].' '.$row2['u_lname'];?></p> 
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
                    <p class="mt-3"><img src="../img/post/<?php echo $value['p_img'];?>" whdth="180px" height="130px"></p>
                    <?php }                    
                    ?>
                   </div> 
                   <a href="Javascript:if(confirm('ยืนยันการลบ ?')==true){window.location='post_del.php?p_id=<?php echo $value["p_id"];?>';}" style="color: red;">[ลบโพส]</a> 
            </div>            
        </div>
        <hr>
    <?php
        }

?>