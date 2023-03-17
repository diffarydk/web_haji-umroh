<?php
include('../../connection.php');
include_once('../../input/DataFormulir.php');
session_start();
$_SESSION['id_formulir'] = 'c09277202fe04940';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <link rel="stylesheet" href="../../core/style/style.css"/>
</head>
<body>
    <main>
    <div class="hContainer">
    <?php 
$formulir = new Formulir();
$id_users = $_GET['id_jadwal'] ?? null;
$row = $formulir->DataJadwal();
if($row){
?>

<form action="../../controller/TableController.php" method="post">
  <table class="schedule-table">
    <thead>
      <tr>
        <th>Tanggal Keberangkatan</th>
        <th>Maskapai</th>
        <th>Tanggal Pulang</th>
        <th>Jumlah</th>
        <th>Jumlah Sisa</th>
        <th>Pilih</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($row as $show) { ?>
      <tr class="schedule-row">
        <td class="schedule-date"><?= $show['tanggal_keberangkatan']; ?></td>
        <td class="schedule-airline"><?= ucwords($show['maskapai']); ?></td>
        <td class="schedule-return-date"><?= $show['tanggal_pulang']; ?></td>
        <td class="schedule-availability"><?= $show['jumlah_kursi']; ?></td>
        <td class="schedule-availability">20</td>
        <td class="schedule-select">
          <input type="radio" name="schedule" value="<?= $show['id_jadwal']; ?>">
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <a href="form-daftar.php">
    <button class="smpn sm-4"><p>Kembali</p></button>
  </a>
  <button class="smpn sm-2" type="submit" name="submit"><p>Kirim</p></button>
</form>

<?php } else { ?>
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
        <nav class="sidebar">
          <a href="profile.php"><img class="user-logo" src=".././core/asset/icon-user.png" alt="user-logo"></a>  
            <ul class="nav-list">
                <li class="list-item"><a class="login" href="login.html">Login/Daftar</a></li>
                <li class="list-item"><a class="fa" href="galeri.html">Galeri</a></li>
                <li class="list-item"><a class="fa" href="kontak.html">Kontak</a></li>
                <li class="list-item"><a class="fa" href="pendaftaran.html">Daftar Haji & Umroh</a></li>
                <li class="list-item"><a class="fa" href="panduan.html">Panduan</a></li>
                <li class="list-item"><a class="fa tentang-kami" href="tentang-kami.html">Tentang Kami</a></li>
                <li class="list-item"><a class="logout" href="#">Logout</a></li>
              </ul>
        </nav>
        <nav class="wrapper">
          <a href="../../index.php"><img class="img-logo" src="../../core/asset/LogoItkontamaTravelOrange2022.png" alt="Logo-icon"></a>
            <button class="hamburger">
                <div class="bar"></div>
            </button>
        </nav>
    </div>
</main>
    <script src="../../core/script/script.js"></script>
</body>
</html>
