<?php
session_start();
require_once "../connection.php";
class User_model extends Database {
    private $username;
    private $password;

    public function __construct($username, $password) {
        $db = new Database;
        $this->conn = $db->conn;
        $this->username = $username;
        $this->password = $password;
    }

    public function doLogin() {
        $sql = "SELECT * FROM users WHERE username = '$this->username'";
        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($this->password, $user['password'])) {
                $_SESSION['id_users'] = true;
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

?>