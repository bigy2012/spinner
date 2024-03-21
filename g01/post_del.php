<?php
    include('lib/conn.php');

    if($_GET['p_id']){
        $p_id = $_GET['p_id'];
        $sql = "SELECT * FROM `tbpost` WHERE p_id = '$p_id'";      
        $result = mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);
        if($row['p_img'] != null){
            $p_img = $row['p_img'];
            unlink('img/post/'.$p_img);
        }
        $sql= "DELETE FROM `tbpost` WHERE p_id='$p_id'";
        mysqli_query($con,$sql);
        
        mysqli_close($con,$sql);
        echo "
                <script>
                    location.href='user_index.php';
                </script>
            ";
    }

?>