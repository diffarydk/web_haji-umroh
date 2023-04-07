<?php 
class admin extends Database {

    public function __construct()
    {
        $db = new Database;
        $this->conn = $db->conn;        
    }
    
    public function getData()
    {
      $userQuery = "SELECT u.id_users, u.username, u.email, u.level, COALESCE(MAX(f.time_stamp), u.time) AS last_time_stamp 
      FROM users u 
      LEFT JOIN formulir f ON u.id_users = f.id_users 
      GROUP BY u.id_users 
      ORDER BY COALESCE(MAX(f.time_stamp), u.time) DESC
      ";
        $result = $this->conn->query($userQuery);
        if($result->num_rows > 0){
            return $result; 
        } else {
            return false;
        }
    }
    public function profile()
    {
        $id_users = $_GET['id_users'] ?? null;
        if (isset($id_users)) {
            $profilequery = "SELECT u.username, u.email, f.id_formulir, f.nama_lengkap, f.nik, f.time_stamp, f.status
                             FROM users u 
                             JOIN formulir f ON u.id_users = f.id_users 
                             WHERE u.id_users='$id_users'
                             ORDER BY f.time_stamp DESC";
            $result = $this->conn->query($profilequery);
            $profiles = $this->conn->query($profilequery);
            if($result->num_rows > 0 && $profiles->num_rows > 0){
                return array($result, $profiles);
            } else {
                return false;
            }
        }
    }
    public function getInfo($id_formulir) {
        $id_users = $_GET['id_users'] ?? null;
        if (isset($id_users)) {
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
        $id_users = $_GET['id_users'] ?? null;
        if (isset($id_users)) {
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
      public function deleteFormulir($id_formulir){
        if (!$id_formulir) {
        return false;
    }
    $query = "DELETE FROM formulir WHERE id_formulir = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param('s', $id_formulir);
    $stmt->execute();
        if ($stmt->affected_rows == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteUser($id_users) {
        $query = "DELETE FROM users WHERE id_users = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id_users);
        if ($stmt->execute()) {
            if ($stmt->affected_rows == 1) {
            $query = "DELETE FROM users WHERE id_users = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('i', $id_users);
            $stmt->execute();
                if ($stmt->affected_rows == 1) {
                    return true;
             }  else {
                    return false;
            }
                } else {
                    return false;
            }
        } else {
            return false;
        }
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

    public function TambahData() {    
        // $id_jadwal = rand(1, 9999); // menghasilkan string acak dengan panjang 32 karakter
        // $check_id_formulir_query = "SELECT * FROM jadwal_perjalanan WHERE id_jadwal ='$id_jadwal' LIMIT 1";
        // $result = mysqli_query($this->conn, $check_id_formulir_query);
        // $formulir = mysqli_fetch_assoc($result);
  
        // // cek apakah id_formulir sudah ada di database
        // // jika sudah, buat id_formulir baru sampai id_formulir unik
        // while ($formulir) {
        //     $id_jadwal = rand(1, 9999);
        //     $check_id_formulir_query = "SELECT * FROM formulir WHERE id_jadwal ='$id_jadwal' LIMIT 1";
        //     $result = mysqli_query($this->conn, $check_id_formulir_query);
        //     $formulir = mysqli_fetch_assoc($result);
        // }
        // Ambil data dari form input
        $tanggal_keberangkatan = $_POST['tanggal_keberangkatan'];
        $tanggal_pulang = $_POST['tanggal_pulang'];
        $maskapai = $_POST['maskapai'];
        $mekah = $_POST['mekah'];
        $madinah = $_POST['madinah'];
        $jumlah_kursi = $_POST['jumlah_kursi'];
        
    
        // Buat query untuk insert data ke tabel table_jadwal
        $sql = "INSERT INTO jadwal_perjalanan (id_jadwal, tanggal_keberangkatan,tanggal_pulang, maskapai, mekah, madinah , jumlah_kursi)
                VALUES ('', '$tanggal_keberangkatan', '$tanggal_pulang', '$maskapai', '$mekah', '$madinah', '$jumlah_kursi')";
    
        // Jalankan query
        if ($this->conn->query($sql) === TRUE) {
            echo "<script>alert('Penambahan Data Berhasil');window.location=' table_jadwal_admin.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    public function DeleteJadwal($id_jadwal)
    {
        $query = "DELETE FROM jadwal_perjalanan WHERE id_jadwal = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id_jadwal);
        if ($stmt->execute()) {
            if ($stmt->affected_rows == 1) {
            $query = "DELETE FROM jadwal_perjalanan WHERE id_jadwal = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('i', $id_jadwal);
            $stmt->execute();
                if ($stmt->affected_rows == 1) {
                    return true;
             }  else {
                    return false;
            }
                } else {
                    return false;
            }
        } else {
            return false;
        }  
    }
    
    // public function ubahData($id_formulir, $id_users, $program, $kamar, $nama_lengkap, $nik, $nama_ayah_kandung, $tempat_lahir, $tanggal_lahir, $no_paspor, $tempat_dikeluarkan_paspor, $tanggal_dikeluarkan_paspor, $masa_berlaku_paspor, $jenis_kelamin, $golongan_darah, $status_perkawinan, $provinsi, $kota_kabupaten, $kecamatan, $kelurahan, $jalan, $email, $no_telp_rumah, $no_telp_seluler, $pendidikan_terakhir, $pekerjaan, $keluarga_yg_ikut, $hubungan, $no_telp, $informasi_pendaftaran, $penyakit_kronis, $keluarga_yg_bisa_dihubungi, $hubungan_keluarga, $no_telp_keluarga) {

    //     $stmt = $this->conn->prepare("UPDATE formulir SET program = ?, kamar = ?, nama_lengkap = ?, nik = ?, nama_ayah_kandung = ?, tempat_lahir = ?, tanggal_lahir = ?, no_paspor = ?, tempat_dikeluarkan_paspor = ?, tanggal_dikeluarkan_paspor = ?, masa_berlaku_paspor = ?, jenis_kelamin = ?, golongan_darah = ?, status_perkawinan = ?, provinsi = ?, kota_kabupaten = ?, kecamatan = ?, kelurahan = ?, jalan = ?, email = ?, no_telp_rumah = ?, no_telp_seluler = ?, pendidikan_terakhir = ?, pekerjaan = ?, keluarga_yg_ikut = ?, hubungan = ?, no_telp = ?, informasi_pendaftaran = ?, penyakit_kronis = ?, keluarga_yg_bisa_dihubungi = ?, hubungan_keluarga = ?, no_telp_keluarga = ? WHERE id_formulir = ? AND id_users = ?");
    //     $stmt->bind_param("sssisssisssssssssssssssssssssssii", $program, $kamar, $nama_lengkap, $nik, $nama_ayah_kandung, $tempat_lahir, $tanggal_lahir, $no_paspor, $tempat_dikeluarkan_paspor, $tanggal_dikeluarkan_paspor, $masa_berlaku_paspor, $jenis_kelamin, $golongan_darah, $status_perkawinan, $provinsi, $kota_kabupaten, $kecamatan, $kelurahan, $jalan, $email, $no_telp_rumah, $no_telp_seluler, $pendidikan_terakhir, $pekerjaan, $keluarga_yg_ikut, $hubungan, $no_telp, $informasi_pendaftaran, $penyakit_kronis, $keluarga_yg_bisa_dihubungi, $hubungan_keluarga, $no_telp_keluarga, $id_formulir, $id_users);

    //     if ($stmt->execute()) {
    //     return true;
    //     } else {
    //         echo "No Record Found";
    //       }
    
    // }

    public function ubahData($id_formulir, $id_users, $program, $kamar, $nama_lengkap, $nik, $nama_ayah_kandung, $tempat_lahir, $tanggal_lahir, $no_paspor, $tempat_dikeluarkan_paspor, $tanggal_dikeluarkan_paspor, $masa_berlaku_paspor, $jenis_kelamin, $golongan_darah, $status_perkawinan, $provinsi, $kota_kabupaten, $kecamatan, $kelurahan, $jalan, $email, $no_telp_rumah, $no_telp_seluler, $pendidikan_terakhir, $pekerjaan, $keluarga_yg_ikut, $hubungan, $no_telp, $informasi_pendaftaran, $penyakit_kronis, $keluarga_yg_bisa_dihubungi, $hubungan_keluarga, $no_telp_keluarga) {

        $sql = "UPDATE formulir SET program = '$program', kamar = '$kamar', nama_lengkap = '$nama_lengkap', nik = '$nik', nama_ayah_kandung = '$nama_ayah_kandung', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', no_paspor = '$no_paspor', tempat_dikeluarkan_paspor = '$tempat_dikeluarkan_paspor', masa_berlaku_paspor = '$masa_berlaku_paspor', jenis_kelamin = '$jenis_kelamin', golongan_darah = '$golongan_darah', status_perkawinan = '$status_perkawinan', provinsi = '$provinsi', kota_kabupaten = '$kota_kabupaten', kecamatan = '$kecamatan', kelurahan = '$kelurahan', jalan = '$jalan', email = '$email', no_telp_rumah = '$no_telp_rumah', no_telp_seluler = '$no_telp_seluler', pendidikan_terakhir = '$pendidikan_terakhir', pekerjaan = '$pekerjaan', keluarga_yg_ikut = '$keluarga_yg_ikut', hubungan = '$hubungan', no_telp = '$no_telp', informasi_pendaftaran = '$informasi_pendaftaran', penyakit_kronis = '$penyakit_kronis', keluarga_yg_bisa_dihubungi = '$keluarga_yg_bisa_dihubungi', hubungan_keluarga = '$hubungan_keluarga', no_telp_keluarga = '$no_telp_keluarga' WHERE id_formulir = '$id_formulir'";

        // Jalankan query
        if ($this->conn->query($sql) === TRUE) {
            echo "<script>alert('Penambahan Data Berhasil');window.location=' dashboard_user.php?id_users=$id_users';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    public function TambahDataPembayaran() {
        $id_pembayaran = rand(1, 99999);
        $bank = $_POST['bank'];
        $name_rek = $_POST['name_rek'];
        $no_rek = $_POST['no_rek'];
        $program = $_POST['program'];
        $nominal = $_POST['nominal'];
        
    
        // Buat query untuk insert data ke tabel table_jadwal
        $sql = "INSERT INTO form_pembayaran (id_pembayaran, bank, name_rek, no_rek, program, nominal)
                VALUES ('$id_pembayaran', '$bank', '$name_rek', '$no_rek', '$program', '$nominal')";
    
        // Jalankan query
        if ($this->conn->query($sql) === TRUE) {
            echo "<script>alert('Penambahan Data Berhasil');window.location=' form_pembayaran_admin.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
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
    public function deleteBank($id_pembayaran) {
        if (empty($id_pembayaran)) {
            return false;
        }
        $query = "DELETE FROM form_pembayaran WHERE id_pembayaran = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id_pembayaran);
        if ($stmt->execute()) {
            if ($stmt->affected_rows == 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }  
    }
}