<?php
  require_once 'registeredUser.php';

class Client extends RegisteredUser {
   public function __construct($username, $email, $password) {
        $this->setUsername($username);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setRoleId(3);
    }
}
?>