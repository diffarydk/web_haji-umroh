<?php
require_once "../connection.php";

class Update extends Database{

public function __construct()
{
    $db = new Database;
    $this->conn = $db->conn;
}

public function InputJadwal()
{
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