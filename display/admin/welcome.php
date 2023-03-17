<?php
 require_once "../LinkModelController.php";
    if(!isset($_SESSION['id_users']) || $_SESSION['level'] != 'admin') {
      echo "<script>alert('Anda harus login terlebih dahulu');window.location='../../display/user/login.php';</script>";
      exit;
    }
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
   
  $controller = new EditHomeController();
  // panggil method index() untuk mendapatkan data gambar yang akan diupdate
  $row = $controller->GetAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <link rel="stylesheet" href="../../core/style/style.css"/>
    <link rel="stylesheet" href="../../core/style/AdminWelcome.css">
</head>
<body>
<div class="img-container">
  <div class="img-wrapper">
    <img class="center-img" src="../../core/gambar_home/<?php echo $row['gambar']; ?>" alt="Project Image">
    <div class="overlay">
      <div class="overlay-infos">
        <h5>Project Title</h5>
        <a href="../admin/core/EditHomePage.php"><i class="ti-zoom-in">Ganti</i></a>
        <a href="javascript:void(0)"><i class="ti-link">Preview</i></a>
      </div>
    </div>
  </div>
</div>

    <main>
        <nav class="sidebar">
        <img class="user-logo" src="../../core/asset/icon-user.png" href="welcome.html">
            <ul class="nav-list">
           
                
                <li class="list-item"><a class="login" href="#"><?php echo $username; ?></a></li>
                <li class="list-item"><a class="fa" href="../../display/user/register.php">Daftar</a></li>
                <li class="list-item"><a class="fa" href="core/galeri.php">Galeri</a></li>
                <li class="list-item"><a class="fa" href="core/kontak.html">Kontak</a></li>
                <li class="list-item"><a class="fa" href="core/pendaftaran.html">Daftar Haji & Umroh</a></li>
                <li class="list-item"><a class="fa" href="core/dashboard.php">Dashboard</a></li>
                <li class="list-item"><a class="fa tentang-kami" href="core/tentang-kami.html">Tentang Kami</a></li>
                <li class="list-item"><a id="logout-link" class="logout" href="../../controller/logout.php">Logout</a></li>
              </ul>
        </nav>
        <nav class="wrapper">
          <a href="welcome.html"><img class="img-logo" src="../../core/asset/LogoItkontamaTravelOrange2022.png" alt="Logo-icon"></a>
            <button class="hamburger">
                <div class="bar"></div>
            </button>
        </nav>
    </div>
</main>
    <script src="../../core/script/script.js"></script>
    <script>
        $(document).ready(function(){
    $(".navbar .nav-link").on('click', function(event) {

        if (this.hash !== "") {

            event.preventDefault();

            var hash = this.hash;

            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 700, function(){
                window.location.hash = hash;
            });
        } 
    });
}); 
    </script>


</body>
</html>
