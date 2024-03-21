<?php
include('../include/function.php');
if (isset($_POST['edit_account'])) {
    $user_id = $_SESSION['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $password_present = $_POST['password_present'];
    $result = $sql_db->user_byid($user_id);
    $output = null;
    if ($result['u_password'] == md5($password_present)) {
        if ($password == $password_confirm) {
            $result = $sql_db->edit_account($user_id, $first_name, $last_name, $password);
            if ($result) {
                $result = $sql_db->user_byid($user_id);
                $_SESSION['user_name'] = $result['u_name'];
                $output = [
                    'message' => 'แก้ไขข้อมูลส่วนตัวสำเร็จ'
                ];
                http_response_code(200);
            } else {
                $output = [
                    'message' => 'แก้ไขข้อมูลส่วนตัวไม่สำเร็จ'
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
            'message' => 'รหัสผ่านไม่ถูกต้อง'
        ];
        http_response_code(400);
    }
    echo json_encode($output);
}