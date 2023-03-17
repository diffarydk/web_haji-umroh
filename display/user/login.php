<?php
require_once "../LinkModelController.php";
$loginController = new LoginController();
$loginController->login($username,$password);
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
    <div> 
       <div class="center">
  <h1>Login</h1>
  <form  method="post">
    <div class="txt_field">
      <input type="text" placeholder="Username" name="username" required>
      <span></span>
      <label>Username</label>
    </div>
    <div class="txt_field">
      <input type="password" placeholder="Password" name="password" required>
      <span></span>
      <label>Password</label>
    </div>
    <input type="submit" name="submit" value="Login">
    <div class="signup_link">
      Tidak punya akun? <a href="register.html">Register</a>
    </div>
  </form>
</div>
  <main>
    <div class="hContainer login-img">
        <div class="kotak-login"></div>
          <nav class="sidebar">
            <img class="user-logo" src="../../core/asset/icon-user.png" alt="user-logo" href="../welcome.html"> 
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
                <a href="../welcome.php"><img class="img-logo" src="../../core/asset/LogoItkontamaTravelOrange2022.png" alt="Logo-icon"></a> 
                  <button class="hamburger">
                    <div class="bar"></div>
                  </button>
          </nav>
    </div>
  </main>
  <script src="../../core/script/script.js"></script>
</body>
</html>
