<?php
include('../../../connection.php');
include_once('../../../input/DashboardModel.php');
$admin = new admin(); 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $admin->TambahDataPembayaran();
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
    <link rel="stylesheet" href="../../../core/style/pembayaran.css"/>
</head>
<body>
    <main>
    <div class="page-container">
    <div class="payment-container">
      <form action="#" method="post" enctype="multipart/form-data">
        <div class="payment-info">
          <div class=" row">
            <label for="bank">Nama Bank:</label>
            <input type="text" id="bank" name="bank" required>
          </div>
          <div class="row">
            <label for="account-name">Nama Rekening:</label>
            <input type="text" id="account-name" name="name_rek" required>
          </div>
          <div class="row">
            <label for="account-number">Nomor Rekening:</label>
            <input type="text" id="account-number" name="no_rek">
          </div>
          <div class="row">
            <label for="program">Program:</label>
            <select type="text" id="program" name="program" required>
              <option value="" selected> Pilih Program </option>
              <option value="umroh reguler">Umroh Reguler</option>
              <option value="umroh plus">Umroh Plus</option>
            </select>
          </div>
          <div class="row">
            <label for="amount">Nominal Pembayaran:</label>
            <input type="text" id="amount" name="nominal" pattern="\d*" required>
          </div>
        <div class="btn-container">
          <button class="sbt-button adm" type="submit" name="submit">Simpan</button>
          <a href="form_pembayaran_admin.php" class="back-button admi">Kembali</a>
        </div>
      </form>
    </div>
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
          <a href="../welcome.php"><img class="img-logo" src="../../../core/asset/LogoItkontamaTravelOrange2022.png" alt="Logo-icon"></a>
            <button class="hamburger">
                <div class="bar"></div>
            </button>
        </nav>
    </div>
</main>
    <script src="../../../core/script/script.js"></script>
</body>
</html>
