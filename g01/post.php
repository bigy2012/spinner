<?php
    session_start();
    include('lib/conn.php');

    $u_id = $_SESSION['u_id'];
    
    if(isset($_POST['up_post'])){

        $sql = "SELECT * FROM `tbpost` ORDER BY p_id DESC LIMIT 1";
        $result = mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);
        $num= mysqli_num_rows($result);
        if($num > 0){
            $p_id = $row['p_id']+1;
        }else{
            $p_id = '1';
        }

        $p_text = $_POST['p_text'];

        $upfile = explode(".",$_FILES['p_img']['name']);
        @$p_img = "$p_id.".$upfile['1'];

        $p_dir="img/post/";
        $p_file=$p_dir .basename($_FILES['p_img']['name']);
        $imgType = strtolower(pathinfo($p_file,PATHINFO_EXTENSION));
        $ex_arr = array("jpg","png");
        
        if(in_array($imgType,$ex_arr)){
            if(move_uploaded_file($_FILES['p_img']['tmp_name'],'img/post/'.$p_img)){
                $sql = "INSERT INTO `tbpost`(`p_user_id`,`p_text`, `p_img`) VALUES ('$u_id','$p_text','$p_img')";
                mysqli_query($con,$sql);
            }
        }else{
            $sql = "INSERT INTO `tbpost`(`p_user_id`, `p_text`) VALUES ('$u_id','$p_text')";
                mysqli_query($con,$sql);
        }
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