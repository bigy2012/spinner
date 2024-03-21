<?php
    session_start();
    include('lib/conn.php');

    $u_id = $_SESSION['u_id'];
    
    if(isset($_POST['comment_post'])){       

        $p_id = $_POST['p_id'];
        $c_text = $_POST['c_text'];
       
            $sql = "INSERT INTO `tbcomment`( `c_post_id`, `c_user_id`, `c_text`) VALUES ('$p_id','$u_id','$c_text')";
                mysqli_query($con,$sql);
        
        if($sql != null){
            echo "
                <script>
                     // alert('แก้ไขสำเร็จ');
                   location.href='user_index.php';
                </script>
            ";
        }else{
            echo "
            <script>
                alert('เกิดข้อผิดพลาด');
               location.href='user_index.php';
            </script>
        ";
        }
        
    }   

?>