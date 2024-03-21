<?php
include('../include/function.php');
if (isset($_POST['register'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $output = null;
    if ($sql_db->emailAvailable($email) == 0) {
        if ($password == $password_confirm) {
            $result = $sql_db->insert_user($first_name, $last_name, $email, $password, 0, 0, 1);
            if($result){
                $output = [
                    'message' => 'สมัครสมาชิกสำเร็จ'
                ];
                http_response_code(200);
            }else{
                $output = [
                    'message' => 'สมัครสมาชิกไม่สำเร็จ'
                ];
                http_response_code(400);
            }
        } else {
            $output = [
                'message' => 'รหัสผ่านไม่ตรงกัน'
            ];
            http_response_code(400);
        }
    } else {
        $output = [
            'message' => 'อีเมลนี้ถูกใช้แล้ว'
        ];
        http_response_code(400);
    }
    echo json_encode($output);
}
