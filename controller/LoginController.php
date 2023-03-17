<?php
session_start();
class LoginController extends LoginModel{
    private $user;
    public function __construct() {
        $this->user = new LoginModel();
    }
    
    public function login($username, $password) {
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            $result = $this->user->login($username, $password);
    
            if ($result !== false) {
                $_SESSION['id_users'] = $result['id_users'];
                $_SESSION['username'] = $result['username'];
                $_SESSION['level'] = $result['level'];
    
                if ($result['level'] == 'admin') {
                    header("Location: ../../display/admin/welcome.php");
                } else {
                    header("Location: ../../index.php");
                }
    
                exit();
            } else {
                echo "Username atau password salah";
            }
        }
    }
}
    
    // Inisiasi LoginController
    // $loginController = new LoginController();
    // $loginController->login();
    
    
    
    
    
    

