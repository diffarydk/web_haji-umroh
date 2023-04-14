<?php
session_start();
require_once "../../connection.php";
require_once "../../input/DataFormulir.php";
$result = new TableJadwal();
// $id_formulir = $_GET['id_formulir'];
$id_formulir = $_SESSION['id_formulir'];
$result = $result->DataFormulir($id_formulir);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <link rel="stylesheet" href="../../core/style/style.css"/>
    <link rel="stylesheet" href="../../core/style/konfirmasi.css"/>
</head>
<body>
    <main>
        <input type="hidden" value="<?=$id_formulir; ?>">
    <div class="hContainer">
    <div class="bContainer">
    <img class="img" src="../../core/asset/LogoItkon.png" alt="">
    <div class="line">
    <h3>Nomor Transaksi: <?php echo $row['id_users'] . $row['id_formulir'] . $row['id_jadwal_formulir'] . $row['id_pembayaran_formulir']; ?></h3>
    </div>
    <div class="line n"></div>
    <h3>Status Pembayaran : <button class="status">Terkirim</button> </h3>
    <div class="line n"></div>
    <h3>Status Transaksi : <button class="status"><?php echo ucfirst($row['status']);?> dikonfirmasi</button> </h3>
    <div class="line n"></div>
    <h3>Waktu Pembayaran : <?php echo $row['time_stamp'];?></h3>
    <h4>*Cetak PDF Pendaftaran dengan cara mengklik logo disamping Login</h4>
    <a href="../../index.php"><button class="tombol">Beranda</button></a>
  </div>
  <?php
}
?>
        <nav class="sidebar">
            <a href="profile.php"><img class="user-logo" src="../../core/asset/icon-user.png" alt="user-logo" ></a>  
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
