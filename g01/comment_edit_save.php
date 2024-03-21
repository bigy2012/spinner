<?php
    session_start();
    include('lib/conn.php');

    $u_id = $_SESSION['u_id'];
    
    if(isset($_POST['edit_comment'])){       

        $c_id = $_POST['c_id'];
        $c_text = $_POST['c_text'];
       
            $sql = "UPDATE `tbcomment` SET `c_text`='$c_text' WHERE c_id='$c_id'";
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