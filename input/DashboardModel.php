<?php 
class admin extends Database {

    public function __construct()
    {
        $db = new Database;
        $this->conn = $db->conn;        
    }
    
    public function getData()
    {
        $userQuery = "SELECT id_users, username, email FROM users  ORDER BY time DESC";
        $result = $this->conn->query($userQuery);
        if($result->num_rows > 0){
            return $result; 
        } else {
            return false;
        }
    }
    public function profile()
    {
        $id_users = $_GET['id_users'] ?? null;
        if (isset($id_users)) {
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
    public function getInfo($id_formulir) {
        $id_users = $_GET['id_users'] ?? null;
        if (isset($id_users)) {
          $query = "SELECT * FROM formulir WHERE id_formulir = ? AND id_users = ?";
          $stmt = $this->conn->prepare($query);
          $stmt->bind_param('si', $id_formulir, $id_users);
          $stmt->execute();
          $result = $stmt->get_result();
          if ($result->num_rows > 0) {
            return $result->fetch_assoc();
          }
        }
        return false;
      }

      public function getWilayah($id_formulir) {
        $id_users = $_GET['id_users'] ?? null;
        if (isset($id_users)) {
          $query = "SELECT * FROM formulir WHERE id_formulir = ? AND id_users = ?";
          $stmt = $this->conn->prepare($query);
          $stmt->bind_param('si', $id_formulir, $id_users);
          $stmt->execute();
          $result = $stmt->get_result();
          if ($result->num_rows > 0) {
            return $result->fetch_assoc();
          }
        }
        return false;
      }
}