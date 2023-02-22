<?php
require_once "../models/LoginModel.php";

$username = $_POST['username'];
$password = $_POST['password'];

$user = new User_model($username, $password);
$result = $user->doLogin();

if ($result) {
    session_start();
    $_SESSION['id_users'] = $result['id_users'];
    $_SESSION['username'] = $result['username'];
    $_SESSION['level'] = $result['level'];

    // Set cookie
    $expiry = time() + (86400 * 30); // 30 hari
    setcookie('username', $result['username'], $expiry);
    setcookie('level', $result['level'], $expiry);

    if ($_SESSION['level'] == 'users') {
        header('location: ../views/pendaftaran.php');
    } elseif ($_SESSION['level'] == 'admin') {
        header("location: ../views/admin.html");
    }
} else {
    echo "<script>alert('Username atau password salah');window.location='../views/login.html';</script>";
}

