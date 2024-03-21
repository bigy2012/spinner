<?php
    session_start();
    include('lib/conn.php');

    if(isset($_POST['userlogin'])){
        $u_email = $_POST['username'];
        $u_pass = $_POST['password'];

        $sql = "SELECT * FROM tbuser WHERE u_email = '$u_email' AND u_pass = '$u_pass'";
        $result = mysqli_query($con,$sql);
        $num = mysqli_num_rows($result);

        if($num != null){
            $row = mysqli_fetch_assoc($result);
            if($row['u_status'] == '0'){
                echo
                "
                    <script>
                        alert('บัญชีนี้ยังไม่ได้รับการอนุมัติ');
                        location.href = 'index.php';
                    </script>
                ";
            }elseif($row['u_status'] == '1'){
                $_SESSION['u_id'] = $row['u_id'];
                echo
                "
                    <script>
                        location.href = 'user_index.php';
                    </script>
                ";
            }
        }else{
            echo
                "
                    <script>
                        alert('อีเมลหรือรหัสผ่านไม่ถูกต้อง');
                        location.href = 'index.php';
                    </script>
                ";
        }
    }
?>