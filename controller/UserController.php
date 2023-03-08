<?php 
require_once "../input/UserModel.php";
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $time = date('Y-m-d H:i:s');
  $user = new User($username, $password, $email, $time);
  if($user->register()){
    echo "<script>alert('Berhasil registrasi, silakan login');window.location='../display/user/pendaftaran.html';</script>";
  }
}
?>
