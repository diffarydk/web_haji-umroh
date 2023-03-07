<?php
class Formulir extends Database{

  public function __construct() {
    $db = new Database;
    $this->conn = $db->conn;
  }

  public function getData($id_formulir) {
    if (isset($_SESSION['id_users'])) {
      $id_users = $_SESSION['id_users'];
      $query = "SELECT * FROM formulir WHERE id_formulir = ? AND id_users = ?";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param('si', $id_formulir, $id_users);
      $stmt->execute();
      $result = $stmt->get_result();
      if ($result->num_rows > 0) {
        return $result->fetch_assoc();
      }
    }
    return false;
  }

  public function getWilayah($id_formulir) {
    if (isset($_SESSION['id_users'])) {
      $id_users = $_SESSION['id_users'];
      $query = "SELECT * FROM formulir WHERE id_formulir = ? AND id_users = ?";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param('si', $id_formulir, $id_users);
      $stmt->execute();
      $result = $stmt->get_result();
      if ($result->num_rows > 0) {
        return $result->fetch_assoc();
      }
    }
    return false;
  }
}
