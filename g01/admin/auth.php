<?php
    session_start();
    
    if(!isset($_SESSION['a_name'])){
        header('Location: ./index.php');
        exit;
    }


?>