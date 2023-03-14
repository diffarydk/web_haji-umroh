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

        if (mysqli_num_rows($result) > 0) 
        if (mysqli_num_rows($result) > 0) {
                    $user = mysqli_fetch_assoc($result);
                    if ($user['level'] == 'admin') {
                        // jika level adalah admin, tidak perlu verifikasi password
                        $_SESSION['id_users'] = $user['id_users'];
                        return $user;
                    } elseif (password_verify($this->password, $user['password'])) {
                        // jika level adalah non-admin, lakukan verifikasi password
                        $_SESSION['id_users'] = $user['id_users'];
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