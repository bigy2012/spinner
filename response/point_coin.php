<?php
    include('../include/function.php');
    if(isset($_POST['point_coin'])){
        $user_id = $_SESSION['user_id'];
        $result = $sql_db->user_byid($user_id);
        $output = null;
        if($result){
            $output = [
                'point'=>$result['u_point'],
                'coin'=>$result['u_coin']
            ];
        }
        echo json_encode($output);
    }
?>