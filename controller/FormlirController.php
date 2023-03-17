<?php
require_once "../input/FormulirModel.php";

if (isset($_POST['submit'])) {
  session_start();
  
  // ambil id_user dari session
        $id_users = $_SESSION['id_users'];
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
        $foto = $_FILES['foto'];
        $id_jadwal = 0;
        $tanggal_keberangkatan = 0;
        $maskapai = 0;
        $tanggal_pulang = 0;

  // Mendapatkan nama file
  $fileName = $foto['name'];

  // Mendapatkan ukuran file
  $fileSize = $foto['size'];

  // Mendapatkan jenis file
  $fileType = $foto['type'];

  // Mendapatkan path file sementara
  $fileTemp = $foto['tmp_name'];

  // Memindahkan file dari path sementara ke lokasi tujuan
  move_uploaded_file($fileTemp, "../core/img/" . $fileName);

  $timestamp = date('Y-m-d H:i:s');
  $status = 'belum'; 
        
    $formulir = new Formulir($id_users,$program, $kamar, $nama_lengkap, $nik, $nama_ayah_kandung, $tempat_lahir, $tanggal_lahir, $no_paspor, $tempat_dikeluarkan_paspor, $tanggal_dikeluarkan_paspor, $masa_berlaku_paspor, $jenis_kelamin, $golongan_darah, $status_perkawinan, $provinsi, $kota_kabupaten, $kecamatan, $kelurahan, $jalan, $email, $no_telp_rumah, $no_telp_seluler, $pendidikan_terakhir, $pekerjaan, $keluarga_yg_ikut, $hubungan, $no_telp, $informasi_pendaftaran, $penyakit_kronis, $keluarga_yg_bisa_dihubungi, $hubungan_keluarga, $no_telp_keluarga, $foto, $id_jadwal, $tanggal_keberangkatan, $maskapai, $tanggal_pulang, $timestamp, $status);
    if($formulir->Tambah_data()){
      $id_formulir = $formulir->get_id_formulir();
      echo "<script>alert('Berhasil');window.location='../display/user/table_jadwal.php?id_formulir=$id_formulir';</script>";
    } else {
      echo "error";
    }

   

  }

      