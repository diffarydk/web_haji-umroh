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
    <div class="hContainer profile">
        <div class="pContainer">
            <div class="horizontal"></div>
            <?php
          $users = new admin();
          $id_users = $_GET['id_users'] ?? null; 
  $result = $users->getData();
                                          if($result)
                                      {
                                          foreach($result as $row)
                                          {
                                            ?>
                <h1>Pembayaran</h1>
                <a href="dashboard_user.php?id_users=<?php echo $row['id_users']; ?>">
                    <button class="tnm tnm-5">
                      <p>Data Jamaah</p>
                    </button>
                </a><?php
              }
  }
  else
  {
      echo "No Record Found";
  }
                                    ?>
                <div class="block block-1">
                  <p>123456778910</p>
                  <p>diffary dzikri khattab</p>
                  <a href="#">
                    <button class="tnm tnm-3">
                      <p>Cetak</p>
                    </button>
                   <a href="konfirmasi_pembayaran-edit.html">
                      <button class="tnm tnm-1">
                        <p>Cek Pembayaran</p>
                      </button>
                  </a>
                  <a href="#">
                    <button class="tnm tnm-2">
                      <p>Hapus</p>
                    </button>
                  </a>
                </div>
                <br><br>
                <div class="block block-4">
                    <p>123456778910</p>
                    <p>diffary dzikri khattab</p>
                    <a href="#">
                      <button class="tnm tnm-3">
                        <p>Cetak</p>
                      </button>
                     <a href="konfirmasi_pembayaran-edit.html">
                        <button class="tnm tnm-1">
                          <p>Cek Pembayaran</p>
                        </button>
                    </a>
                    <a href="#">
                      <button class="tnm tnm-2">
                        <p>Hapus</p>
                      </button>
                    </a>
                  </div>
                  <br><br>
        </div>
        <nav class="sidebar">
          <img class="user-logo" src="../../../core/asset/icon-user.png" alt="user-logo" href="../welcome.html">
            <ul class="nav-list">
                <li class="list-item"><a class="login" href="login.html">Login/Daftar</a></li>
                <li class="list-item"><a class="fa" href="galeri.html">Galeri</a></li>
                <li class="list-item"><a class="fa" href="kontak.html">Kontak</a></li>
                <li class="list-item"><a class="fa" href="pendaftaran.html">Daftar Haji & Umroh</a></li>
                <li class="list-item"><a class="fa" href="dashboard.html">Dashboard</a></li>
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
