<?php
// require_once('./models/client.php');
require_once '../../models/client.php';
require_once('../../controllers/DBController.php');

class AuthController
{
     public $db;
    public function login(Client $user)
{
    $this->db = new DBController();

    if ($this->db->openConnection()) {
        $username = $user->getUsername();
        $password = $user->getPassword();

        
        $query = "SELECT * FROM registeredusers WHERE username = '$username'";
        $result = $this->db->select($query);

        if ($result === false || count($result) == 0) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION["errmsg"] = "username is not found ";
            return false;
        }

        $storedHash = $result[0]['password'];

       
        if (!password_verify($password, $storedHash)) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION["errmsg"] = "error in password ";
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
                $_SESSION['roleName'] = 'Editor';
            } else {
                $_SESSION['roleName'] = 'Client';
            }
        }
        return true;
    } else {
        echo "error in connection to database";
        return false;
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
}
    
    public function register(Client $user){
        $this->db = new DBController;
        $uUsername = $user->getUsername();
        $uPassword = $user->getPassword();
        $uEmail = $user->getEmail();
        if($this->db->openConnection()){
            $query = "INSERT INTO registeredusers (username, email, password, roleId) VALUES ('$uUsername', '$uEmail', '$uPassword', 3)"; 
            $result = $this->db->insert($query);
            $query1 = "INSERT INTO lists (name, userId) VALUES ('Bookmark', '$result')";
            $result1 = $this->db->insert($query1);
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
