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
  public function DataJadwal() {
    $userQuery = "SELECT * FROM jadwal_perjalanan";
    $result = $this->conn->query($userQuery);
    if($result->num_rows > 0){
        return $result; 
    } else {
        return false;
    }

}

public function InputJadwal($id_jadwal, $tanggal_keberangkatan, $maskapai, $tanggal_pulang) {
  if (isset($id_formulir)) {
  $stmt = $this->conn->prepare("UPDATE formulir f 
  JOIN jadwal_keberangkatan j ON f.tanggal_keberangkatan = j.tanggal_keberangkatan 
  SET f.tanggal_keberangkatan = ?, f.maskapai = ?, f.tanggal_pulang = ? 
  WHERE f.id_formulir = ?'");


  $stmt->bind_param("sssii", $tanggal_keberangkatan, $maskapai, $tanggal_pulang, $id_jadwal, $id_formulir);

  if ($stmt->execute()) {
    return true;
  } else {
    // handle error
    echo "Error: " . $stmt->error;
    return false;
  }
}
}
}
