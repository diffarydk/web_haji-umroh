<?php
require_once ('../input/UpdateTable.php');
session_start();

if(isset($_POST['submit'])) {
    $id_jadwal = $_POST['schedule'];
    $tanggal_keberangkatan = $_POST['tanggal_keberangkatan'] ?? null;
    $maskapai = $_POST['maskapai'] ?? null;
    $tanggal_pulang = $_POST['tanggal_pulang'] ?? null;
  
    if(isset($_SESSION['id_formulir'])) {
        $id_formulir = $_SESSION['id_formulir'];
        $formulir = new Update();
        if ($formulir->InputJadwal($id_formulir, $id_jadwal, $tanggal_keberangkatan, $maskapai, $tanggal_pulang)) {
            echo "<script>alert('Berhasil');window.location='../display/user/form_pembayaran.html';</script>";
        } else {
            echo "error";
        }
    } else {
        echo "Error: id_formulir not found in session.";
    }
} else {
    echo "Error: submit not found.";
}
?>
