<?php
  require_once 'Users.php';
  require_once 'registeredUser.php';

    class users extends RegisteredUser{
        public  function  register(users $user){
            $uUsername = $user->getUsername();
            $uPassword = $user->getPassword();
            $uEmail = $user->getEmail();
            if(DBController::openConnection()){
                $query = "INSERT INTO registeredusers (username, email, password, roleId) VALUES ('$uUsername', '$uEmail', '$uPassword', 3)"; 
                $result = DBController::insert($query);
                $query1 = "INSERT INTO lists (name, userId) VALUES ('Bookmark', '$result')";
                $result1 = DBController::insert($query1);
                return $result;
            }
            else{
                echo "Error in database connection";
                return false;
            }
        }
    }
?>