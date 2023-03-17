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
    private $foto;
    private $id_jadwal;
    private $tanggal_keberangkatan;
    private $maskapai;
    private $tanggal_pulang;
    private $timestamp;
    private $status;


    public function __construct($id_users, $program, $kamar, $nama_lengkap, $nik, $nama_ayah_kandung, $tempat_lahir, $tanggal_lahir, $no_paspor, $tempat_dikeluarkan_paspor, $tanggal_dikeluarkan_paspor, $masa_berlaku_paspor, $jenis_kelamin, $golongan_darah, $status_perkawinan, $provinsi, $kota_kabupaten, $kecamatan, $kelurahan, $jalan, $email, $no_telp_rumah, $no_telp_seluler, $pendidikan_terakhir, $pekerjaan, $keluarga_yg_ikut, $hubungan, $no_telp, $informasi_pendaftaran, $penyakit_kronis, $keluarga_yg_bisa_dihubungi, $hubungan_keluarga, $no_telp_keluarga, $foto, $id_jadwal, $tanggal_keberangkatan, $maskapai, $tanggal_pulang, $timestamp, $status)
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
        $this->foto = $foto;
        $this->id_jadwal = $id_jadwal;
        $this->tanggal_keberangkatan;
        $this->maskapai;
        $this->tanggal_pulang; 
        $this->timestamp = $timestamp;    
        $this->status = $status;    
    }

    public function Tambah_data(){

      $id_formulir = bin2hex(random_bytes(16)); // menghasilkan string acak dengan panjang 32 karakter
      $check_id_formulir_query = "SELECT * FROM formulir WHERE id_formulir='$id_formulir' LIMIT 1";
      $result = mysqli_query($this->conn, $check_id_formulir_query);
      $formulir = mysqli_fetch_assoc($result);

      // cek apakah id_formulir sudah ada di database
      // jika sudah, buat id_formulir baru sampai id_formulir unik
      while ($formulir) {
          $id_formulir = bin2hex(random_bytes(16));
          $check_id_formulir_query = "SELECT * FROM formulir WHERE id_formulir='$id_formulir' LIMIT 1";
          $result = mysqli_query($this->conn, $check_id_formulir_query);
          $formulir = mysqli_fetch_assoc($result);
      }

      $query ="INSERT INTO formulir VALUES ('$this->id_users','$id_formulir', '$this->program', '$this->kamar', 
      '$this->nama_lengkap', '$this->nik', '$this->nama_ayah_kandung', '$this->tempat_lahir', '$this->tanggal_lahir',
      '$this->no_paspor', '$this->tempat_dikeluarkan_paspor', '$this->tanggal_dikeluarkan_paspor', '$this->masa_berlaku_paspor',
      '$this->jenis_kelamin', '$this->golongan_darah', '$this->status_perkawinan', '$this->provinsi', '$this->kota_kabupaten',
      '$this->kecamatan', '$this->kelurahan', '$this->jalan', '$this->email', '$this->no_telp_rumah', '$this->no_telp_seluler',
      '$this->pendidikan_terakhir', '$this->pekerjaan', '$this->keluarga_yg_ikut', '$this->hubungan', '$this->no_telp',
      '$this->informasi_pendaftaran','$this->penyakit_kronis', '$this->keluarga_yg_bisa_dihubungi', '$this->hubungan_keluarga',
      '$this->no_telp_keluarga', '$this->foto', '$this->id_jadwal', '$this->tanggal_keberangkatan', '$this->maskapai', '$this->tanggal_pulang', '$this->timestamp', '$this->status')";

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
      $query="SELECT id_formulir FROM formulir ORDER BY id_formulir DESC LIMIT 1";
      $result = mysqli_query($this->conn, $query);
      if ($result && $row = mysqli_fetch_assoc($result)) {
        return $row['id_formulir'];
      } else {
        return false;
      }
    }
}