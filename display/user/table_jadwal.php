<?php
session_start();
require_once "../LinkModelController.php";
$jadwal = new TableController();
$jadwal->handleForm();
$id_formulir = $_SESSION['id_formulir'];
$_SESSION['id_formulir'] = $id_formulir;
$rows = $jadwal->GetAllJadwal();
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
    if($rows){
    ?>
    <form action="" method="post" id="jadwal-form">
    <table class="schedule-table">
        <thead>
            <tr>
                <th>Tanggal Keberangkatan</th>
                <th>Tanggal Pulang</th>
                <th>Maskapai</th>
                <th>Mekah</th>
                <th>Madinah</th>
                <th>Jumlah Sisa</th>
                <th>Sisa Kursi</th>
                <th>Pilih</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            while($row = $rows->fetch_assoc()){
            ?>
            <tr class="schedule-row">
                <td class="schedule-date">
                    <input type="date" name="tanggal_keberangkatan" value="<?= $row['tanggal_keberangkatan']; ?>" readonly>
                </td>
                <td class="schedule-availability">
                    <input type="date" name="tanggal_pulang" value="<?= $row['tanggal_pulang']; ?>" readonly>
                </td>
                <td class="schedule-return-date">
                    <input type="text" name="maskapai" value="<?= $row['maskapai']; ?>" readonly>
                </td>
                <td class="schedule-return-date">
                    <input type="text" name="mekah" value="<?= $row['mekah']; ?>" readonly>
                </td>
                <td class="schedule-return-date">
                    <input type="text" name="madinah" value="<?= $row['madinah']; ?>" readonly>
                </td>

                <td class="schedule-return-date">
                    <input type="text" name="jumlah_kursi" value="<?= $row['jumlah_kursi']; ?>" readonly>
                </td>

                <td class="schedule-return-date">
                    <input type="text" name="sisa_Kursi" value="<?= $row['sisa_kursi']; ?>" readonly>
                </td>
              
                <td class="schedule-select">
                    <input type="radio" name="id_jadwal" value="<?= $row['id_jadwal'];?>">
                </td>
            </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
    
    <input type="hidden" name="id_formulir" value="<?= $id_formulir; ?>">
    <a href="form-daftar.php">
        <button class="smpn sm-4"><p>Kembali</p></button>
    </a>
    <button class="smpn sm-2" type="submit" name="submit" ><p>Kirim</p></button>
</form>
            <?php 
            }
            ?>
         <nav class="sidebar">
          <a href="../../display/user/profile.php"><img class="user-logo" src="../../core/asset/icon-user.png" alt="user-logo" href="index.html"></a>  
            <ul class="nav-list">
                <?php
                if (isset($_SESSION['username'])) {
                    // tampilkan username di tempat li
                    echo '<li class="list-item-login">' . $_SESSION['username'] . '</li>';
                } else {
                    // tampilkan li "Login/Daftar"
                    echo '<li class="list-item"><a class="login" href="./display/user/login.php">Login/Daftar</a></li>';
                }
                ?>
                <!-- <li class="list-item"><a class="login" href="./display/user/login.php">Login/Daftar</a></li> -->
                <li class="list-item"><a class="fa" href="display/user/galeri.php">Galeri</a></li>
                <li class="list-item"><a class="fa" href="display/user/kontak.html">Kontak</a></li>
                <li class="list-item"><a class="fa" href="display/user/pendaftaran.html">Daftar Haji & Umroh</a></li>
                <li class="list-item"><a class="fa" href="display/user/panduan.html">Panduan</a></li>
                <li class="list-item"><a class="fa tentang-kami" href="display/user/tentang-kami.html">Tentang Kami</a></li>
                <li class="list-item"><a class="logout" href="./controller/logout.php">Logout</a></li>
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
</script>
<script>
    document.getElementById("jadwal-form").addEventListener("submit", function(event){
    var konfirmasi = confirm("Apakah Anda yakin memilih jadwal ini?");
    if(!konfirmasi){
        event.preventDefault();
    }
});

</script>
</body>
</html>