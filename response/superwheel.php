<?php
include('../include/function.php');
if (isset($_POST['slices'])) {
    $result = $sql_db->spinner();
    $output = null;
    foreach ($result as $key => $value) {
        if ($value['s_status']  == "1") {
            $output[] = [
                'id' => $value['s_id'],
                'text' => $value['s_text'],
                'message' => $value['s_message'],
                'background' => $value['s_background'],
                'custom_key' => $value['s_custom_key']
            ];
        }
    }
    echo json_encode($output);
}
if (isset($_POST['percent'])) {
    $user_id = $_SESSION['user_id'];
    $result = $sql_db->spinner();
    $total_percent = 0;
    foreach ($result as $key => $value) {
        if ($value['s_status']  == "1") {
            $total_percent += $value['s_percent'];
        }
    }
    $percent = rand(0, $total_percent);
    $total = 0;

    $id = null;
    $point = null;
    foreach ($result as $key => $value) {
        if ($value['s_status']  == "1") {
            $low = $total;
            $high = $total + $value['s_percent'];
            if ($percent > $low && $percent <= $high) {
                $id = $value['s_id'];
                $point = $value['s_point'];
                break;
            }
            $total += $value['s_percent'];
        }
    }
    $output = null;
    $result = $sql_db->user_byid($user_id);
    $game = $sql_db->game_byid('spinner_point');
    $coin = $game['g_coin'];
    if ($result['u_coin'] >= $coin) {
        if ($sql_db->update_point($user_id, $point) && $sql_db->update_coin($user_id, $coin)) {
            $result = $sql_db->user_byid($user_id);
            $output = [
                'id' => $id,
                'coin' => $result['u_coin']
            ];
        } else {
            $output = [
                'message' => 'หมุนวงล้อไม่สำเร็จ'
            ];
            http_response_code(400);
        }
    } else {
        $output = [
            'message' => 'คุณมี coin ไม่พอสำหรับการเล่น'
        ];
        http_response_code(400);
    }
    echo json_encode($output);
}
