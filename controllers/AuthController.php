<?php
require_once __DIR__ . '/../models/client.php';
require_once __DIR__ . '/DBController.php';

class AuthController
{
    // public $db;

    public static function isAdmin() {
        if(session_status() === PHP_SESSION_NONE)
            session_start();

        if($_SESSION['roleId'] == 1)
            return true;

        return false;
    }

    public static function isEditor() {
        if(session_status() === PHP_SESSION_NONE)
            session_start();

        if($_SESSION['roleId'] == 2)
            return true;

        return false;
    }

    public static function isClient() {
        if(session_status() === PHP_SESSION_NONE)
            session_start();

        if($_SESSION['roleId'] == 3)
            return true;

        return false;
    }

    public static function isLoggedIn() {
        if(session_status() === PHP_SESSION_NONE)
            session_start();

        if(isset($_SESSION['username']) && isset($_SESSION['roleId']))
            return true;

        return false;
    }
    

    //login at RegisteredUser Model, register I don't know yet.

    public function login(Client $user)
    {
    $this->db = new DBcontroller();

    if ($this->db->openConnection()) {
    
        $query = "SELECT * FROM registeredusers WHERE username='" . $user->getUsername() . "' AND password='" . $user->getPassword() . "'";

        $result = $this->db->select($query);

        if ($result === false) {
            echo "Error in query.";
            return false;
        }

        if (count($result) == 0) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION["errmsg"] = "Wrong username or password.";
            return false;
        }

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION["userId"] = $result[0]["id"];
        $_SESSION["username"] = $result[0]["username"];
        $_SESSION['roleId'] = $result[0]['roleId'];
        
        if (isset($_SESSION["roleId"])) {
            if ($_SESSION["roleId"] == 1) {
                $_SESSION['roleName'] = 'Admin';
            } elseif ($_SESSION["roleId"] == 2) {
              $_SESSION['roleName'] ='Editor';
            } else {
            $_SESSION['roleName']='Client';
            }
        }
        return true;
    } else {
        echo "Error in database connection.";
        return false;
    }
    }
    public static function registerController(Client $client){
        if ($client->register($client)){
            header('location: ../client/index.php');
        }
        else{
            header('location: ../Shared/404.php');
        }
    }

}
?>
