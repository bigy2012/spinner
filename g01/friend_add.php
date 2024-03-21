<?php
    session_start();
    include('lib/conn.php');

    if(isset($_POST['add_friend'])){
        $u_id = $_POST['u_id'];
        $fu_id = $_POST['fu_id'];

        $sql = "INSERT INTO `tbfriend`(`f_user_id`, `f_friend_id`, `f_status`) VALUES ('$u_id','$fu_id','0')";
        mysqli_query($con,$sql);

        echo 
        "
            <script>
                location.href='user_list.php';
            </script>
        ";

    }

    if(isset($_POST['conf_friend'])){

        $f_id = $_POST['f_id'];
        $sql = "UPDATE `tbfriend` SET `f_status`='1' WHERE f_id = '$f_id'";
        mysqli_query($con,$sql);

        echo 
        "
            <script>
               location.href='user_list.php';
            </script>
        ";

    }

    if(isset($_POST['del_friend'])){

        $f_id = $_POST['f_id'];
        $sql = "DELETE FROM `tbfriend` WHERE f_id = '$f_id'";
        mysqli_query($con,$sql);

        echo 
        "
            <script>
               location.href='user_list.php';
            </script>
        ";

    }
    if(isset($_POST['delf_friend'])){

        $f_id = $_POST['f_id'];
        $sql = "DELETE FROM `tbfriend` WHERE f_id = '$f_id'";
        mysqli_query($con,$sql);

        echo 
        "
            <script>
               location.href='friend_list.php';
            </script>
        ";

    }

    
    if(isset($_POST['conff_friend'])){

        $f_id = $_POST['f_id'];
        $sql = "UPDATE `tbfriend` SET `f_status`='1' WHERE f_id = '$f_id'";
        mysqli_query($con,$sql);

        echo 
        "
            <script>
               location.href='friend_ans_list.php';
            </script>
        ";

    }
?>