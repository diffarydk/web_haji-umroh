<?php
require_once "../connection.php";

class Update extends Database{

public function __construct()
{
    $db = new Database;
    $this->conn = $db->conn;
}

public function InputJadwal($id_formulir, $id_jadwal, $tanggal_keberangkatan, $maskapai, $tanggal_pulang)
{
    if ($id_formulir) {
        $stmt = $this->conn->prepare("UPDATE formulir f 
            JOIN jadwal_perjalanan j ON f.id_jadwal = j.id_jadwal 
            SET f.id_jadwal = ?, f.tanggal_keberangkatan = ?, f.maskapai = ?, f.tanggal_pulang = ? 
            WHERE f.id_formulir = ? AND j.id_jadwal = ?");
        $stmt->bind_param("sssssi", $id_jadwal, $tanggal_keberangkatan, $maskapai, $tanggal_pulang, $id_formulir, $id_jadwal);

        if ($stmt->execute()) {
            return true;
        } else {
            // handle error
            echo "Error: " . $stmt->error;
            return false;
        }
    } else {
        return false;
    }
}

}