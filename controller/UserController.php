<?php 
require_once "../models/UserModel.php";
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];

  $user = new User($username, $password, $email);
  if ($user->register()) {
    echo "<script>alert('Berhasil registrasi, silakan login');window.location='../apps/views/pendaftaran.html';</script>";
  }
}
?>
