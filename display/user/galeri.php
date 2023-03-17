<?php
require "../LinkModelController.php";
  $gallery = new GaleriController();
  $photos = $gallery->getAllPhotos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri</title>
    <link rel="stylesheet" href="../../core/style/style.css"/>
    <link rel="stylesheet" href="../../core/style/galeri.css">
</head>
<body>
<h1>Galeri</h1>
<div class="gallery">
  <div class="main-image">
    <img src="../../core/galeri/<?php echo $photos[0]['nama_file']; ?>" >
  </div>
  <div class="gallery-items">
    <?php foreach ($photos as $index => $photo): ?>
      <?php if ($index !== 0): ?>
        <div class="gallery-item">
          <img src="../../core/galeri/<?php echo $photo['nama_file']; ?>" >
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</div>

    
    </div>
        <nav class="sidebar">
            <a href="profile.html"><img class="user-logo" src="../../core/asset/icon-user.png" alt="user-logo" ></a>  
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

</script>
</script>
</html>
