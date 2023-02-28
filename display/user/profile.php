<?php
session_start();
    if(!isset($_SESSION['id_users'])) {
      echo "<script>alert('Anda harus login terlebih dahulu');window.location='../user/login.php';</script>";
      exit;
  }

  $conn = mysqli_connect("localhost", "root", "", "db_haji_umroh");

// mengambil data profil pengguna dari database
$id_users = $_SESSION['id_users'];
$query = "SELECT u.username, u.email, f.nama_lengkap, f.nik FROM users u JOIN formulir f ON u.id_users = f.id_users WHERE u.id_users='$id_users' LIMIT 1";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

// proses pencarian profil berdasarkan nik
if (isset($_GET['search'])) {
  $search = $_GET['search'];
  $query = "SELECT * FROM formulir WHERE nik LIKE '%$search%'";
} else {
  $query = "SELECT nik,nama_lengkap FROM formulir";
}

$result = mysqli_query($conn, $query);
$profiles = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <link rel="stylesheet" href="../../core/style/style.css"/>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"/>
</head>
<body>
    <main>
    <div class="hContainer profile">
        <div class="pContainer">
            <div class="horizontal"></div>
                <h1><?php echo $user['username']; ?></h1>
                <p><?php echo $user['email']; ?></p>
                <div class="search-container">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="uil uil-search"></i></button>
                </div><?php
for ($i=0; $i < count($profiles); $i++) { 
    $profile = $profiles[$i];
?>
    <div class="parent-element">
        <div class="block">
            <p><?php echo $profile['nik']; ?></p>
            <p><?php echo $profile['nama_lengkap']; ?></p>
            <a href="#">
                <button class="tnm tnm-1">
                    <p>Cek Data Jamaah</p>
                </button>
            </a>
            <a href="#">
                <button class="tnm tnm-2">
                    <p>Cetak</p>
                </button>
            </a>
        </div>
    </div>
<?php } ?><!--
                <div class="block block-2">
                  <i class="uil uil-lock-alt"></i>
                  <a href="#">
                    <button class="tns">
                      <p>Menunggu Konfirmasi Pembayaran</p>
                    </button>
                  </a>
                </div>
                <br><br> -->
        <nav class="sidebar">
          <a href="profile.html"><img class="user-logo" src="../../core/asset/icon-user.png" alt="user-logo" href="../index.html"></a>  
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
    <script>
      const blocks = document.querySelectorAll('.block');
let topValue = 0;

blocks.forEach(block => {
  block.style.top = `${topValue}px`;
  topValue += 100; // increase topValue by 100px for the next block
});
    </script>
</body>
</html>
