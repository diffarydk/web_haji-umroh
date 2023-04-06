<?php
require_once "../connection.php";

class Formulir extends Database{
    private $id_users;
    private $program;
    private $kamar;
    private $nama_lengkap;
    private $nik;
    private $nama_ayah_kandung;
    private $tempat_lahir;
    private $tanggal_lahir;
    private $no_paspor;
    private $tempat_dikeluarkan_paspor;
    private $tanggal_dikeluarkan_paspor;
    private $masa_berlaku_paspor;
    private $jenis_kelamin;
    private $golongan_darah;
    private $status_perkawinan;
    private $provinsi;
    private $kota_kabupaten;
    private $kecamatan;
    private $kelurahan;
    private $jalan;
    private $email;
    private $no_telp_rumah;
    private $no_telp_seluler;
    private $pendidikan_terakhir;
    private $pekerjaan;
    private $keluarga_yg_ikut;
    private $hubungan;
    private $no_telp;
    private $informasi_pendaftaran;
    private $penyakit_kronis;
    private $keluarga_yg_bisa_dihubungi;
    private $hubungan_keluarga;
    private $no_telp_keluarga;
    private $tanggal_keberangkatan;
    private $tanggal_pulang;
    private $maskapai;
    private $mekah;
    private $madinah;
    private $timestamp;
    private $status;

    
    function encrypt_url($url) {
      // Menggunakan md5 hash untuk menghasilkan hash untuk URL
      $hash = md5($url);
    
      // Tambahkan hash ke URL
      $encrypted_url = $url . '#' . $hash;
    
      // Kembalikan URL yang terenkripsi
      return $encrypted_url;
    }
  
    
    public function __construct($id_users, $program, $kamar, $nama_lengkap, $nik, $nama_ayah_kandung, $tempat_lahir, $tanggal_lahir, $no_paspor, $tempat_dikeluarkan_paspor, $tanggal_dikeluarkan_paspor, $masa_berlaku_paspor, $jenis_kelamin, $golongan_darah, $status_perkawinan, $provinsi, $kota_kabupaten, $kecamatan, $kelurahan, $jalan, $email, $no_telp_rumah, $no_telp_seluler, $pendidikan_terakhir, $pekerjaan, $keluarga_yg_ikut, $hubungan, $no_telp, $informasi_pendaftaran, $penyakit_kronis, $keluarga_yg_bisa_dihubungi, $hubungan_keluarga, $no_telp_keluarga, $tanggal_keberangkatan,$tanggal_pulang ,$maskapai, $mekah, $madinah , $timestamp, $status)
    {
      $db = new Database;
      $this->conn = $db->conn;
        $this->id_users = $id_users;
        $this->program = $program;
        $this->kamar = $kamar;
        $this->nama_lengkap = $nama_lengkap;
        $this->nik = $nik;
        $this->nama_ayah_kandung = $nama_ayah_kandung;
        $this->tempat_lahir = $tempat_lahir;
        $this->tanggal_lahir = $tanggal_lahir;
        $this->no_paspor = $no_paspor;
        $this->tempat_dikeluarkan_paspor = $tempat_dikeluarkan_paspor;
        $this->tanggal_dikeluarkan_paspor = $tanggal_dikeluarkan_paspor;
        $this->masa_berlaku_paspor = $masa_berlaku_paspor;
        $this->jenis_kelamin = $jenis_kelamin;
        $this->golongan_darah = $golongan_darah;
        $this->status_perkawinan = $status_perkawinan;
        $this->provinsi = $provinsi;
        $this->kota_kabupaten = $kota_kabupaten;
        $this->kecamatan = $kecamatan;
        $this->kelurahan = $kelurahan;
        $this->jalan = $jalan;
        $this->email = $email;
        $this->no_telp_rumah = $no_telp_rumah;
        $this->no_telp_seluler = $no_telp_seluler;
        $this->pendidikan_terakhir = $pendidikan_terakhir;
        $this->pekerjaan = $pekerjaan;
        $this->keluarga_yg_ikut = $keluarga_yg_ikut;
        $this->hubungan = $hubungan;
        $this->no_telp = $no_telp;
        $this->informasi_pendaftaran = $informasi_pendaftaran;
        $this->penyakit_kronis = $penyakit_kronis;
        $this->keluarga_yg_bisa_dihubungi = $keluarga_yg_bisa_dihubungi;
        $this->hubungan_keluarga = $hubungan_keluarga;
        $this->no_telp_keluarga = $no_telp_keluarga;
        $this->tanggal_keberangkatan;
        $this->tanggal_pulang; 
        $this->maskapai;
        $this->mekah;
        $this->madinah;
        $this->timestamp = $timestamp;    
        $this->status = $status;    
    }

