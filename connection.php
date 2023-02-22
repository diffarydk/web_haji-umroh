<?php
class Database {
  private $host = "localhost";
  private $username = "root";
  private $password = "";
  private $database = "db_haji_umroh";

  private $conn;

  public function __construct() {
    $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);

    if (!$this->conn) {
      die("Koneksi gagal: " . mysqli_connect_error());
    }
  }
  
  public function getConnection() {
      return $this->conn;
  }
}
?>
