<?php
include('../../../connection.php');
include_once('../../../input/DashboardModel.php');
include_once('../../../input/ProfileModel.php');
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
            <div class="horizontal"></div><?php
            $users = new admin();
            $id_users = $_GET['id_users'] ?? null; 
    $result = $users->getData();
                                            if($result)
                                        {
                                            foreach($result as $row)
                                            {
                                              if($row['id_users'] == $id_users) {
                                                ?>
                <h1><?= $row['username']; ?></h1>
                <p><?= $row['email']; ?></p>
                <?php
        }
      }
  }
  else
  {
      echo "No Record Found";
  }
                                    ?>
                <a href="dashboard_pembayaran.php">
                        <button class="tnm tnm-6">
                          <p>Data Pembayaran</p>
                        </button>
                    </a>
                    <a href="dashboard.php">
                      <button class="tnm tnm-7">
                        <p>Kembali</p>
                      </button>
                  </a>           
                  <?php
$users = new admin();
$id_formulir = $_GET['id_formulir'] ?? null;
$id_users = $_GET['id_users'] ?? null;

if (isset($_GET['delete']) && isset($_GET['id_formulir'])) {
    $id_formulir = $_GET['id_formulir'];
    $delete = $users->deleteFormulir($id_formulir);
    if (empty($id_formulir)) {
        return false;
    }
}

$result = $users->profile();

if($result) {
    $profiles = $result[1];
    if($profiles) {
        foreach($profiles as $profile) {
?>
        <div class="parent-element">
            <div class="block">
                <p><?php echo $profile['nik']; ?></p>
                <p><?php echo $profile['nama_lengkap']; ?></p>
                <a href="../../../input/adminGenerate.php?id_formulir=<?php echo $profile['id_formulir']; ?>&id_users=<?php echo $id_users; ?>" download="formulir_<?php echo $profile['id_formulir']; ?>.pdf">
                    <button class="tnm tnm-3">
                        <p>Cetak</p>
                    </button>
                </a>
                <a href="form-daftar-edit.php?id_formulir=<?php echo $profile['id_formulir']; ?>&id_users=<?php echo $id_users; ?>">
                    <button class="tnm tnm-1">
                        <p>Cek Data Jamaah</p>
                    </button>
                </a>
                <a href="dashboard_user.php?id_users=<?php echo $id_users; ?>&id_formulir=<?php echo $profile['id_formulir']; ?>&delete=<?php echo $profile['id_formulir']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                    <button class="tnm tnm-2">
                        <p>Hapus</p>
                    </button>
                </a>
            </div>
        </div>
<?php
        }
    } 
}
?>
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