    public function Tambah_data(){

    $foto = $_FILES['foto']['name'];
    $fileTemp = $_FILES['foto']['tmp_name'];

    // cek apakah file yang diupload adalah file gambar
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    $extension = pathinfo($foto, PATHINFO_EXTENSION);
    if (!in_array($extension, $allowedExtensions)) {
        echo "File yang diupload bukan file gambar yang valid";
        exit;
    }

    // cek apakah file yang diupload berhasil disimpan di server
    if (!move_uploaded_file($fileTemp, "../core/img/" . $foto)) {
        echo "Gagal mengupload foto";
        exit;
    }

      // $id_formulir = 1+

      // $id_formulir = mt_rand(100000000, 999999999); // menghasilkan integer acak antara 100000000 dan 999999999

      // $check_id_formulir_query = "SELECT * FROM formulir WHERE id_formulir='$id_formulir' LIMIT 1";
      // $result = mysqli_query($this->conn, $check_id_formulir_query);
      // $formulir = mysqli_fetch_assoc($result);
      
      // // cek apakah id_formulir sudah ada di database
      // // jika sudah, buat id_formulir baru sampai id_formulir unik
      // while ($formulir) {
      //     $id_formulir = mt_rand(100000000, 999999999);
      //     $check_id_formulir_query = "SELECT * FROM formulir WHERE id_formulir='$id_formulir' LIMIT 1";
      //     $result = mysqli_query($this->conn, $check_id_formulir_query);
      //     $formulir = mysqli_fetch_assoc($result);
      // }
      
      // $id_jadwal = mt_rand(100000000, 999999999); // menghasilkan integer acak antara 100000000 dan 999999999

      // $check_id_formulir_query = "SELECT * FROM formulir WHERE id_formulir='$id_jadwal' LIMIT 1";
      // $result = mysqli_query($this->conn, $check_id_formulir_query);
      // $formulir = mysqli_fetch_assoc($result);
      
      // // cek apakah id_formulir sudah ada di database
      // // jika sudah, buat id_formulir baru sampai id_formulir unik
      // while ($formulir) {
      //     $id_jadwal = mt_rand(100000000, 999999999);
      //     $check_id_formulir_query = "SELECT * FROM formulir WHERE id_formulir='$id_jadwal' LIMIT 1";
      //     $result = mysqli_query($this->conn, $check_id_formulir_query);
      //     $formulir = mysqli_fetch_assoc($result);
      // }
      
      $query ="INSERT INTO formulir VALUES ('','$this->id_users', '$this->program', '$this->kamar', 
      '$this->nama_lengkap', '$this->nik', '$this->nama_ayah_kandung', '$this->tempat_lahir', '$this->tanggal_lahir',
      '$this->no_paspor', '$this->tempat_dikeluarkan_paspor', '$this->tanggal_dikeluarkan_paspor', '$this->masa_berlaku_paspor',
      '$this->jenis_kelamin', '$this->golongan_darah', '$this->status_perkawinan', '$this->provinsi', '$this->kota_kabupaten',
      '$this->kecamatan', '$this->kelurahan', '$this->jalan', '$this->email', '$this->no_telp_rumah', '$this->no_telp_seluler',
      '$this->pendidikan_terakhir', '$this->pekerjaan', '$this->keluarga_yg_ikut', '$this->hubungan', '$this->no_telp',
      '$this->informasi_pendaftaran','$this->penyakit_kronis', '$this->keluarga_yg_bisa_dihubungi', '$this->hubungan_keluarga',
      '$this->no_telp_keluarga', '$foto', '0', '$this->tanggal_keberangkatan', '$this->tanggal_pulang','$this->maskapai','$this->mekah','$this->madinah', '$this->timestamp', '$this->status')";

if (mysqli_query($this->conn, $query)) {
    return true;
  } else {
    return false;
  }
    }
 
    function getTimestamp($waktu, $tanggal) {
      // Konversi input waktu dan tanggal ke format yang dapat di-parse oleh fungsi strtotime
      $datetimeStr = $tanggal . ' ' . $waktu;
      // Parse string datetime ke UNIX timestamp
      $timestamp = strtotime($datetimeStr);
      return $timestamp;
    }

    public function get_id_formulir()
    {
      $query="SELECT id_formulir FROM formulir ORDER BY id_formulir DESC ";
      $result = mysqli_query($this->conn, $query);
      if ($result && $row = mysqli_fetch_assoc($result)) {
        return $row['id_formulir'];
      } else {
        return false;
      }
    }
}