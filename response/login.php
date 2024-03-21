<?php
include('../include/function.php');
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $output = null;
    if ($sql_db->emailAvailable($email) > 0) {
        $result = $sql_db->login($email, $password);
        if ($result != null) {
            if ($result['u_status'] == 1) {
                $_SESSION['user_id'] = $result['u_id'];
                $_SESSION['user_name'] = $result['u_name'];
                http_response_code(200);
            } else {
                $output = [
                    'message' => 'กรุณายืนยันอีเมลก่อน'
                ];
                http_response_code(400);
            }
        } else {
            $output = [
                'message' => 'รหัสผ่านไม่ถูกต้อง'
            ];
            http_response_code(400);
        }
    } else {
        $output = [
            'message' => 'ไม่พบอีเมล'
        ];
        http_response_code(400);
    }
    echo json_encode($output);
}
