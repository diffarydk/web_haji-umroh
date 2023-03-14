<?php
include('../../../connection.php');
include_once('../../../input/DashboardModel.php');

$admin = new admin();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $admin->TambahData();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <link rel="stylesheet" href="../../../core/style/style.css"/>
</head>
<body>
    <main>
    <div class="hContainer">
      <form method="POST">
        <table class="schedule-table">
            <thead>
              <tr>
                <th>Tanggal Keberangkatan</th>
                <th>Maskapai</th>
                <th>Tanggal Pulang</th>
                <th>Jumlah</th>
              </tr>
            </thead>
            <tbody>
              <tr class="schedule-row">
                <td class="schedule-date"><input type="date" name="tanggal_keberangkatan"required></td>
                <td class="schedule-airline"><input type="text" name="maskapai" placeholder="Masukkan Maskapai" required></td>
                <td class="schedule-return-date"><input type="date" name="tanggal_pulang" required></td>
                <td class="schedule-availability"><input type="text" name="jumlah_kursi" placeholder="Masukkan jumlah kursi" required></td>
              </tr>
            </tbody>
          </table>
          <button class="smpn sm-1" type="submit" name="submit" value="submit"><p>Simpan</p></button>
        </form>
        <a href="table_jadwal_admin.php"><button class="smpn sm-3" type="button"><p>Kembali</p></button></a>
    </div>
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
          <a href="../welcome.html"><img class="img-logo" src="../../../core/asset/LogoItkontamaTravelOrange2022.png" alt="Logo-icon"></a>
            <button class="hamburger">
                <div class="bar"></div>
            </button>
        </nav>
    </div>
</main>
    <script src="../../../core/script/script.js"></script>
</body>
</html>
