<?php
session_start();
define('user_db', 'root');
define('pass_db', '');
define('host_db', '127.0.0.1');
define('database_db', 'game_spinner');

class sql_db
{
    function __construct()
    {
        try {
            $conn = new PDO("mysql:host=" . host_db . ";dbname=" . database_db, user_db, pass_db);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec("set names utf8");
            $this->conn = $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit;
        }
    }
    public function auth_login()
    {
        if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
            return true;
        } else {
            return false;
        }
    }
    public function game()
    {
        $query = $this->conn->prepare('SELECT * FROM `game`');
        $query->execute();
        $output = null;
        while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
            $output[] = $result;
        }
        return $output;
    }
    public function game_byid($id)
    {
        $query = $this->conn->prepare('SELECT * FROM `game` WHERE `g_id`=:id');
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function spinner()
    {
        $query = $this->conn->prepare('SELECT * FROM `spinner`');
        $query->execute();
        $output = null;
        while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
            $output[] = $result;
        }
        return $output;
    }
    public function insert_user($first_name, $last_name, $email, $password, $point, $coin, $status)
    {
        $name = $first_name . " " . $last_name;
        $password = md5($password);
        $query = $this->conn->prepare("INSERT INTO `user`(`u_id`, `u_name`, `u_email`, `u_password`, `u_point`, `u_coin`, `u_status`) 
            VALUES (null,:name,:email,:password,:point,:coin,:status)");
        $query->bindParam(':name', $name);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->bindParam(':point', $point);
        $query->bindParam(':coin', $coin);
        $query->bindParam(':status', $status);
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function emailAvailable($email)
    {
        $query = $this->conn->prepare('SELECT COUNT(*) FROM `user` WHERE `u_email`=:email');
        $query->bindParam(':email', $email);
        $query->execute();
        return $query->fetchColumn();
    }
    public function login($email, $password)
    {
        $password = md5($password);
        $query = $this->conn->prepare('SELECT * FROM `user` WHERE `u_email`=:email and `u_password`=:password');
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function user_byid($id)
    {
        $query = $this->conn->prepare('SELECT * FROM `user` WHERE `u_id`=:id');
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function update_point($id, $point)
    {
        $query = $this->conn->prepare('UPDATE `user` SET `u_point`=`u_point`' . $point . ' WHERE `u_id`=:id');
        $query->bindParam(':id', $id);
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function update_coin($id, $coin)
    {
        $query = $this->conn->prepare('UPDATE `user` SET `u_coin`=`u_coin`-' . $coin . ' WHERE `u_id`=:id');
        $query->bindParam(':id', $id);
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function edit_account($user_id,$first_name,$last_name,$password){
        $name = $first_name." ".$last_name;
        $sql_pass = null;
        if(!empty($password)){
            $sql_pass = ",`u_password`=:password";
        }
        $query = $this->conn->prepare('UPDATE `user` SET `u_name`=:name'.$sql_pass.' WHERE `u_id`=:user_id');
        $query->bindParam(':user_id',$user_id);
        $query->bindParam(':name',$name);
        if(!empty($password)){
            $password = md5($password);
            $query->bindParam(':password',$password);
        }
        if($query->execute()){
            return true;
        }else{
            return false;
        }
    }
}
$sql_db = new sql_db;
$title = "Game Coin";