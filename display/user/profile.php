<?php
include('../../connection.php');
include_once('../../input/ProfileModel.php');
session_start();
if(!isset($_SESSION['id_users'])) {
  echo "<script>alert('Anda harus login terlebih dahulu');window.location='../user/login.php';</script>";
  exit;
}
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
      <div class="pContainer" >
        <div class="horizontal"></div>
        <?php
                                        $users = new user();
                                        $result = $users->index();
                                        if($result)
                                        {
                                            foreach($result as $row)
                                            {
                                                ?>
        <h1><?= $row['username']; ?></h1>
        <p><?= $row['email']; ?></p>
        <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No Record Found";
                                        }
                                    ?>
        <?php
    $users = new user();
    $result = $users->profile();
    $id_formulir = $_GET['id_formulir'] ?? null;
    if($result)
    {
        $profiles = $result[1];
        for ($i = 0; $i < $profiles->num_rows; $i++) {
          $profile = $profiles->fetch_assoc();
?>
     <div class="parent-element">
            <?php if ($profile['status'] == "belum") { ?>
                <div class="block">
                    <i class="uil uil-lock-alt"></i>
                    <a href="kontak.html">
                        <button class="tns">
                            <p>Menunggu Konfirmasi Pembayaran</p>
                        </button>
                    </a>
                </div>
                <?php } else if ($profile['status'] == "ditolak") { ?>
    <div class="block">
        <a href="kontak.html">
            <button class="tns nmt-1">
                <p>Pembayaran Ditolak</p>
            </button>
        </a>
    </div>
    <?php } else { ?>
     </div>
    <div class="parent-element">
        <div class="block">
            <p><?php echo $profile['nik']; ?></p>
            <p><?php echo $profile['nama_lengkap']; ?></p>
            <a href="cek_data.php?id_formulir=<?php echo $profile['id_formulir']; ?>">
                <button class="tnm tnm-1">
                    <p>Cek Data Jamaah</p>
                </button>
            </a>
            <a href="../../input/generate.php?id_formulir=<?php echo $profile['id_formulir']; ?>&id_users=<?php echo $_SESSION['id_users']; ?>" download="formulir_<?php echo $profile['id_formulir']; ?>.pdf">
                <button class="tnm tnm-2">
                    <p>Cetak</p>
                </button>
            </a>
        </div>
        <?php } ?>
        </div>
        <?php
    }
} ?>
      </div> <!--
                <div class="block">
                  <i class="uil uil-lock-alt"></i>
                  <a href="#">
                    <button class="tns">
                      <p>Menunggu Konfirmasi Pembayaran</p>
                    </button>
                  </a>
                </div>
                <br><br> -->
                <nav class="sidebar">
          <a href="profile.php"><img class="user-logo" src="../../core/asset/icon-user.png" alt="user-logo" href="../index.html"></a>  
            <ul class="nav-list">
                <li class="list-item"><a class="login" href="login.php">Login/Daftar</a></li>
                <li class="list-item"><a class="fa" href="galeri.html">Galeri</a></li>
                <li class="list-item"><a class="fa" href="kontak.html">Kontak</a></li>
                <li class="list-item"><a class="fa" href="pendaftaran.php">Daftar Haji & Umroh</a></li>
                <li class="list-item"><a class="fa" href="panduan.html">Panduan</a></li>
                <li class="list-item"><a class="fa tentang-kami" href="tentang-kami.html">Tentang Kami</a></li>
                <li class="list-item"><a class="logout" href="../../controller/logout.php">Logout</a></li>
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