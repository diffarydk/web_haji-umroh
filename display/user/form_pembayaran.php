<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <link rel="stylesheet" href="../../core/style/style.css"/>
    <link rel="stylesheet" href="../../core/style/pembayaran.css"/>
</head>
<body>
    <main>
    <div class="page-container">
    <div class="payment-container">
      <form action="#" method="post" enctype="multipart/form-data">
        <div class="payment-info">
          <div class="row">
            <label for="bank">Nama Bank:</label>
            <input type="text" id="bank" name="bank" value="BSI" readonly>
          </div>
          <div class="row">
            <label for="account-name">Nama Rekening:</label>
            <input type="text" id="account-name" name="account-name" value="PT Itkontama Jelajah Bumi Imani" readonly>
          </div>
          <div class="row">
            <label for="account-number">Nomor Rekening:</label>
            <input type="text" id="account-number" name="account-number" value="7221511411" readonly>
          </div>
          <div class="row">
            <label for="amount">Nominal Pembayaran:</label>
            <input type="number" id="amount" name="amount" readonly>
          </div>
          <div class="row">
            <label for="proof">Bukti Pembayaran:</label>
            <input type="file" id="proof" name="proof" accept="image/*" required>
          </div>
        </div>
        <div class="btn-container">
          <button class="sbt-button" type="submit" name="submit">Kirim</button>
          <a href="table_jadwal.php" class="back-button">Kembali</a>
        </div>
      </form>
    </div>
  </div>  
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
          <a href="../index.html"><img class="img-logo" src="../../core/asset/LogoItkontamaTravelOrange2022.png" alt="Logo-icon"></a>
            <button class="hamburger">
                <div class="bar"></div>
            </button>
        </nav>
    </div>
</main>
    <script src="../../core/script/script.js"></script>
</body>
</html>
