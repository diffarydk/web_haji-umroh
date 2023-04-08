<?php
class TableJadwal extends Database{

  public function __construct() {
    $db = new Database;
    $this->conn = $db->conn;
  }
  public function  DataJadwal(){
    $sql = "SELECT * FROM jadwal_perjalanan";
    $result = $this->conn->query($sql);
    if($result->num_rows > 0){
        return $result;
    } else {
        return false;
    }
}

public function getJadwalPerjalananById($id_jadwal) {
  $sql = "SELECT * FROM jadwal_perjalanan WHERE id_jadwal='$id_jadwal'";
  $result = $this->conn->query($sql);
  if ($result->num_rows > 0) {
    return $result->fetch_assoc();
  } else {
    return null;
  }
}

public function updateFormulir($id_formulir, $id_jadwal, $tanggal_keberangkatan, $maskapai, $tanggal_pulang){
    $sql = "UPDATE formulir SET id_jadwal_formulir=?, tanggal_keberangkatan_formulir=?, maskapai_formulir=?, tanggal_pulang_formulir=? WHERE id_formulir=?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("isssi", $id_jadwal, $tanggal_keberangkatan, $maskapai, $tanggal_pulang, $id_formulir);
    if($stmt->execute()){
        return true;
    } else {
        return false;
    }
  }

  public function getId_pembayaran($id_pembayaran) {
    $sql = "SELECT * FROM form_pembayaran WHERE id_pembayaran='$id_pembayaran'";
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0) {
      return $result->fetch_assoc();
    } else {
      return null;
    }
  }

  public function updatePembayaranFormulir($id_formulir, $id_pembayaran){
    $sql = "UPDATE FORMULIR SET id_pembayaran_formulir = ? WHERE id_formulir=? ";
    echo $sql; // output the SQL query for debugging purposes
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ii", $id_pembayaran, $id_formulir);
    if($stmt->execute()){
        return true;
    } else {
        return false;
    }
}

  public function DataBank(){
    $sql = "SELECT * FROM form_pembayaran";
    $result = $this->conn->query($sql);
    if($result->num_rows > 0){
        return $result; 
    } else {
        return false;
    }
}
}