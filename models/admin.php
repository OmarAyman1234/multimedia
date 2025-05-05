<?php
  require_once 'registeredUser.php';

  class Admin extends RegisteredUser {
    
    
    public function editUser($id, $newData) {
      $query = "UPDATE users SET name = ?, email = ?, role = ? WHERE id = ? AND isDeleted = 0";
      if (!$this->db) {
          throw new Exception("Database connection is not initialized.");
      }
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('sssi', $newData['name'], $newData['email'], $newData['role'], $id);
      return $stmt->execute();
    }

    public function removeUser($id) {
      $query = "UPDATE users SET isDeleted = 1 WHERE id = ?";
      if (!$this->db) {
        throw new Exception("Database connection is not initialized.");
    }
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i', $id);
      return $stmt->execute();
    }
  }
?>