<?php 
    session_start();
    include('lib/conn.php');

    if(isset($_POST['reguser'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $passwordcomf = $_POST['passcomf'];
        $sex = $_POST['sex'];

        if($password == $passwordcomf){

            $sql="SELECT * FROM `tbuser` WHERE `u_email`='$email'";
            $result=mysqli_query($sql,$con);
            $num=mysqli_num_rows($result);
            if($num == null){
                if($sex == 'M'){
                    $img="m.png";
                }else if($sex == 'F'){
                    $img="f.png";
                }

                $sql = "INSERT INTO `tbuser`(`u_fname`, `u_lname`, `u_email`, `u_pass`, `u_sex`, `u_status`, `u_img`) 
                VALUES ('$fname','$lname','$email','$password','$sex','0','$img')";
                if(mysqli_query($con,$sql)){
                    echo
                    "
                        <script>
                            alert('สมัครสมาชิกเรียบร้อยแล้ว');
                            location.href='index.php';
                        </script>
                    ";
                }else{
                    echo
                    "
                        <script>
                            alert('สมัครสมาชิกไม่สำเร็จ');
                            location.href='index.php';
                        </script>
                    ";
                }
                
            }else{
                echo
                "
                    <script>
                        alert('มีอีเมลนี้อยู่ในระบบแล้ว');
                    </script>
                ";
                
            }
            
        }else{
            echo
                "
                    <script>
                        alert('ชื่อหรือรหัสผ่านไม่ตรงกัน');
                    </script>
                ";
        }
    }

?>