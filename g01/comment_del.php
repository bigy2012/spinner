<?php
    include('lib/conn.php');

    if($_GET['c_id']){
        $c_id = $_GET['c_id'];
        
        $sql= "DELETE FROM `tbcomment` WHERE c_id='$c_id'";
        mysqli_query($con,$sql);
        
        mysqli_close($con,$sql);
        echo "
                <script>
                    location.href='user_index.php';
                </script>
            ";
    }

?>