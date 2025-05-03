<?php 

abstract class RegisteredUser {
  private $id;
  private $username;
  private $email;
  private $password;
  private $isDeleted;
  private $joinDate;
  private $roleId;


  public function getId() {
    return $this->id;
  }

  public function getUsername() {
    return $this->username;
  }

  public function getEmail() {
    return $this->email;
  }
  public function setEmail($newEmail) {
    $this->email = $newEmail;
  }
  public function setUsername($newUsername) {
    $this->username = $newUsername;
  }

  // Should be hashed!
  public function setPassword($newPassword) {
    $this->password = $newPassword;
  }
  public function getPassword($newPassword) {
    return $this->password;
  }


  public function setIsDeleted() {
    $this->isDeleted = !$this->isDeleted;
  }

  public function getJoinDate() {
    return $this->joinDate;
  }

  public function getRoleId() {
    return $this->roleId;
  }

  public function setRoleId($newRoleId) {
    $this->roleId = $newRoleId;
  }
}

?>