<?php
include "../connection.php";
include_once "../input/DashboardModel.php";
include_once "../display/admin/core/form-daftar-edit.php";

if(isset($_POST['submit'])) {

$id_formulir = $_POST['id_formulir'];
$id_users = $_POST['id_users'];
$program = $_POST['program'];
$kamar = $_POST['kamar'];
$nama_lengkap = $_POST['nama_lengkap'];
$nik = $_POST['nik'];
$nama_ayah_kandung = $_POST['nama_ayah_kandung'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$no_paspor = $_POST['no_paspor'];
$tempat_dikeluarkan_paspor = $_POST['tempat_dikeluarkan_paspor'];
$tanggal_dikeluarkan_paspor = $_POST['tanggal_dikeluarkan_paspor'];
$masa_berlaku_paspor = $_POST['masa_berlaku_paspor'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$golongan_darah = $_POST['golongan_darah'];
$status_perkawinan = $_POST['status_perkawinan'];
$provinsi = $_POST['provinsi'];
$kota_kabupaten = $_POST['kota_kabupaten'];
$kecamatan = $_POST['kecamatan'];
$kelurahan = $_POST['kelurahan'];
$jalan = $_POST['jalan'];
$email = $_POST['email'];
$no_telp_rumah = $_POST['no_telp_rumah'];
$no_telp_seluler = $_POST['no_telp_seluler'];
$pendidikan_terakhir = $_POST['pendidikan_terakhir'];
$pekerjaan = $_POST['pekerjaan'];
$keluarga_yg_ikut = $_POST['keluarga_yg_ikut'];
$hubungan = $_POST['hubungan'];
$no_telp = $_POST['no_telp'];
$informasi_pendaftaran = $_POST['informasi_pendaftaran'];
$penyakit_kronis = $_POST['penyakit_kronis'];
$keluarga_yg_bisa_dihubungi = $_POST['keluarga_yg_bisa_dihubungi'];
$hubungan_keluarga = $_POST['hubungan_keluarga'];
$no_telp_keluarga = $_POST['no_telp_keluarga'];

$formulir = new admin();
if($formulir->ubahData($id_formulir, $id_users, $program, $kamar, $nama_lengkap, $nik, $nama_ayah_kandung, $tempat_lahir, $tanggal_lahir, $no_paspor, $tempat_dikeluarkan_paspor, $tanggal_dikeluarkan_paspor, $masa_berlaku_paspor, $jenis_kelamin, $golongan_darah, $status_perkawinan, $provinsi, $kota_kabupaten, $kecamatan, $kelurahan, $jalan, $email, $no_telp_rumah, $no_telp_seluler, $pendidikan_terakhir, $pekerjaan, $keluarga_yg_ikut, $hubungan, $no_telp, $informasi_pendaftaran, $penyakit_kronis, $keluarga_yg_bisa_dihubungi, $hubungan_keluarga, $no_telp_keluarga )){
    header("Location: ../index.php");
}

        }