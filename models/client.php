<?php
  require_once 'registeredUser.php';

  class Client extends RegisteredUser {
    public  function  register(Client $user){
      $uUsername = $user->getUsername();
      $uPassword = $user->getPassword();
      $uEmail = $user->getEmail();
      if(DBController::openConnection()){
          $query = "INSERT INTO registeredusers (username, email, password, roleId) VALUES ('$uUsername', '$uEmail', '$uPassword', 3)"; 
          $result = DBController::insert($query);
          $query1 = "INSERT INTO lists (name, userId) VALUES ('Bookmark', '$result')";
          $result1 = DBController::insert($query1);
          if ($result != false){
              if (session_status() === PHP_SESSION_NONE) {
              session_start();
              $_SESSION["userId"] = $result;
              $_SESSION["username"] = $uUsername;
              $_SESSION['roleId'] = 3;
              $_SESSION['roleName']='Client';
          }
          return true;
          }
      }
      else{
          echo "Error in database connection";
          return false;
      }
  }

}
?>