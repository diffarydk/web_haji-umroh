<?php
require_once "../../LinkModelController.php";
$controller = new GaleriController();
$controller->handleRequest();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri</title>
    <link rel="stylesheet" href="../../../core/style/style.css"/>
    <link rel="stylesheet" href="../../../core/style/galeri.css">
</head>
<body>
<h1>Galeri</h1>

<div class="FormGaleri">
  <form name="form1" action="" method="post" enctype="multipart/form-data">
    File:
    <input type="file" name="nama_file" id="file" onchange="previewImage(event)" accept="image/*"/><br/>
    <div id="imagePreview">
      <img src="https://via.placeholder.com/150?text=?" alt="Preview" style="max-width: 150px; max-height: 150px;">
    </div>
    Deskripsi: 
    <textarea name="deskripsi" id="deskripsi"></textarea><br/>
    <input type="submit" name="submit" value="Upload"/>
  </form>
</div>

  <table>
  <thead>
    <tr>
      <th>Nomor</th>
      <th>Gambar</th>
      <th>Deskripsi</th>
      <th>Update Gambar dan deskripsi</th>
      <th>Update deskripsi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $i= 1;
    foreach ($controller->getAllPhotos() as $gambar) { ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><img src="../../../core/galeri/<?php echo $gambar['nama_file']; ?>" alt="<?php echo $gambar['deskripsi']; ?>" width="100"></td>
        <td><?php echo $gambar['deskripsi']; ?></td>
        <td>
          <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $gambar['id']; ?>">
            <button type="submit" name="delete">Delete</button>
          </form>
          <form action="" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?php echo $gambar['id']; ?>">
  <input type="hidden" name="nama_file_lama" value="<?php echo $gambar['nama_file']; ?>">
  <label for="gambar_baru">Gambar Baru:</label>
  <input type="file" name="gambar_baru" id="gambar_baru">
  <br><br>
  <label for="deskripsi">Deskripsi:</label>
  <textarea name="deskripsi" id="deskripsi"></textarea><br><br>
  <br><br>
  <button type="submit" name="update">Update</button>
</form>
<td>
<form action="" method="post">
  <input type="hidden" name="id" value="<?php echo $gambar['id']; ?>">
  <label for="deskripsi">Deskripsi:</label><br>
  <textarea name="deskripsi" id="deskripsi"></textarea><br><br>
  <button type="submit" name="update_deskripsi">Update</button>
</form>
</td>
        </td>
      </tr>     
    <?php } ?>
  </tbody>
</table>
<a href="EditPaket.php"><button class="smpn sm-2"><p>Input Paket</p></button></a>
    </div>
        <nav class="sidebar">
            <a href="profile.html"><img class="user-logo" src="../../../core/asset/icon-user.png" alt="user-logo" ></a>  
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
          <a href="../welcome.php"><img class="img-logo" src="../../../core/asset/LogoItkontamaTravelOrange2022.png" alt="Logo-icon"></a>
            <button class="hamburger">
                <div class="bar"></div>
            </button>
        </nav>
    </div>
</main>
    <script src="../../../core/script/script.js"></script>
</body>

<script>
  function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('imagePreview');
      output.innerHTML = '<img src="' + reader.result + '" alt="Preview" style="max-width: 150px; max-height: 150px;">';
    };
    reader.readAsDataURL(event.target.files[0]);
  }
</script>
</script>
</html>
