<?php
class user extends Database
{ 
    public function __construct()
    {
        $db = new Database;
        $this->conn = $db->conn;
    }

    public function index()
    {
        if (isset($_SESSION['id_users'])) {
            $id_users = $_SESSION['id_users'];
            $userQuery = "SELECT username, email FROM users WHERE id_users = $id_users";
            $result = $this->conn->query($userQuery);
            if($result->num_rows > 0){
                return $result; 
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function profile()
    {
        if (isset($_SESSION['id_users'])) {
            $id_users = $_SESSION['id_users'];
            $profilequery = "SELECT u.username, u.email, f.id_formulir, f.nama_lengkap, f.nik, f.time_stamp, f.status
                             FROM users u 
                             JOIN formulir f ON u.id_users = f.id_users 
                             WHERE u.id_users='$id_users'
                             ORDER BY f.time_stamp DESC";
            $result = $this->conn->query($profilequery);
            $profiles = $this->conn->query($profilequery);
            if($result->num_rows > 0 && $profiles->num_rows > 0){
                return array($result, $profiles);
            } else {
                return false;
            }
        }
    }
    
}