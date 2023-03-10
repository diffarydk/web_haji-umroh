<?php 
class admin extends Database {

    public function __construct()
    {
        $db = new Database;
        $this->conn = $db->conn;        
    }
    
    public function getData()
    {
      $userQuery = "SELECT u.id_users, u.username, u.email, MAX(f.time_stamp) AS last_time_stamp FROM users u LEFT JOIN formulir f ON u.id_users = f.id_users GROUP BY u.id_users ORDER BY last_time_stamp DESC";
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
      public function deleteFormulir($id_users, $id_formulir) {
        $query = "DELETE FROM formulir WHERE id_users = ? AND id_formulir = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('si', $id_users, $id_formulir);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteUser($id_users) {
      $query = "DELETE FROM users WHERE id_users = ?";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param('i', $id_users);
      if ($stmt->execute()) {
          $query = "DELETE FROM formulir WHERE id_users = ?";
          $stmt = $this->conn->prepare($query);
          $stmt->bind_param('i', $id_users);
          $stmt->execute();
          return true;
      } else {
          return false;
      }
  }
  
}