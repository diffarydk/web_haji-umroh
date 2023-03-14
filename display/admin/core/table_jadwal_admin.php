<?php
include('../../../connection.php');
include_once('../../../input/DashboardModel.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <link rel="stylesheet" href="../../../core/style/style.css"/>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"/>
</head>
<body>
    <main>
    <div class="hContainer">
    <?php
    $users = new admin();
    $id_users = $_GET['id_jadwal'] ?? null; 

      if (isset($_GET['delete'])) {
      $id_jadwal = $_GET['delete'];
      $delete = $users->DeleteJadwal($id_jadwal);
      header("Location: table_jadwal_admin.php");
       exit;
                                      }
    $result = $users->DataJadwal();
    if($result) {
      ?>
      <table class="schedule-table">
        <thead>
          <tr>
            <th>Tanggal Keberangkatan</th>
            <th>Maskapai</th>
            <th>Tanggal Pulang</th>
            <th>Jumlah</th>
            <th>Sisa</th>
            <th>Hapus</th>
          </tr>
        </thead>
        <tbody>
      <?php
      foreach($result as $row) {
        ?>
        <tr class="schedule-row">
          <td class="schedule-date"><?= $row['tanggal_keberangkatan']; ?></td>
          <td class="schedule-airline"><?= ucwords($row['maskapai']); ?></td>
          <td class="schedule-return-date" value=""><?= $row['tanggal_pulang']; ?></td>
          <td class="schedule-availability" value=""><?= $row['jumlah_kursi']; ?></td>
          <td class="schedule-availability">20</td>
          <td><a href="table_jadwal_admin.php?delete=<?= $row['id_jadwal']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><button class="uil uil-trash-alt"></button></a></td>
        </tr>
        <?php
      }
      ?>
        </tbody>
      </table>
      <?php
    } else {
        ?>
            <table class="schedule-table">
            <thead>
              <tr>
                <th>Tanggal Keberangkatan</th>
                <th>Maskapai</th>
                <th>Tanggal Pulang</th>
                <th>Jumlah</th>
                <th>Sisa</th>
                <th>Hapus</th>
              </tr>
            </thead>
          </table>
      <?php
    }
  ?>
  <a href="dashboard.php"><button class="smpn sm-4"><p>Kembali</p></button></a>
  <a href="edit-table_jadwal_admin.php"><button class="smpn sm-2"><p>Tambah Data</p></button></a>
                  <nav class="sidebar">
            <img class="user-logo" src="../../../core/asset/icon-user.png" alt="user-logo" href="../welcome.html"></a>  
              <ul class="nav-list">
                  <li class="list-item"><a class="login" href="login.html">Login/Daftar</a></li>
                  <li class="list-item"><a class="fa" href="galeri.html">Galeri</a></li>
                  <li class="list-item"><a class="fa" href="kontak.html">Kontak</a></li>
                  <li class="list-item"><a class="fa" href="pendaftaran.html">Daftar Haji & Umroh</a></li>
                  <li class="list-item"><a class="fa" href="dashboard.php">Dashboard</a></li>
                  <li class="list-item"><a class="fa tentang-kami" href="tentang-kami.html">Tentang Kami</a></li>
                  <li class="list-item"><a class="logout" href="#">Logout</a></li>
                </ul>
          </nav>
        <nav class="wrapper">
          <a href="../../welcome.hmtl"><img class="img-logo" src="../../../core/asset/LogoItkontamaTravelOrange2022.png" alt="Logo-icon"></a>
            <button class="hamburger">
                <div class="bar"></div>
            </button>
        </nav>
    </div>
</main>
    <script src="../../../core/script/script.js"></script>
</body>
</html>
