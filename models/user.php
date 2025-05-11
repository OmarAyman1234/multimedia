<?php
    require_once '../../models/client.php';
    abstract class User {

        public static function register(Client $c){
            $username = $c->getUsername();
            $email = $c->getEmail();
            $password = $c->getPassword();
            
            // check for duplicate username
            $query = "SELECT * FROM registeredusers WHERE username='$username'";
            $usernameCheck = DBController::select($query);

            if(empty($usernameCheck)) {
                $query1 = "INSERT INTO registeredusers (username, email, password, roleId) VALUES ('$username', '$email', '$password', 3)"; 
                $result = DBController::insert($query1);

                // Add a default list called Bookmarks for every user.
                $query2 = "INSERT INTO lists (name, userId) VALUES ('Bookmarks', $result)";
                DBController::insert($query2);
                
                return $result;     
            }
            else {
                //username is already taken
                return false;
            }

        }
    }
?>