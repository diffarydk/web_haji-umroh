<?php
require_once "../connection.php";

class Update extends Database{

public function __construct()
{
    $db = new Database;
    $this->conn = $db->conn;
}

public function updateData($id_formulir, $id_jadwal, $tanggal_keberangkatan, $maskapai, $tanggal_pulang, $jumlah_kursi) {
    $query = "UPDATE formulir SET id_jadwal = $id_jadwal, tanggal_keberangkatan = '$tanggal_keberangkatan', maskapai = '$maskapai', tanggal_pulang = '$tanggal_pulang', jumlah_kursi = '$jumlah_kursi' WHERE id_formulir = $id_formulir";
    $result = $this->conn->query($query);

    if ($result) {
        return true;
    } else {
        return false;
    }
}


}