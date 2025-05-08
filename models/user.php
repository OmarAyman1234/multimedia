<?php
    require_once '../../models/client.php';
    abstract class User {

        public static function register(Client $c){
            $username = $c->getUsername();
            $email = $c->getEmail();
            $password = $c->getPassword();
            
            $query = "INSERT INTO registeredusers (username, email, password, roleId) VALUES ('$username', '$email', '$password', 3)"; 
            $result = DBController::insert($query);

            // Add a default list called Bookmarks for every user.
            $query1 = "INSERT INTO lists (name, userId) VALUES ('Bookmarks', '$result')";
            DBController::insert($query1);
            
            return $result;     
        }
    }
?>