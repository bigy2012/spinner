<?php
    include('lib/conn.php');
    if(isset($_POST['edit_post'])){
        $p_id = $_POST['p_id'];

        $p_text = $_POST['p_text'];

        $sql="SELECT * FROM `tbpost` WHERE p_id ='$p_id'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);

        if($row['p_img'] != null){
            @$p_img = $row['p_img'];            
        }
        

        @$upfile = explode(".",$_FILES['p_img']['name']);
        @$p_img = "$p_id.".$upfile['1'];
        

        $p_dir="img/post/";
        $p_file=$p_dir .basename($_FILES['p_img']['name']);
        $imgType = strtolower(pathinfo($p_file,PATHINFO_EXTENSION));
        $ex_arr = array("jpg","png");

        if(in_array($imgType,$ex_arr)){
            unlink('img/post/'.$p_img);
            if(move_uploaded_file($_FILES['p_img']['tmp_name'],'img/post/'.$p_img)){
                $sql = "UPDATE `tbpost` SET `p_text`='$p_text',`p_img`='$p_img' WHERE p_id = '$p_id'";
                mysqli_query($con,$sql);
            }
        }else{
            $sql = "UPDATE `tbpost` SET `p_text`='$p_text' WHERE p_id = '$p_id'";
                mysqli_query($con,$sql);
        }
        echo "
                <script>
                    alert('แก้ไขสำเร็จ');
                    location.href='user_index.php';
                </script>
            ";
        
    }

?>