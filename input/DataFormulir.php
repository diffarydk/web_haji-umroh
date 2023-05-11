<?php
class TableJadwal extends Database{

  public function __construct() {
    $db = new Database;
    $this->conn = $db->conn;
  }
  public function  DataJadwalPerjalanan(){
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
public function getIdFormulir($id_formulir) {
  $sql = "SELECT * FROM jadwal_perjalanan WHERE id_formulir='$id_formulir'";
  $result = $this->conn->query($sql);
  if ($result->num_rows > 0) {
    return $result->fetch_assoc();
  } else {
    return null;
  }
}
public function updateSisaKursiJadwal($id_jadwal, $sisa_kursi){
  $sql = "UPDATE jadwal_perjalanan SET sisa_kursi=? WHERE id_jadwal=?";
  $stmt = $this->conn->prepare($sql);
  $stmt->bind_param("ii", $sisa_kursi, $id_jadwal);
  if($stmt->execute()){
    return true;
  } else {
    return false;
  }
}

public function updateFormulir($id_formulir, $id_jadwal, $tanggal_keberangkatan, $tanggal_pulang, $maskapai, $mekah, $madinah, $old_jadwal = null){
  $new_jadwal = $this->getJadwalPerjalananById($id_jadwal);
  $sql = "UPDATE formulir SET id_jadwal_formulir=?, tanggal_keberangkatan_formulir=?,tanggal_pulang_formulir=?, maskapai_formulir=?, mekah_formulir =?, madinah_formulir=?  WHERE id_formulir=?";
  $stmt = $this->conn->prepare($sql);
  $stmt->bind_param("isssssi", $id_jadwal, $tanggal_keberangkatan, $tanggal_pulang, $maskapai, $mekah, $madinah, $id_formulir);
  if($stmt->execute()){
    if($old_jadwal != null){
      $old_jadwal = $this->getJadwalPerjalananById($old_jadwal);
      $old_sisa_kursi = $old_jadwal['sisa_kursi'];
      $new_sisa_kursi = $new_jadwal['sisa_kursi'];
      if($old_sisa_kursi != $new_sisa_kursi){
        $old_sisa_kursi++;
        $new_sisa_kursi--;
        $this->updateSisaKursiJadwal($old_jadwal['id_jadwal'], $old_sisa_kursi);
        $this->updateSisaKursiJadwal($new_jadwal['id_jadwal'], $new_sisa_kursi);
      } else {
        $old_sisa_kursi++;
        $this->updateSisaKursiJadwal($old_jadwal['id_jadwal'], $old_sisa_kursi);
      }
    } else {
      $new_sisa_kursi = $new_jadwal['sisa_kursi'];
      $new_sisa_kursi--;
      $this->updateSisaKursiJadwal($new_jadwal['id_jadwal'], $new_sisa_kursi);
    }
    return true;
  } else {
    return false;
  }
}

public function getIdpembayaran($id_pembayaran) {
    $sql = "SELECT * FROM form_pembayaran WHERE id_pembayaran='$id_pembayaran'";
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0) {
      return $result->fetch_assoc();
    } else {
      return null;
    }
  }

  public function updatePembayaranFormulir($id_formulir, $id_pembayaran, $bukti_pembayaran){
    $sql = "UPDATE formulir SET id_pembayaran_formulir=?, bukti_pembayaran =? WHERE id_formulir=?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("isi", $id_pembayaran, $bukti_pembayaran, $id_formulir);
    if($stmt->execute()){
        return true;
    } else {
        return false;
    }
  }

  public function updatePembayaranStatus($id_formulir, $status){
    $sql = "UPDATE formulir SET status = ? WHERE id_formulir=?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("si",  $status, $id_formulir);
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
public function DataFormulir($id_formulir){
  // $id_formulir = $_GET['id_formulir'];
  $sql = "SELECT * FROM formulir WHERE id_formulir = ?";
  $stmt = $this->conn->prepare($sql);
  $stmt->bind_param('i', $id_formulir);
  $stmt->execute();
  $result = $stmt->get_result();
  if($result->num_rows > 0){
      return $result; 
  } else {
      return false;
  }
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

public function InputJadwal() {
$stmt = $this->conn->prepare("UPDATE formulir f 
JOIN jadwal_perjalanan j ON f.id_jadwal = j.id_jadwal 
SET f.tanggal_keberangkatan = ?, f.maskapai = ?, f.tanggal_pulang = ? 
WHERE f.id_formulir = ? AND j.id_jadwal = ? ");

$stmt->bind_param("ssiii", $tanggal_keberangkatan, $maskapai, $tanggal_pulang, $id_formulir, $id_jadwal);


  if ($stmt->execute()) {
    return true;
  } else {
    // handle error
    echo "Error: " . $stmt->error;
    return false;
  }
}
}