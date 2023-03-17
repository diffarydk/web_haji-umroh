<?php 
class LoginModel extends Database{

  
  public function __construct() {
    $db = new Database;
    $this->conn = $db->conn;
  }
  
  public function login($username, $password) {
    $username = mysqli_real_escape_string($this->conn, $username);
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($this->conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    
        if($row['level'] == 'admin') {
            return $row;
        }
    
        if (password_verify($password, $row['password'])) {
            return $row;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

public function getUserById($id) {
    $query = "SELECT * FROM users WHERE id_users = '$id'";
    $result = mysqli_query($this->conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false;
    }
}
}
