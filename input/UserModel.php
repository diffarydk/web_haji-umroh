<?php 
require_once "../connection.php";
  class User extends Database {
    private $conn;
    private $username;
    private $password;
    private $email;

    public function __construct($username, $password, $email) {
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->username = htmlspecialchars(strip_tags($username));
        $this->email = htmlspecialchars(strip_tags($email));
        $this->password = password_hash(htmlspecialchars(strip_tags($password)), PASSWORD_DEFAULT);
        }

    public function register() {
      $email_check_query = "SELECT * FROM users WHERE email='$this->email' LIMIT 1";
      $result = mysqli_query($this->conn, $email_check_query);
      $user = mysqli_fetch_assoc($result);
    
      if ($user) { 
        if ($user['email'] === $this->email) {
            echo "<script>alert('Berhasil registrasi, silakan login');window.location='../views/form-daftar.html';</script>";
          return false;
        }
      }
    
      $id_users = md5(uniqid(rand(), true));
      $check_id_users_query = "SELECT * FROM users WHERE id_users='$id_users' LIMIT 1";
      $result = mysqli_query($this->conn, $check_id_users_query);
      $user = mysqli_fetch_assoc($result);
    
      while ($user) {
        $id_users = md5(uniqid(rand(), true));
        $check_id_users_query = "SELECT * FROM users WHERE id_users='$id_users' LIMIT 1";
        $result = mysqli_query($this->conn, $check_id_users_query);
        $user = mysqli_fetch_assoc($result);
      }
    
      $query = "INSERT INTO users VALUES ('$id_users', '$this->username', '$this->password', '$this->email','users','')";
    
      if (mysqli_query($this->conn, $query)) {
        return true;
      } else {
        return false;
      }
    }
  }
?>
