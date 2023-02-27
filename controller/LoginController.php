<?php
require_once "../input/LoginModel.php";

$username = $_POST['username'];
$password = $_POST['password'];

$user = new User_model($username, $password);
$result = $user->doLogin();

if ($result) {
    $_SESSION['username'] = $result['username'];
    $_SESSION['level'] = $result['level'];
    $_SESSION['id_users'] = $result['id_users'];

    // Set cookie
    $expiry = time() + (86400 * 30); // 30 hari
    setcookie('username', $result['username'], $expiry);
    setcookie('level', $result['level'], $expiry);

    if ($_SESSION['level'] == 'users') {
        header('location: ../index.php');
        exit();
    } elseif ($_SESSION['level'] == 'admin') {
        header("location: ../views/admin.html");
        exit();
    }
} else {
    echo "<script>alert('Username atau password salah');window.location='../views/login.html';</script>";
    exit();
}