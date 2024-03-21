<?php
    include('lib/conn.php');
    
    if(isset($_POST['useredit']) && isset($_POST['password'])==isset($_POST['passwordconf'])){

        $u_id = $_POST['eu_id'];

        $u_fname = $_POST['u_fname'];
        $u_lname = $_POST['u_lname'];
        $u_pass = $_POST['u_pass'];
        $u_sex = $_POST['u_sex'];

        $sql="SELECT * FROM `tbuser` WHERE u_id ='$u_id'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);

        if($row['u_img'] != null && $row['u_img'] != 'm.png' && $row['u_img'] != 'f.png'){
            @$u_img = $row['u_img'];            
        }
        
        $upfile = explode(".",$_FILES['upu_img']['name']);
        @$upu_img = "$u_id.".$upfile['1'];

        $u_dir="img/profile/";
        $u_file=$u_dir .basename($_FILES['upu_img']['name']);
        $imgType = strtolower(pathinfo($u_file,PATHINFO_EXTENSION));
        $ex_arr = array("jpg","png");

        if(in_array($imgType,$ex_arr)){
            unlink('img/profile/'.$u_img);
            if(move_uploaded_file($_FILES['upu_img']['tmp_name'],'img/profile/'.$upu_img)){
                $sql = "UPDATE `tbuser` SET `u_fname`='$u_fname',`u_lname`='$u_lname',`u_pass`='$u_pass',`u_sex`='$u_sex',`u_img`='$upu_img' WHERE u_id='$u_id'";
                mysqli_query($con,$sql);
            }
        }else{
            $sql = "UPDATE `tbuser` SET `u_fname`='$u_fname',`u_lname`='$u_lname',`u_pass`='$u_pass',`u_sex`='$u_sex' WHERE u_id='$u_id'";
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