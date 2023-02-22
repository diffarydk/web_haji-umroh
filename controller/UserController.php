<?php 
<<<<<<< HEAD
require_once "../input/UserModel.php";
=======
require_once "../models/UserModel.php";
>>>>>>> e3e7febc4b93a247e8bad5f6ba4b3cfdb5e34701
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];

  $user = new User($username, $password, $email);
  if ($user->register()) {
<<<<<<< HEAD
    echo "<script>alert('Berhasil registrasi, silakan login');window.location='../display/user/pendaftaran.html';</script>";
=======
    echo "<script>alert('Berhasil registrasi, silakan login');window.location='../apps/views/pendaftaran.html';</script>";
>>>>>>> e3e7febc4b93a247e8bad5f6ba4b3cfdb5e34701
  }
}
?>
