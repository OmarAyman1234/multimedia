<?php
    class Guest extends RegisteredUser{
        public  function  register(Guest $guest){
            $uUsername = $guest->getUsername();
            $uPassword = $guest->getPassword();
            $uEmail = $guest->getEmail();
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