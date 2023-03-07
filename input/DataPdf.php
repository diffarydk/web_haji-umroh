<?php
class Form extends Database {

  public function __construct() {
    $db = new Database;
    $this->conn = $db->conn;
  }

  public function getForm($id_formulir, $id_users){
    $query = "SELECT * FROM formulir WHERE id_formulir = ? AND id_users = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("ss", $id_formulir, $id_users);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result){
        return $result->fetch_assoc();
    }
    return false;
}
} 
